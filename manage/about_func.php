<?php
//取得資料庫設定與連線function
//require_once("fundation_func.php");

class about_us_obj 
{
    public $slogan,$about_us,$about_us_tel,$about_us_address,$about_us_mail,$company_name,$about_us_fax;
    
}

//帶入ID、DB Link取得產品產品內容的Function
function get_about_info_wlink($link){
    if($link->connect_error) {
        die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
    }else
    {
        $info_obj=new about_us_obj;
        //$sql_query="SELECT slogan,about_us,about_us_tel,about_us_address,about_us_mail,company_name FROM about_us";
        $sql_query="SELECT * FROM about_us";
        $result= $link->query($sql_query);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $info_obj->slogan=$row['slogan'];
        $info_obj->about_us=$row['about_us'];
        $info_obj->about_us_tel=$row['about_us_tel'];
        $info_obj->about_us_address=$row['about_us_address'];
        $info_obj->about_us_mail=$row['about_us_mail'];
        $info_obj->company_name=$row['company_name'];
        $info_obj->about_us_fax=$row['about_us_fax'];
        
        return $info_obj;
    }
}


?>