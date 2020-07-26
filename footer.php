<?php
//require_once("a_config.php");
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

?>

<footer>
    <ul>
        <li><a href="#">整合產品銷售</a></li>
        <li><a href="#">產品資訊</a></li>
        <li><a href="#">聯絡我們</a></li>
        <li><a href="#">關於曄電</a></li>
    </ul>
    <address>
        <p><?php echo "$company_name";?></p>
        <p><?php echo "地址：$about_us_address";?></p>
        <p><?php echo "聯絡電話：$about_us_tel";?> &nbsp; |&nbsp; <?php echo "傳真：$about_us_fax";?></p>
    </address>
</footer>