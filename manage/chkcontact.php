<?php 
//取得資料庫設定與連線function
require_once("fundation_func.php");
require_once("contact_func.php");
//$link = new mysqli($dbhost,$dbuser,$dbpass,$db);

    //取得輸入的聯絡我們輸入資料
    $con_name=entities_fix_string($link,$_POST["name"]);
    $con_mail=entities_fix_string($link,$_POST["email"]);
    $con_tel=entities_fix_string($link,$_POST["telephone"]);
    $con_company=entities_fix_string($link,$_POST["company_name"]);
    $con_content=entities_fix_string($link,$_POST["request_info"]);
    $user_time=get_time();
    //$is_publish=entities_fix_string($link,$_POST["publish"]);

    $request_no=add_contact_info_wlink($link,$con_name,$con_mail,$con_tel,$con_company,$con_content,'0',$user_time);
    //echo "no=$request_no, time=$user_time";
    header("location:../contact_us.php?rno=$request_no");//轉址到產品清單頁面

/*

if($link->connect_error) {
die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
}else
{

    //取得輸入的產品編輯資料
    $con_name=entities_fix_string($link,$_POST["name"]);
    $con_mail=entities_fix_string($link,$_POST["email"]);
    $con_tel=entities_fix_string($link,$_POST["telephone"]);
    $con_company=entities_fix_string($link,$_POST["company_name"]);
    $con_content=entities_fix_string($link,$_POST["request_info"]);
    $user_time=get_time();
    //$is_publish=entities_fix_string($link,$_POST["publish"]);

    $request_no=add_contact_info_wlink($link,$con_name,$con_mail,$con_tel,$con_company,$con_content,'0',$user_time);
    //echo "no=$request_no, time=$user_time";
    header("location:../contact_us.php?rno=$request_no");//轉址到產品清單頁面


}*/



?>
