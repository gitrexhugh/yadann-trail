<?php 
//取得資料庫設定與連線function
require_once("fundation_func.php");

    //取得要刪除的contact_id
    $con_id=entities_fix_string($link,$_GET["rno"]);
    $sql_query="DELETE FROM contacts WHERE con_id=$con_id";
    $link->query($sql_query);
    $link->close();

header("location:contacts.php");//轉址到產品清單頁面

?>

