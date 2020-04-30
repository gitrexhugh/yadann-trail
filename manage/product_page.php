
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
        function del_product(pid)
        {
            if (confirm("確認刪除產品?"))
            location.href="del_user.php?user_id="+pid;
        }
    </script>

</head>
<?php include("manage_header.php");?>
<div id="main-content">
<?php include("manage_menu.php");?>
    <?php include("product_list.php"); ?>

</div>
</html>