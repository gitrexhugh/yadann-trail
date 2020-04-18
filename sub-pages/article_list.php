<?php //測試連線到GCP 建立資料庫及資料表
mysqli_select_db($link,'mydb');//連線到資料庫mydb

//查詢標題、發布日欄位的SQL
$sql_query="SELECT title, post_date FROM article_list";

$query=mysqli_query($link, $sql_query);//執行SQL查詢資料，查詢後存到$query中
if(!$query)//若$query無資料，則顯示資料庫讀取失敗
    {
        die('資料讀取失敗:'.mysqli_error($link));
    }
    //讀取資料庫資料以Table顯示
    echo '<table id="sty_article_list">
    <tr id="sty_list_headline"> 
        <td>標題</td><td>日期</td>
    </tr>';
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))//以mysqli_fetch_array()逐筆取得資料庫資料後顯示到欄位中
    {
        echo"<tr id=\"sty_list_content\">".
        "<td>{$row['title']}</td>".
        "<td>{$row['post_date']}</td>".
        "</tr>";
    }
    echo '</table>';
    mysqli_free_result($query);//釋放記憶體
mysqli_close($link);


?>