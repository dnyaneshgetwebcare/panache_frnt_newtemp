<?php

class ConfigDetails
{
public $servername = "localhost";
public $username = "root";
public $password = "";

public $billing_sever_folder='panache_bill';
public $img_def="../assets/images/apro131-2.jpg";
public $img_600_778="../assets/images/apro134-1-600x778.jpg";
public $img_270_350="../assets/images/apro302-270x350.jpg";
//public $img_orignal_path="/".$billing_sever_folder."/uploads/";
public function  getPathconfig(){
    $img_orignal_path="/".$this->billing_sever_folder."/uploads/";
    $img_default_url="/..".$img_orignal_path;
    $server_dir_img=$_SERVER['DOCUMENT_ROOT']."/".$img_orignal_path;
    return array('img_orignal_path'=>$img_orignal_path ,'img_default_url'=> $img_default_url,'server_dir_img'=>$server_dir_img);
}

}
?>