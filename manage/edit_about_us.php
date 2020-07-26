<?php

//取得資料庫設定與連線function
require_once("fundation_func.php");
require_once("about_func.php");

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

<!--html編輯頁面 -->
<!DOCTYPE html>
<html>
<script src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">
        function check_data()
        {
            if (document.aboutform.company_name.value.length==0)
            alert("請輸入產品名稱");
            else
            edit_about_form.submit();
        }
</script>
<script>
      tinymce.init({
        selector:'textarea',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
</script>
<?php include("manage_header.php");?>
<?php include("manage_menu.php");?>
<div id="main-content">
<section class="form_formate">
    <title>編輯關於我們</title>
    <form id="edit_about_form" action="chkabout.php" method="post" name="aboutform" enctype="multipart/form-data">
        <div class="edit_form_col">公司名稱<input name="company_name" type="text" value=<?php echo "$company_name";?>></div>
        <div class="edit_form_col">聯絡電話<input name="about_us_tel" type="text" value=<?php echo "$about_us_tel";?>></div>
        <div class="edit_form_col">聯絡信箱<input name="about_us_mail" type="text" value=<?php echo "$about_us_mail";?>></div>
        <div class="edit_form_col">公司地址<input name="about_us_address" type="text" value=<?php echo "$about_us_address";?>></div>
        <div class="edit_form_col">傳真號碼<input name="about_us_fax" type="text" value=<?php echo "$about_us_fax";?>></div>
       <!-- 
        <div class="edit_form_col">
        關於我們圖片<input type="file" name="about_file" value=<?php  echo "$about_file";?>><br>
        </div>
    -->
        <div class="edit_form_col">公司標語<input name="slogan" type="text" value=<?php echo "$slogan";?>></div>
        <p>關於我們介紹</p>
        <textarea id="about_editor" name="about_us" type="textarea" style="height: 500px;"><?php echo "$about_us";?></textarea>
        <input class="form_submit" type="button" value="修改" onclick="check_data()"></input>
    </form>
</section>
</div>
</html>

