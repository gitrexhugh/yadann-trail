<?php 
//取得資料庫設定與連線function
require_once("m_config.php");

//取得要執行的動作action
$action=$_GET["action"];
$product_id=$_GET["ed_p"];

//取得輸入的產品編輯資料
$product_name=$_POST["product_name"];
$product_img=$_POST["product_img"];
$product_content=$_POST["product_content"];
$is_publish=$_POST["publish"];

//設定上傳檔案目錄
/*$upload_dir="upload_img/";
$uplaod_file=$upload_dir.iconv("UTF8","BIG5",$_FILES["product_img"]["name"]);

$product_img=$upload_dir+$_FILES["prodcuct_img"]["name"];
*/  
//建立資料庫連線
$link=create_connection();

if ($action=="edit")
{
    //若是編輯則Update產品資料
    $sql="UPDATE product SET product_name='$product_name', product_img='$product_img', product_content='$product_content', is_publish='$is_publish' WHERE product_id=$product_id";
    $result=execute_sql($link,"mydb",$sql);
    echo "<script type='text/javascript'>";
    echo "alert('已儲存產品資料-$is_publish');";
   // echo "history.back();";
    echo "</script>";
    
}else{

//若是新增則Insert產品資料
    $sql="INSERT INTO product(product_name, product_name, product_content,is_publish) VALUES ('$product_name','$product_img','$product_content','$is_publish')";
    $result=execute_sql($link,"mydb",$sql);
    echo "<script type='text/javascript'>";
  //  echo "history.back();";
    echo "</script>";

}

/*
if (move_uploaded_file($_FILES["product_img"]["tmp_name"],$upload_file))
{
    $product_img=$upload_dir+$_FILES["prodcuct_img"]["name"];
    //建立資料庫連線
    $link=create_connection();

    if ($action=="edit")
    {
        //若是編輯則Update產品資料
        $sql="UPDATE product SET product_name='$product_name', product_img='$product_img', product_content='$product_content', is_publish='$is_publish' WHERE product_id=$product_id";
        $result=execute_sql($link,"mydb",$sql);
        echo "<script type='text/javascript'>";
        echo "alert('已儲存產品資料-$is_publish');";
        echo "history.back();";
        echo "</script>";
        
    }else{

    //若是新增則Insert產品資料
        $sql="INSERT INTO product(product_name, product_name, product_content,is_publish) VALUES ('$product_name','$product_img','$product_content','$is_publish')";
        $result=execute_sql($link,"mydb",$sql);
        echo "<script type='text/javascript'>";
        echo "history.back();";
        echo "</script>";

    }
}else
{
        echo "<script type='text/javascript'>";
        echo "alert('檔案上傳失敗-$product_img');";
       // echo "history.back();";
        echo "</script>";
        
}
*/
    mysqli_close($link);

?>
