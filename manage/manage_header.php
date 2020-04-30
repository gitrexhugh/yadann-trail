<!--檢查登入資訊，並顯示登入帳號  -->
<?php 
$passed=$_COOKIE["passed"];
echo "Pass=$passed";
if($passed!="TRUE"){
    header("location:index.php");
    exit();
}
else
{
    $account=$_COOKIE["account"];
    echo "登入帳號為:$account";

} ?>
<div id="header">
</div>