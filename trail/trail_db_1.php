<?php
$dbhost='104.199.143.86:3306';
$dbuser='root';
$dbpass='xhugh0929';
$link=mysqli_connect($dbhost,$dbuser,$dbpass);
if(! $link) {
    die ('Connect Fail:'. mysqli_error($link));
}
echo 'Connect Sueccess';
?>