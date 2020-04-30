<?php 
//取得資料庫設定與連線function
require_once("m_config.php");

//取得要刪除的user_id
$user_id=$_GET["user_id"];

//建立資料庫連線
$link=create_connection();

//查詢使用者清單
$sql_query="DELETE FROM users WHERE user_id=$user_id";
execute_sql($link,"mydb",$sql_query);
mysqli_free_result($sql_query);//釋放記憶體
mysqli_close($link);

header("location:user_page.php");

?>

