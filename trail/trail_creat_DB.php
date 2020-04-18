<?php //測試連線到GCP 建立資料庫及資料表
$dbhost='104.199.143.86:3306';
$dbuser='root';
$dbpass='xhugh0929';
$link=mysqli_connect($dbhost,$dbuser,$dbpass);
if(! $link) {
    die ('Connect Fail:'. mysqli_error($link));
}
echo 'Connect Sueccess';
$sql="CREATE TABLE trail_tb1 (
    "." id INT NOT NULL AUTO_INCREMENT,
    "." title VARCHAR(100) NOT NULL,
    "." content VARCHAR(100) NOT NULL,
    "." pub_date DATE,
    "." PRIMARY KEY (id))
    ENGINE=InnoDB DEFAULT CHARSET=utf8;";
mysqli_select_db($link,'mydb');
$query=mysqli_query($link, $sql);
if(!$query)
    {
        die('資料表建立失敗:'.mysqli_error($link));
    }
    echo '建立成功';
mysqli_close($link);


?>