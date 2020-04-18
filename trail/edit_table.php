<?php //測試連線到GCP 建立資料庫及資料表
/*
$dbhost='104.199.143.86:3306';
$dbuser='root';
$dbpass='xhugh0929';
$link=mysqli_connect($dbhost,$dbuser,$dbpass);//建立連線
if(! $link) {
    die ('Connect Fail:'. mysqli_error($link));
}
echo 'Connect Sueccess';
*/
$title='標題文字0414';
$content='測試內容文字0414';
$time='2020-04-14';

//寫入資料的SQL
$sql_add="INSERT INTO trail_tb1". //插入的資料表
"(title,content,pub_date)". //寫入資料欄位
"VALUES".
"('$title','$content','$time')"; //寫入的資料

mysqli_select_db($link,'mydb'); //選擇資料庫

$query=mysqli_query($link, $sql_add);//執行SQL
if(!$query)
    {
        die('資料插入失敗:'.mysqli_error($link));
    }
    echo '資料插入成功';
mysqli_close($link);


?>