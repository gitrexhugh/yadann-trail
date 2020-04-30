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
            else
            userform.submit();
        }
    </script>
</head>
<?php include("manage_header.php");?>
<div id="main-content">
<?php include("manage_menu.php");?>
    <form action="chkuser.php" method="post" name="userform">
        帳號<input name="account" type="text">
        密碼<input name="password" type="password">
        email<input name="email" type="email">
    </form>
    <input type="button" value="新增" onclick="check_data()">


</div>
</html>
