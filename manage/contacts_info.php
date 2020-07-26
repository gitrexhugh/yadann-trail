<section class="form_formate">
    <title>聯絡資訊</title>
</section>
<?php
//取得資料庫設定與連線function
require_once("fundation_func.php");
require_once("contact_func.php");

$con_id = entities_fix_string($link, $_GET['rno']);
$contact_info = get_contact_info_wlink($link, $con_id);
$con_name = $contact_info->con_name;
$con_mail = $contact_info->con_mail;
$con_tel = $contact_info->con_tel;
$con_company = $contact_info->con_company;
$con_content = $contact_info->con_content;

//輸入產品資料到網頁上
echo <<<_END
    <section id="contact_us">
        <dv id="contact_form">
        <div id="contact_disc">感謝您的來信，我們會盡快回覆；感謝。</div>
            <div class="contact_form_col">
                <div class="col_title">您的姓名</div>
                <div class="contact_review">$con_name</div>
            </div>
            <div class="contact_form_col">
                <div class="col_title">聯絡信箱</div>
                <div class="contact_review">$con_mail</div>
            </div>
            <div class="contact_form_col">
                <div class="col_title">聯絡電話</div>
                <div class="contact_review">$con_tel</div>
            </div>
            <div class="contact_form_col">
                <div class="col_title">貴公司名稱</div>
                <div class="contact_review">$con_company</div>
            </div>
            <div class="contact_form_col">
                <div class="col_title">需求訊息</div>
                <div class="contact_review">$con_content</div>
            </div>
        </div>
    </section>

_END;



?>