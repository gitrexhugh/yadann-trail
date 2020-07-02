<!DOCTYPE html>
<html>
    <script type="text/javascript">
        function del_user(uid)
        {
            if (confirm("確認刪除使用者?"))//確認刪除使用者後，刪除產品
            location.href="del_user.php?du="+uid;
        }
    </script>

<?php include("manage_header.php");?>
    <?php include("manage_menu.php");?>
    <div id="main-content">
        <?php include("user_list.php"); ?>
    </div>
</html>