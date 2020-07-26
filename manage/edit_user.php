<?php

//取得資料庫設定與連線function
require_once("fundation_func.php");
require_once("user_func.php");

//取得要編輯的user_id
$usid=$_GET["edu"];

$uinfo=get_user_info_wlink($link,$usid);
$usid=$uinfo->usid;
$uacnt=$uinfo->uacnt;
$upswd=$uinfo->upswd;
$umail=$uinfo->umail;
$ulgtime=$uinfo->ulgtime;
$ustat=$uinfo->ustat;

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
    <form id="edit_user_form" action="chkuser.php?edu=<?php echo "$usid"?>" method="post" name="userform">
        <div class="edit_form_col">帳號<input name="account" type="text" value=<?php echo "$uacnt";?>></div>
        <div class="edit_form_col">密碼<input name="password" type="password" value=<?php echo "$upswd";?>></div>
        <div class="edit_form_col">email<input name="email" type="email" value=<?php echo "$umail";?>></div>  
        <?php 
        //echo "$is_publish";
            if($ustat)//檢查是否發布 is_publish的值來顯示radio button
                {
                    //$ustat="是";
                    echo "<div class=\"edit_form_col\">是否啟用".
                        "<input type=\"radio\" name=\"ustat\" value=\"1\" checked>是</input><input type=\"radio\" name=\"ustat\" value=\"0\">否</input></div>";
                }else{
                    //$ustat="否";
                    echo "<div class=\"edit_form_col\">是否啟用".
                        "<input type=\"radio\" name=\"ustat\" value=\"1\" >是</input><input type=\"radio\" name=\"ustat\" value=\"0\" checked>否</input></div>";
                }
         ?>        
    </form>
    <input class="form_submit" type="button" value="修改" onclick="check_data()">
</section>
</div>
</html>
