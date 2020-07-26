<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
        function check_data()
        {
            if (document.userform.account.value.length==0)
            alert("請輸入帳號");
            else if (document.userform.password.value.length==0)
            alert("請輸入密碼");
            else if (document.userform.email.value.length==0)
            alert("請輸入E-Mail");
            else if (document.userform.ustat.value==0)
            alert("帳號未啟用");
            else
            userform.submit();
        }
    </script>
</head>
<?php include("manage_header.php");?>
<?php include("manage_menu.php");?>
<div id="main-content">

<section class="form_formate">
    <title>新增使用者</title>
    <a href="user_page.php">返回</a>
    <form id="edit_user_form" action="chkuser.php" method="post" name="userform">
        <div class="edit_form_col">帳號<input name="account" type="text"></div>
        <div class="edit_form_col">密碼<input name="password" type="password"></div>
        <div class="edit_form_col">email<input name="email" type="email"></div>  
        <div class="edit_form_col">是否啟用
            <input type="radio" name="ustat" value="1" checked>是</input>
            <input type="radio" name="ustat" value="0">否</input>
        </div>
    </form>
    <input class="form_submit" type="button" value="新增" onclick="check_data()">
</section>


</div>
</html>
