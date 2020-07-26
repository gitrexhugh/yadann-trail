<?php
$dbhost='35.201.133.145:3306';
$dbuser='yadance';
$dbpass='Yandance&888';
$db='yandance';
$host='35.201.133.145';
$port='3306';

//連線資料庫1
$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
if(!$conn){
    die("無法建立資料連接: " . mysqli_connect_error());
} else{
    $sql_query="SHOW TABLES";
    $result = mysqli_query($conn, $sql);
    if(!$result)//若$query無資料，則顯示資料庫讀取失敗
        {
            die('無資料'.mysqli_error($link));
        }else{
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                echo $row['Tables_in_yandance'];
            }
            mysqli_free_result($result);//釋放記憶體
            mysqli_close($link);
        }
}
 


?>