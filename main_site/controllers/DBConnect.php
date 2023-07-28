<?php
include("ConfigDetails.php");
class DBConnect
{

public $conn = null;
    public $servername ;
    public $username;
    public $password;
    public  $img_orignal_path;
    public $img_default_url;
    public $server_dir_img;
    //public $billing_sever_folder='panache_bill';
public $conig_details;
    function  __construct(){
        $this->conig_details=new ConfigDetails();
        $this->servername = $this->conig_details->servername;
        $this->username = $this->conig_details->username;
        $this->password = $this->conig_details->password;
        $path_details=$this->conig_details->getPathconfig();
        $this->img_orignal_path =$path_details['img_orignal_path'];
        $this->img_default_url =$path_details['img_default_url'];
        $this->server_dir_img =$path_details['server_dir_img'];

        $billing_sever_folder = $this->conig_details->billing_sever_folder;
    }
    function connectdb()
    {
        if($this->conn==null) {
            try {
                $this->conn = new PDO("mysql:host=$this->servername;dbname=panache_final", $this->username, $this->password);
                // set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "Connected successfully";
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }
    function getProductlist($category,$limit=21,$page_no=1,$type_ids="",$filter_strng=""){
        $this->connectdb();
        $offset=0;
        if($page_no!=1){
             $offset=($page_no-1) * ($limit);
        }

        $where_con=  "where `scrab_status` = 'No' AND `delete_status` = 0 and category_id= ". $category;
        if($type_ids!=""){
            $where_con= $where_con." and type_id IN (".$type_ids.") ";
        }
        if($filter_strng!=""){
            $where_con= $where_con." and name like %".$filter_strng."% ";
        }
        $sql = 'SELECT * FROM `item_master` '.$where_con.'  limit '.$limit.' OFFSET '.$offset;
//print_r($sql);die;
        $statement = $this->conn->query($sql);
        $product_list = $statement->fetchAll(PDO::FETCH_ASSOC);

        $sql_count = 'SELECT count(*) cnt_total FROM `item_master` '.$where_con;
//print_r($sql_count);die;
        $statement_count = $this->conn->query($sql_count);
        $product_count= $statement_count->fetchAll(PDO::FETCH_ASSOC);
        //print_r($product_count);die;
        $total_records=$product_count[0]['cnt_total'];
        $number_pages=ceil($total_records/$limit);
        $images_list=$this->getItemImages($product_list);
        return ['product_list'=>$product_list,'number_pages'=>$number_pages,'total_records'=>$total_records,'image_list'=>$images_list];
    }
       function getrelatedProductlist($category,$type_ids="",$limit=10){
        $this->connectdb();
        $offset=0;


        $where_con=  "where `scrab_status` = 'No' AND `delete_status` = 0 and category_id= ". $category;
        if($type_ids!=""){
            $where_con= $where_con." and type_id IN (".$type_ids.") ";
        }
        $sql = 'SELECT * FROM `item_master` '.$where_con.'  limit '.$limit.' OFFSET '.$offset;
//print_r($sql);die;
        $statement = $this->conn->query($sql);
        $product_list = $statement->fetchAll(PDO::FETCH_ASSOC);

           $images_list=$this->getItemImages($product_list);
        return ['product_list'=>$product_list,'number_pages'=>0,'total_records'=>0,'image_list'=>$images_list ];
    }
    function getBestSellers($limit=10){
        $this->connectdb();
        $offset=0;


        $where_con=  "where `scrab_status` = 'No' AND `delete_status` = 0 ";

        $sql = 'SELECT * FROM `item_master` '.$where_con.'  limit '.$limit.' OFFSET '.$offset;
//print_r($sql);die;
        $statement = $this->conn->query($sql);
        $product_list = $statement->fetchAll(PDO::FETCH_ASSOC);
        $images_list=$this->getItemImages($product_list);

        return ['product_list'=>$product_list,'number_pages'=>0,'total_records'=>0,'image_list'=>$images_list ];
    }

    function getOccassionProduct($occassion_id,$limit=10){
        $this->connectdb();
        $offset=0;


        $where_con=  "where `scrab_status` = 'No' AND `delete_status` = 0  and find_in_set('". $occassion_id . "',occasion_master)";

        $sql = 'SELECT * FROM `item_master` '.$where_con.'  limit '.$limit.' OFFSET '.$offset;
//print_r($sql);die;
        $statement = $this->conn->query($sql);
        $product_list = $statement->fetchAll(PDO::FETCH_ASSOC);
        $images_list=$this->getItemImages($product_list);

        return ['product_list'=>$product_list,'number_pages'=>0,'total_records'=>0,'image_list'=>$images_list ];
    }
     function getNewArrival($display_type,$limit=10){
        $this->connectdb();
        $offset=0;


        $where_con=  "where `scrab_status` = 'No'   AND `delete_status` = 0 ";

        $sql = 'SELECT * FROM `item_master` '.$where_con.'  limit '.$limit.' OFFSET '.$offset;
//print_r($sql);die;
        $statement = $this->conn->query($sql);
        $product_list = $statement->fetchAll(PDO::FETCH_ASSOC);
        $images_list=$this->getItemImages($product_list);

        return ['product_list'=>$product_list,'number_pages'=>0,'total_records'=>0 ,'image_list'=>$images_list ];
    }
      function getTypeList($category){
        $this->connectdb();
    /*    $where_con=  "where  category_id= ". $category;
        $sql = 'SELECT id,name FROM `type_master` '.$where_con.'';

        $statement = $this->conn->query($sql);
        $type_list = $statement->fetchAll(PDO::FETCH_ASSOC);*/
        /*$type_list=array_combine(array_column($type_list, 'id'), $type_list);
print_r($type_list);*/
 $where_con_product=  "where `scrab_status` = 'No' AND `delete_status` = 0 and item_master.category_id= ". $category;
        $sql_product = 'SELECT type_id,count(*) total_cnt,`type_master`.name as name,type_id FROM `item_master` left join `type_master` on type_id=type_master.id '.$where_con_product.'  group by type_id order by total_cnt desc';

        $statement_product = $this->conn->query($sql_product);
        $type_list = $statement_product->fetchAll(PDO::FETCH_ASSOC);
//print_r($sql_product);die;
      /*  print_r($product_list);
        print_r(array_combine($type_list,$product_list));die;*/
        return $type_list;
    }


    function getImageList($product_id){
        $this->connectdb();
        /*    $where_con=  "where  category_id= ". $category;
            $sql = 'SELECT id,name FROM `type_master` '.$where_con.'';

            $statement = $this->conn->query($sql);
            $type_list = $statement->fetchAll(PDO::FETCH_ASSOC);*/
        /*$type_list=array_combine(array_column($type_list, 'id'), $type_list);
print_r($type_list);*/
        //$where_con_product=  "where `scrab_status` = 'No' AND `delete_status` = 0 and item_master.category_id= ". $category;
        $sql_img_list = 'SELECT * FROM `item_master_img` where item_id = '.$product_id.'  and status = 1 order by default_image desc';

        $statement_product = $this->conn->query($sql_img_list);
        $img_list = $statement_product->fetchAll(PDO::FETCH_ASSOC);
//print_r($sql_product);die;
        /*  print_r($product_list);
          print_r(array_combine($type_list,$product_list));die;*/
        return $img_list;
    }
    function getallImageList($product_id='',$offset=0){
        $this->connectdb();
        $limt=20;
        $where_con_product=  '';
        if($product_id!=''){
            $where_con_product=  'and item_id = '.$product_id;
        }

        $sql_img_list = 'SELECT * FROM `item_master_img` where  status = 1 '.$where_con_product.' order by default_image desc limit 20 offset '.$offset;
//echo $sql_img_list;die;
        $statement_product = $this->conn->query($sql_img_list);
        $img_list = $statement_product->fetchAll(PDO::FETCH_ASSOC);
//print_r($sql_product);die;
        /*  print_r($product_list);
          print_r(array_combine($type_list,$product_list));die;*/
        return $img_list;
    }
    function getImagePathList($imagelist,$product_id){
        $image_path= $this->getImagePath();
        foreach ($imagelist as $image_item){
            if($image_item['item_id']==$product_id){
                $image_path= $this->getImagePath($image_item['img_name']);
                break;
            }
        }
        return $image_path;
    }
    function getItemImages($product_list){
        $this->connectdb();
        $product_ids=array_column($product_list,'id');
        $items = implode($product_ids,',');

        $sql_img_list = 'SELECT * FROM `item_master_img` where item_id in ('.$items.')  and status = 1 and   default_image =1';

        $statement_product = $this->conn->query($sql_img_list);
        $img_list = $statement_product->fetchAll(PDO::FETCH_ASSOC);
        //$images =array_map($img_list,'item_id',);
//print_r($images);die;
        /*  print_r($product_list);
          print_r(array_combine($type_list,$product_list));die;*/
        return $img_list;
    }
    function  getcatdetails($category){
        $this->connectdb();
        $where_con_product=  "where id= ". $category;
        $sql_product = 'SELECT * FROM `category_master`  '.$where_con_product.' ';

        $statement_product = $this->conn->query($sql_product);
        $type_list = $statement_product->fetchAll(PDO::FETCH_ASSOC);
        return $type_list[0]['name'];
    }

    function getImagePath($image_name='',$dimension=null){   // array width and height
        $img_path1="";
       // print_r($img_path1);die;

        /*$img_orignal_path=  "/".$this->billing_sever_folder."/uploads/";
        $img_default_url="/..".$img_orignal_path;
        $server_dir_img=$_SERVER['DOCUMENT_ROOT']."/".$img_orignal_path;*/
        if($dimension!=null){
           // $additonal_path=$dimension['width']."_".$dimension['height']."/";
            $image_extension_return=$this->createDestinationPath($image_name,$dimension['width'],$dimension['height'],1);
           // if($image_extension_return['status']){
                $only_name=$image_extension_return['filename_without_extn'];
            $additonal_path=$image_extension_return['path'];
               // echo $server_dir_img.''.$additonal_path.''.$only_name.'.jpg';

                if($image_name!='' && file_exists($this->server_dir_img.''.$additonal_path.''.$only_name.'.jpg')){
                    //$img_path= '/../../panache_bil_git_hub/uploads/'.$product['images'];
                    $img_path1= $this->img_default_url.''.$additonal_path.''.$only_name.'.jpg';
                }
           // }

        }
        if($img_path1=="") {
            if ($image_name != '' && file_exists($this->server_dir_img . '' . $image_name)) {
                //$img_path= '/../../panache_bil_git_hub/uploads/'.$product['images'];
                $img_path1 = $this->img_default_url . '' . $image_name;
            }
        }

        if($img_path1==""){
            $img_path1=$this->conig_details->img_def;


            if($dimension!=null){

                if($dimension['width']==600 && $dimension['height']==766){
                    $img_path1=$this->conig_details->img_600_778;
                }elseif ($dimension['width']==270 && $dimension['height']==350){
                    $img_path1=$this->conig_details->img_270_350;
                }
            }
        }

        return $img_path1;
    }
    function getImagePathSer($image_name=''){

        $img_path1="";
        // print_r($img_path1);die;
       // $img_orignal_path=$this->conig_details->getOrignalPath();// old code $img_orignal_path="/".$this->billing_sever_folder."/uploads/";
       // $img_default_url="/..".$img_orignal_path;
        //$server_dir_img=$_SERVER['DOCUMENT_ROOT']."/".$img_orignal_path;
        if($image_name!='' && file_exists($this->server_dir_img.''.$image_name)){
            //$img_path= '/../../panache_bil_git_hub/uploads/'.$product['images'];
            $img_path1= $this->server_dir_img.''.$image_name;
        }
        return $img_path1;
    }
    function getproductDetails($prod_id){
        $this->connectdb();
         $where_con=  "where item_master.id= ". $prod_id;
          $sql_product = 'SELECT item_master.*,category_master.name as cat_name,type_master.name as type_name FROM `item_master` left join  category_master on item_master.category_id=category_master.id left join `type_master` on type_id=type_master.id  '.$where_con.' ';

        $statement_product = $this->conn->query($sql_product);
        $type_list = $statement_product->fetchAll(PDO::FETCH_ASSOC);

        return $type_list;
    }

    public function getOccassionMaster()
    {
        $this->connectdb();
        $occassion_where=  "where status= 1 and main_screen_active=1";
        $sql_occcassion = 'SELECT * FROM `occation_master`  '.$occassion_where.' ';

        $statement_product = $this->conn->query($sql_occcassion);
        $occasion_list = $statement_product->fetchAll(PDO::FETCH_ASSOC);
        return $occasion_list;
    }
    public function getDisplayType()
    {
        $this->connectdb();
        $occassion_where=  "where status= 1 and main_screen_active=1";
        $sql_occcassion = 'SELECT * FROM `display_type`  '.$occassion_where.' ';

        $statement_product = $this->conn->query($sql_occcassion);
        $occasion_list = $statement_product->fetchAll(PDO::FETCH_ASSOC);
        return $occasion_list;
    }

       public function resizeImage($image_name='',$new_width=600,$new_height=766){
        // specifying the image
           //echo $image_name; die;
        $image_filename = $this->getImagePathSer($image_name);

       /*$new_width = 600;
       $new_height = 766;*/
       if($image_filename==''){
          return "Image not exits";
       }
        $dsc_details= $this->createDestinationPath($image_filename,$new_width,$new_height);
       print_r($dsc_details);die;
        $dsc_path=$dsc_details['path'];
        $dsc_img_name=$dsc_details['filename'];
        $file_ext=$dsc_details['file_extn'];
        //$image_name_spli=explode('.',$dsc_img_name);
           $image_name_spli = $dsc_details['filename_without_extn'];
// get source image size
        list($w, $h) = getimagesize($image_filename);
// specifying the required thumbnail size

// creating a black picture
        $dst = imagecreatetruecolor($new_width, $new_height);
// loading the source image
           //echo $file_ext;die;
           if(strtolower($file_ext) == 'png'){
               $src = imagecreatefrompng($image_filename);
           }else{
               $src = imagecreatefromjpeg($image_filename);
           }


// creating a thumbnail
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $w, $h);
// saving the thumbnail in your current folder
        //$save = imagejpeg($dst,$dsc_path."/".$image_name_spli.".jpg");
           if(strtolower($file_ext) == 'png'){
               $save = imagepng($dst,$dsc_path."/".$image_name_spli.".png");
               echo $dsc_path."/".$image_name_spli.".png";
           }else{
               $save = imagejpeg($dst,$dsc_path."/".$image_name_spli.".jpg");
               echo $dsc_path."/".$image_name_spli.".jpg";
           }

        return $save;
   /*     if($save){
            $result_status=true;
}
        else{
            echo "failed";
}*/
    }

    private function createDestinationPath($image_filename,$width,$height,$_get=0)
    {

       $destination_array=explode('/',$image_filename);
       $des_file_name=$destination_array[sizeof($destination_array)-1];
       $temp_desct='';
       //print_r($destination_array);
       if(sizeof($destination_array)==2){
           unset($destination_array[sizeof($destination_array)-1]);
           $temp_desct= implode("/",$destination_array);
       }

        $destination_string = $temp_desct."/".$width."_".$height."/";
        if($_get==0) {
            if (!is_dir($destination_string)) {
                mkdir($destination_string, 0777, true);
            }
        }
        $extension_split=explode(".",$des_file_name);
        return array('path'=>$destination_string,'filename'=>$des_file_name,'filename_without_extn'=>$extension_split[0],'file_extn'=>$extension_split[1]);
    }
    /*function splitImagename($image_name){
        $path_expload= explode('/',$image_name);

        $orignal_image_name=$path_expload[sizeof($path_expload)-1];

        $extension_split=explode(".",$orignal_image_name);

        if(sizeof($extension_split)!=2){
            return array('status'=>false,'error'=>"Extension Split failed");
        }
        return array('extension'=>$extension_split[1],'only_name'=>$extension_split[0],'full_name'=>$orignal_image_name ,'status'=>true);

    }*/
}