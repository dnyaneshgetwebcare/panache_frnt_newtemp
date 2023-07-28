<?php
include("controllers/DBConnect.php");

$db_con= new DBConnect();
$product_id=
$img_list=$db_con->getallImageList(466);

foreach ($img_list as $image_details){
  // $orignal_img = $db_con->getImagePath($image_details['img_name'],true);
   //echo $orignal_img;
    //if($orignal_img!=''){
        echo $image_details['item_id']." >> ";
        echo $db_con->resizeImage($image_details['img_name'],870,1110)."<br>";
        echo $db_con->resizeImage($image_details['img_name'],270,350)."<br>";
        echo $db_con->resizeImage($image_details['img_name'],600,350)."<br>";
    //}
}
?>