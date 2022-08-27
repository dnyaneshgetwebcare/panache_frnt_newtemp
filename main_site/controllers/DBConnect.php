<?php

class DBConnect
{

    public $servername = "localhost";
    public $username = "root";
    public $password = "password";
    public $conn = null;
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
    function getProductlist($category,$limit=21,$page_no=1,$type_ids=""){
        $this->connectdb();
        $offset=$page_no * $limit;
        $where_con=  "where `scrab_status` = 'No' AND `delete_status` = 0 and category_id= ". $category;
        if($type_ids!=""){
            $where_con= $where_con." and type_id IN (".$type_ids.") ";
        }
        $sql = 'SELECT * FROM `item_master` '.$where_con.'  limit '.$limit.' OFFSET '.$offset;
//print_r($sql);die;
        $statement = $this->conn->query($sql);
        $product_list = $statement->fetchAll(PDO::FETCH_ASSOC);

        $sql_count = 'SELECT count(*) cnt_total FROM `item_master` '.$where_con;
//print_r($sql);die;
        $statement_count = $this->conn->query($sql_count);
        $product_count= $statement_count->fetchAll(PDO::FETCH_ASSOC);
        //print_r($product_count);die;
        $number_pages=(int)$product_count[0]['cnt_total']/$limit;
        return ['product_list'=>$product_list,'number_pages'=>$number_pages];
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

      /*  print_r($product_list);
        print_r(array_combine($type_list,$product_list));die;*/
        return $type_list;
    }
}