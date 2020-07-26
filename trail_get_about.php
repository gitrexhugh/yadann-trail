<?php
require_once("a_config.php");
require_once("manage/about_func.php");
//$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
$about_info=get_about_info_wlink($link);
$slogan=$about_info->slogan;
$about_us=$about_info->about_us;
$about_us_tel=$about_info->about_us_tel;
$about_us_address=$about_info->about_us_address;
$about_us_fax=$about_info->about_us_fax;
$about_us_mail=$about_info->about_us_mail;
$company_name=$about_info->company_name;

echo "Name:$company_name"

?>

