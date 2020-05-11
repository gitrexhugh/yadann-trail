<html>
<head>
    <meta charset="utf-8">
    <title>管理系統</title>
    <script type="text/javascript">
       function KeyDown()//當按下Enter時，表示Click表單送出鍵
        {
        if (event.keyCode == 13)
            {
            event.returnValue=false;
            event.cancel = true;
            loginform.submit_btn.click();
            }
        }
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
        帳號<input name="account" type="text" class="form_col" onkeydown=KeyDown()><br> <!--帳號輸入欄位，偵測按鍵行為 -->
        密碼<input name="password" type="password" class="form_col" onkeydown=KeyDown()><br><!--密碼輸入欄位，偵測按鍵行為 -->
        <input class="submit" type="button" name="submit_btn" value="登入" onclick="check_data()"><!--表單送出鍵，Click後送出表單檢查資料 -->
    </form>
    
</div>
</html>