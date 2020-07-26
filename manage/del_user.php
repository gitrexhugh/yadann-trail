<?php 
//取得資料庫設定與連線function
require_once("fundation_func.php");

    //取得要刪除的user_id
    $usid=entities_fix_string($link,$_GET["du"]);
    

    //查詢使用者清單
    $sql_query="DELETE FROM hash_user WHERE usid=$usid";
    $link->query($sql_query);
    //echo "user-$user_id";
    //execute_sql($link,"mydb",$sql_query);
    //$sql_query.free();
    $link->close();
    header("location:user_page.php");
    


?>

