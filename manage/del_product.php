<?php 
//取得資料庫設定與連線function
require_once("fundation_func.php");

$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
if($link->connect_error) {
    die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
}
else
{
    //取得要刪除的product_id
    $product_id=entities_fix_string($link,$_GET["product_id"]);
    //查詢產品清單取得檔案路徑
    $product_img_query="select product_img from product WHERE product_id=$product_id";// 取得產品圖片 
    $result=$link->query($product_img_query);
    $row=$result->fetch_array(MYSQLI_ASSOS);
    $product_img=$row['product_img'];

    if (file_exists($product_img)){
        unlink($product_img);//將圖片檔案刪除
        $sql_query="DELETE FROM product WHERE product_id=$product_id";// 取得product_ID並刪除該資料
        //echo ("刪除檔案：$product_img");

    }else{
        //echo ("檔案不存在：$product_img");
        $sql_query="DELETE FROM product WHERE product_id=$product_id";// 取得product_ID並刪除該資料


    }
    $link->query($sql_query); 
    $link->close();
}

header("location:product_page.php");//轉址到產品清單頁面

?>

