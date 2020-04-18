<?php //測試連線到GCP使用config.ini讀取資料庫設定
$ini = parse_ini_file('webconfig.ini',true);

$db=$ini["database"]["db_name"];
$dbhost=$ini["database"]["db_url"];
$dbuser=$ini["database"]["db_user"];
$dbpass=$ini["database"]["db_password"];
/*  //輸出取得自ini檔案中的各變數資料
echo("db=$db");
echo("dbhost=$dbhost");
echo("dbuser=$dbuser");
echo("dbpass=$dbpass");
*/

$link=mysqli_connect($dbhost,$dbuser,$dbpass);//建立連線
if(! $link) {
    die ('Connect Fail:'. mysqli_error($link));
}
echo 'Connect Sueccess';
mysqli_select_db($link, $db);

//查詢資料的SQL
$sql_query="SELECT id, title, content, pub_date FROM trail_tb1";

mysqli_select_db($link,'mydb'); //選擇資料庫

$query=mysqli_query($link, $sql_query);//執行SQL
if(!$query)
    {
        die('資料讀取失敗:'.mysqli_error($link));
    }
    echo '<h2>測試取得資料</h2>';
    echo '<table>
    <tr>
        <td>編號</td><td>標題</td><td>內容</td><td>日期</td>
    </tr>';
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
    {
        echo"<tr><td>{$row['id']}</td>".
        "<td>{$row['title']}</td>".
        "<td>{$row['content']}</td>".
        "<td>{$row['pub_date']}</td>".
        "</tr>";
    }
    echo '</table>';
    mysqli_free_result($query);//釋放記憶體
mysqli_close($link);


?>