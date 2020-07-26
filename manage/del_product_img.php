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
    $product_img=entities_fix_string($link,$_GET["img"]);
    //查詢產品清單取得檔案路徑
    $product_img_del="UPDATE product set product_img=''  WHERE product_img='$product_img'";// 刪除產品圖片 
    $result=$link->query($product_img_del);
    unlink($product_img);//將圖片檔案刪除
    
    $link->query($sql_query); 
    $link->close();
}

header("location:product_page.php");//轉址到產品清單頁面

?>

