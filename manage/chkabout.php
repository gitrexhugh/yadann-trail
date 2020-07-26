<?php 
//取得資料庫設定與連線function
require_once("fundation_func.php");
//$link = new mysqli($dbhost,$dbuser,$dbpass,$db);

if($link->connect_error) {
die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
}else
{

    //取得輸入的產品編輯資料
    $company_name=entities_fix_string($link,$_POST["company_name"]);
    $about_us_tel=entities_fix_string($link,$_POST["about_us_tel"]);
    $about_us_mail=entities_fix_string($link,$_POST["about_us_mail"]);
    $about_us_address=entities_fix_string($link,$_POST["about_us_address"]);
    $about_us_fax=entities_fix_string($link,$_POST["about_us_fax"]);
    $about_file=file_upload();
    //$tmp_about_us= $_POST["about_us"];
    //$about_us=entities_fix_string($link,$tmp_about_us);
    $slogan=entities_fix_string($link,$_POST["slogan"]);
    $about_us=entities_fix_string($link,$_POST["about_us"]);
    //$is_publish=entities_fix_string($link,$_POST["publish"]);

    if ($company_name) //若有公司名稱則是編輯
    {
        //若是編輯則Update關於我們資料
        $sql="UPDATE about_us SET slogan='$slogan',
        about_us='$about_us', 
        about_us_tel='$about_us_tel', 
        about_us_address='$about_us_address', 
        about_us_fax='$about_us_fax', 
        about_us_mail='$about_us_mail',
        company_name='$company_name'";
        $link->query($sql);
        //echo "content:$product_content";
        //echo "更新:$product_id<br>name:$product_name<br>$product_content";
        echo "<script type='text/javascript'>";
        echo "alert('已儲存-更新');";
        //echo "history.back();";
        echo "</script>";
        
        
    }else{
    
    //若是新增則Insert產品資料
        $sql="INSERT INTO about_us(slogan, about_us, about_us_tel,about_us_address,about_us_mail,company_name,about_us_fax) 
        VALUES ('$slogan','$about_us','$about_us_tel','$about_us_address','$about_us_mail','$company_name','$about_us_fax')";
        $link->query($sql);
        echo "<script type='text/javascript'>";
        echo "alert('已儲存-新增');";
        //echo "history.back();";
        echo "</script>";
    
    }
    header("location:edit_about_us.php");//轉址到產品清單頁面
    $link->close();
}


//上傳檔案並回傳結果
function file_upload(){
    if (!$_FILES)
    {
        return;
    }else
    {
        //設定上傳檔案目錄
        $upload_dir="about_img/";
        //upload_file為上傳後檔案路徑；以iconv變更檔名編碼
        $uplaod_file=$upload_dir.iconv("UTF-8","BIG5",$_FILES["about_file"]["name"]);

        //取得上傳檔案附檔名
        $file_name=$_FILES["about_file"]["name"];
        $file_last_name=explode('.',$file_name);
        $file_type=$file_last_name[1];

        //取得暫存檔的路徑跟檔名
        $old_path=$_FILES['about_file']['tmp_name'];
        echo "暫存 $old_path";

        if(move_uploaded_file($old_path,$uplaod_file))// 將佔存檔案移動到指定的路徑
        {
            $rename_name=get_name().".".$file_type;
            $rename_path=$upload_dir.$rename_name;
            rename($uplaod_file,$rename_path);
        // echo "<script> alert('上傳成功 $rename_path')</script> ";
            return $rename_path;
        }else{
            echo "上傳失敗(".$_FILES["about_file"]["error"].")";
            echo "檔案(".$uplaod_file.")";
        }
    }
    
}

//取得目前時間做為檔案名稱
function get_name(){
    $date=date('YmdHisv');
    return $date;
}



?>
