<!--檢查登入資訊，並顯示登入帳號  -->
<html lang="zh-TW">
<head>
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="manage.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        //刪除產品的Javascript
        function del_product(pid,pname)//確認刪除產品後，刪除產品
        {
            if (confirm("確認刪除產品"+pname+"?"))
            location.href="del_product.php?product_id="+pid;
        }

        //刪除產品的JS
        function del_img(img)//確認刪除圖片後，刪除圖片
        {
            if (confirm("確認刪除照片?"))
            location.href="del_product_img.php?img="+img;
        }

    </script>
    
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