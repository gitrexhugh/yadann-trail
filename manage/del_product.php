<?php 
//取得資料庫設定與連線function
require_once("m_config.php");

//取得要刪除的product_id
$product_id=$_GET["product_id"];

//建立資料庫連線
$link=create_connection();

//查詢使用者清單
$sql_query="DELETE FROM product WHERE prodcut_id=$product_id";// 取得product_ID並刪除該資料 
execute_sql($link,"mydb",$sql_query);
mysqli_free_result($sql_query);//釋放記憶體
mysqli_close($link);

header("location:product_page.php");//轉只到產品清單頁面

?>

