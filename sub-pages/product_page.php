<?php 
require_once("manage/fundation_func.php");
require_once("manage/product_func.php");

$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
if($link->connect_error) {
die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
}else
{
    //取得要執行的動作action
    $q_product_id=entities_fix_string($link,$_GET["pid"]);
    $product=get_product_content_wlink($link,$q_product_id);
    $product_name=$product->product_name;
    $product_content=$product->product_content;
    $product_img=$product->product_img;
    echo "<div id='product'>".
    "<h1 id='product_title'>$$product_name</h1>".
    "<article id='product_content'>$product_content</article>".
    "<div id='product_imgs'><img src=\"$product_img\"/></div></div>";

    mysqli_free_result($query);//釋放記憶體
    mysqli_close($link);//結束連線
}


?>
