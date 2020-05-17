<?php 
//取得資料庫設定與連線function
require_once("m_config.php");

//取得要刪除的product_id
$product_id=$_GET["product_id"];

//建立資料庫連線
$link=create_connection();

//查詢產品清單取得檔案路徑
$product_img_query="select product_img from product WHERE product_id=$product_id";// 取得product_ID並刪除該資料 
$result=execute_sql($link,"mydb",$product_img_query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$product_img=$row['product_img'];

    if(file_exists('$product_img')){//檢查檔案是否存在
        unlink('$product_img_query');//將檔案刪除
    }else {
         echo"jpeg或png檔均不存在";
    }
    mysqli_free_result($product_img_query);//釋放記憶體

    //刪除資料庫產品資料
    $sql_query="DELETE FROM product WHERE product_id=$product_id";// 取得product_ID並刪除該資料 
    execute_sql($link,"mydb",$sql_query);
    mysqli_free_result($sql_query);//釋放記憶體
    mysqli_close($link);

header("location:product_page.php");//轉址到產品清單頁面


?>

