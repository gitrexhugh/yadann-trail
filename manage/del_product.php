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
if (file_exists($product_img)){
    unlink($product_img);//將檔案刪除
    mysqli_free_result($result);//釋放記憶體
    del_product($product_id);
    //echo ("刪除檔案：$product_img");

}else{
    //echo ("檔案不存在：$product_img");
    del_product($product_id);

}

//刪除資料庫產品資料
function del_product($product_id){
    $link=create_connection();
    $sql_query="DELETE FROM product WHERE product_id=$product_id";// 取得product_ID並刪除該資料 
    execute_sql($link,"mydb",$sql_query);
    mysqli_close($link);

}
    
header("location:product_page.php");//轉址到產品清單頁面

?>

