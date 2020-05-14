<?php 
//取得資料庫設定與連線function
require_once("manage/m_config.php");

//取得輸入的產品編輯資料
$product_name=$_POST["product_name"];
$product_img=$_POST["product_img"];
$product_content=$_POST["product_content"];
$is_publish=$_POST["publish"];

//設定上傳檔案目錄
$upload_dir="upload_img/";
$uplaod_file=$upload_dir.iconv("UTF8","BIG5",$_FILES["product_img"]["name"]);
$product_img=$upload_dir+$_FILES["prodcuct_img"]["name"];
  
//建立資料庫連線
$link=create_connection();

    $sql="INSERT INTO product(product_name, product_name, product_content,is_publish) VALUES ('$product_name','$product_img','$product_content','$is_publish')";
    $result=execute_sql($link,"mydb",$sql);
    echo "<script type='text/javascript'>";
    echo "$product_img";
    echo "</script>";

    mysqli_close($link);

?>
