<?php 
//取得資料庫設定與連線function
require_once("m_config.php");

//取得要執行的動作action
$action=$_GET["action"];

//取得輸入的產品編輯資料
$product_name=$_POST["product_name"];
$product_img=file_upload();
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
    $product_id=$_GET["ed_p"];
    //若是編輯則Update產品資料
    $sql="UPDATE product SET product_name='$product_name', product_img='$product_img', product_content='$product_content', is_publish='$is_publish' WHERE product_id=$product_id";
    $result=execute_sql($link,"mydb",$sql);
    //echo "<script type='text/javascript'>";
    echo "已新增資料-$product_name||$product_img||$product_content||$is_publish";
   // echo "alert('已儲存產品資料-$product_name');";
    //echo "history.back();";
   // echo "</script>";
    
}else{

//若是新增則Insert產品資料
    $sql="INSERT INTO product(product_name, product_img, product_content,is_publish,tags) VALUES ('$product_name','$product_img','$product_content','$is_publish','')";
    $result=execute_sql($link,"mydb",$sql);
    echo "<script type='text/javascript'>";
    echo "alert('已新增資料-$product_name||$product_img||$product_content||$is_publish||fro-$old_path');";
    //echo "history.back();";
    echo "</script>";

}


//上傳檔案並回傳結果
function file_upload(){
    //設定上傳檔案目錄
    $upload_dir="test_dir/";
    //upload_file為上傳後檔案路徑；以iconv變更檔名編碼
    $uplaod_file=$upload_dir.iconv("UTF-8","BIG5",$_FILES["myfile"]["name"]);

    //取得上傳檔案附檔名
    $file_name=$_FILES["myfile"]["name"];
    $file_last_name=explode('.',$file_name);
    $file_type=$file_last_name[1];

    //取得佔存檔的路徑跟檔名
    $old_path=$_FILES['myfile']['tmp_name'];
    echo "暫存 $old_path";

    if(move_uploaded_file($old_path,$uplaod_file))// 將佔存檔案移動到指定的路徑
    {
        $rename_name=get_name().".".$file_type;
        $rename_path=$upload_dir.$rename_name;
        rename($uplaod_file,$rename_path);
    // echo "<script> alert('上傳成功 $rename_path')</script> ";
        return $rename_path;
    }else{
        echo "上傳失敗(".$_FILES["myfile"]["error"].")";
    }
}

//取得目前時間做為檔案名稱
function get_name(){
    $date=date('YmdHisv');
    return $date;
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
