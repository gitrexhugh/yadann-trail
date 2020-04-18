<?php 
if(!isset($_POST['submit'])){ 
//如果沒有表單提交，顯示一個表單 
?>
 <form method="POST" action="">
        標題：<input name="title_col" type="text"></br>
        內容：<input name="content_col" type="text"></br>
        <input name="submit" type="submit" value="送出"/>
    </form>
<?php
}
else
{
 
//定義要寫入資料庫中的title, content為form中的title_col、content_col
$title=$_POST['title_col'];
$content=$_POST['content_col'];
$time = date ("Y-m-d H:i:s");//php時間函數取得系統時間，格式為yyyy-mm-dd hh:mm:ss

//寫入資料的SQL
$sql_add="INSERT INTO trail_tb1". //插入的資料表":trail_tb1"
"(title,content,pub_date)". //寫入資料title, content, pubdate欄位
"VALUES".
"('$title','$content','$time')"; //寫入欄位的值

mysqli_select_db($link,'mydb'); //帶入$link(資料庫連線資訊)並選擇資料庫
$query=mysqli_query($link, $sql_add);//透過mysql_query指令執行SQL
if(!$query)
    {
        die('資料插入失敗:'.mysqli_error($link));
    }
    echo '資料插入成功';
mysqli_close($link);

}

?>
