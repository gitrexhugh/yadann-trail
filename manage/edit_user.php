<?php
//取得要編輯的user_id
$user_id=$_GET["ed_u"];
//取得資料庫設定與連線function
require_once("m_config.php");

//建立資料庫連線
$link=create_connection();

//查詢使用者清單
$sql_query="SELECT user_id, account, email,password FROM users WHERE user_id=$user_id";
$result= execute_sql($link,"mydb",$sql_query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$user_account=$row['account'];
$user_password=$row['password'];
$user_email=$row['email'];

?>

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
    <form action="chkuser.php?action=edit&ed_u=<?php echo "$user_id"?>" method="post" name="userform">
        帳號<input name="account" type="text" value=<?php echo "$user_account";?>>
        密碼<input name="password" type="password" value=<?php echo "$user_password";?>>
        email<input name="email" type="email" value=<?php echo "$user_email";?>>
    </form>
    <input type="button" value="修改" onclick="check_data()">


</div>
</html>
