<html>
    <div id="banner">
        <img src="images/banner-sample.jpg" />
    </div>
</html>

<?php //測試連線到GCP 建立資料庫及資料表
/*
mysqli_select_db($link,'mydb');

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

*/
?>