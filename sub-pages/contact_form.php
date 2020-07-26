<?php 
require_once("manage/fundation_func.php");
//require_once("product_func.php");

?>

<!DOCTYPE html>
<script type="text/javascript">
        function check_data()
        {
            emailRule = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
            if (document.contactform.name.value.length==0){
                alert("請輸入您的姓名");                
            }else if(document.contactform.email.value.length==0 ||document.contactform.email.value.search(emailRule)==-1 ){
                alert("信箱格式有誤");  
            }else if(document.contactform.request_info.value.length==0 ){
                alert("請輸入您的需求"); 
            }
            else{
                contactform.submit();
            }            
        }
</script>

<html>
<section id="contact_us">
    
    <form id="contact_form" action="manage/chkcontact.php" method="post" name="contactform" enctype="multipart/form-data">
    <div id="contact_title">聯絡我們</div>
    <div id="contact_disc">感謝您對我們的產品有興趣，請自以下輸入您的需求內容，我們會盡快回覆；感謝。</div>
        <div class="contact_form_col">
            <div class="col_title">您的姓名(必填)</div><input class="contact_input" name="name" type="text">
        </div>
        <div class="contact_form_col">
            <div class="col_title">聯絡信箱(必填)</div><input class="contact_input" name="email" type="text">
        </div>
        <div class="contact_form_col">
            <div class="col_title">聯絡電話</div><input class="contact_input" name="telephone" type="text" >
        </div>
        <div class="contact_form_col">
            <div class="col_title">貴公司名稱</div><input class="contact_input" name="company_name" type="text" >
        </div>
        <div class="contact_form_col">
            <div class="col_title">需求訊息(必填)</div><textarea id="request_info" name="request_info" type="textarea"></textarea>
        </div>
        <input class="contact_submit" type="button" value="送出" onclick="check_data()"></input>
    </form>
</section>
</div>