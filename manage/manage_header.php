<!--檢查登入資訊，並顯示登入帳號  -->
<html lang="zh-TW">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="manage.css">
</head>

<div id="header">
    <div id="id_info">
        <?php 
        $passed=$_COOKIE["passed"];
       // echo "Pass=$passed";
        if($passed!="TRUE"){ // 若未存在成功登入過的cookie 則進入登入頁
            header("location:index.php");
            exit();
        }
        else // 已存在成功登入過的cookie 則進入管理頁
        {
            $account=$_COOKIE["account"];
            echo "Hi! $account 已登入";
           // header("location:manage.php"); 
        } ?>
    </div>
</div>
</html>