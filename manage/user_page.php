
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
        function del_user(uid)
        {
            if (confirm("確認刪除使用者?"))
            location.href="del_user.php?user_id="+uid;
        }
    </script>

</head>
<?php include("manage_header.php");?>
<div id="main-content">
<?php include("manage_menu.php");?>
    <?php include("user_list.php"); ?>

</div>
</html>