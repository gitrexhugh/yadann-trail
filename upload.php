<?php 
//設定上傳檔案目錄
$upload_dir="upload_img/";
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
    echo "上傳成功 $rename_path";
    
}else{
    echo "上傳失敗(".$_FILES["myfile"]["error"].")";
}

function get_name(){
    $date=date('YmdHisv');
    return $date;
}

?>
