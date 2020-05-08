<html>
<head>
    <meta charset="utf-8">
    <title>管理系統</title>
    <script type="text/javascript">
        function check_data()
        {
            if (document.loginform.account.value.length==0)
            alert("請輸入帳號");
            else if (document.loginform.password.length==0)
            alert("請輸入密碼");
            else
            loginform.submit();
        }
    </script>
    <link rel="stylesheet" type="text/css" href="manage.css">
</head>
<div id="login">
    <form action="checkpwd.php" method="post" name="loginform">
        帳號<input name="account" type="text" class="form_col"> </br>
        密碼<input name="password" type="password" class="form_col">
    </form>
    <input class="submit" type="button" value="登入" onclick="check_data()">
</div>
</html>