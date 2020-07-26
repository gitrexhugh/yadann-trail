<?php 
    require_once("manage/fundation_func.php");
    require_once("manage/contact_func.php");
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("template/head-info.php");?>
</head>
<?php include("template/header.php");?>
<?php include("sub-pages/banner.php");?>
<div id="main-content">
    <?php include("template/nav-bar.php");?>
    <?php
        if ($_SERVER['QUERY_STRING'])//取的網址中的參數，若有參數則取得pid
        {
            $rno=entities_fix_string($link,$_GET["rno"]);
            $con_ID=entities_fix_string($link,$rno);
            //載入左側產品選單
            //include("template/sub-menu-product.php");

            //帶入DB Link, 產品ID取得產品物件資料
            $contact_info=get_contact_info_wlink($link,$con_ID);
            $con_name=$contact_info->con_name;
            $con_mail=$contact_info->con_mail;
            $con_tel=$contact_info->con_tel;
            $con_company=$contact_info->con_company;
            $con_content=$contact_info->con_content;
            $con_id=$contact_info->con_id;
            send_contact_mail($con_name,$con_mail,$con_tel,$con_company,$con_content,$con_id);

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

        }else//網址中無pid時，載入產品首頁
        {
            include("sub-pages/contact_form.php");
            //include("trail_product2.php");
            
        }
    ?>
    <?php// include("sub-pages/contact_form.php");?>
    <?php include("footer.php");?>
    <?php //include("sub-pages/table_list.php");?>
</div>
</html>