<?php 
//設定上傳檔案目錄
$upload_dir="upload_img/";
$uplaod_file=$upload_dir.iconv("UTF-8","BIG5",$_FILES["myfile"]["name"]);

if(move_uploaded_file($_FILES["myfile"]["tmp_name"],$uplaod_file))
{
    echo "上傳成功 $sql";
    
}else{
    echo "上傳失敗(".$_FILES["myfile"]["error"].")";
}



/* 將資料存到資料庫中
//取得資料庫設定與連線function
require_once("manage/m_config.php");

//建立資料庫連線
$link=create_connection();

    if(move_uploaded_file($_FILES["myfile"]["tmp_name"],$uplaod_file))
    {
        //取得輸入的產品編輯資料
        $product_name='trail_test';
        $product_img=$uplaod_file;
        $product_content='trail_content';
        $is_publish=0;
        $tags='trail';
        $sql="INSERT INTO product(product_name, product_img, product_content,is_publish,tags) VALUES ('$product_name','$product_img','$product_content','$is_publish','$tags')";
        $result=execute_sql($link,"mydb",$sql);
        echo "上傳成功 $sql";
    }else{
        echo "上傳失敗(".$_FILES["myfile"]["error"].")$sql";
    }

    mysqli_close($link);
*/
?>
