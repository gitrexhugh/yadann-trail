<?php
//取得要編輯的user_id
$user_id=$_GET["ed_u"];
//取得資料庫設定與連線function
//require_once("m_config.php");
require_once("fundation_func.php");

//建立資料庫連線
//$link=create_connection();
$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
if($link->connect_error) {
die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
}else{
    //查詢使用者清單
    $sql_query="SELECT u_ac, user_email,user_password FROM hash_user WHERE user_id=$user_id";
    $result=$link->query($sql_query);
//    $result= execute_sql($link,"mydb",$sql_query);
    $row=$result->fetch_array(MSQLI_ASSOC);
//    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $user_account=$row[u_ac];
    $user_password=$row[user_password];
    $user_email=$row[user_email];
}

?>

<!--html編輯頁面 -->
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
<?php include("manage_menu.php");?>
<div id="main-content">
<section class="form_formate">
    <title>編輯使用者</title>
    <a href="user_page.php">返回</a>
    <form id="edit_user_form" action="chkuser.php?action=edit&ed_u=<?php echo "$user_id"?>" method="post" name="userform">
        <div class="edit_form_col">帳號<input name="account" type="text" value=<?php echo "$user_account";?>></div>
        <div class="edit_form_col">密碼<input name="password" type="password" value=<?php echo "$user_password";?>></div>
        <div class="edit_form_col">email<input name="email" type="email" value=<?php echo "$user_email";?>></div>        
    </form>
    <input class="form_submit" type="button" value="修改" onclick="check_data()">
</section>
</div>
</html>
