<?php //測試連線到GCP 建立資料庫及資料表
/*
$dbhost='104.199.143.86:3306';
$dbuser='root';
$dbpass='xhugh0929';
$db='mydb';
*/
$dbhost='35.201.133.145:3306';
$dbuser='yadance';
$dbpass='Yandance&888';
$db='yandance';
$host='35.201.133.145';
$port='3306';

//建立資料庫連線1 
$link=mysqli_connect($dbhost,$dbuser,$dbpass,$db);//建立連線
if(! $link) {
    die ('Connect Fail:'. mysqli_error($link));
}
echo 'Connect Sueccess';

//查詢資料的SQL
$sql_query="SELECT product_id, product_name, product_content, product_img FROM product";
$query=mysqli_query($link, $sql_query);//執行SQL
if(!$query)
    {
        die('資料讀取失敗:'.mysqli_error($link));
    }
    echo '<h2>測試方法一取得資料</h2>';
    echo '<table>
    <tr>
        <td>編號</td><td>名稱</td><td>內容</td><td>圖片</td>
    </tr>';
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
    {
        echo"<tr><td>{$row['product_id']}</td>".
        "<td>{$row['product_name']}</td>".
        "<td>{$row['product_content']}</td>".
        "<td>{$row['product_img']}</td>".
        "</tr>";
    }
    echo '</table>';
    mysqli_free_result($query);//釋放記憶體
mysqli_close($link);

//建立資料庫連線2 -------------------------
$link= new mysqli($dbhost,$dbuser,$dbpass,$db);//建立連線
if($link->connect_error) {
    die ('Connect Fail:'. mysqli_error($link));
}
echo 'Connect Sueccess';
//mysqli_select_db($link,$db);

//查詢資料的SQL
$sql_query="SELECT product_id, product_name, product_content, product_img FROM product";
$query=$link->query($sql_query);//執行SQL
if(!$query)
    {
        die('資料讀取失敗:'.mysqli_error($link));
    }
    echo '<h2>測試方法二取得資料</h2>';
    echo '<table>
    <tr>
        <td>編號</td><td>名稱</td><td>內容</td><td>圖片</td>
    </tr>';
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
    {
        echo"<tr><td>{$row['product_id']}</td>".
        "<td>{$row['product_name']}</td>".
        "<td>{$row['product_content']}</td>".
        "<td>{$row['product_img']}</td>".
        "</tr>";
    }
    echo '</table>';
    $query->free();//釋放查詢結果記憶體
    $link->close();//結束連線


?>