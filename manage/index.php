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
</head>
    <form action="checkpwd.php" method="post" name="loginform">
        帳號<input name="account" type="text">
        密碼<input name="password" type="password">
    </form>
    <input type="button" value="登入" onclick="check_data()">
</html>