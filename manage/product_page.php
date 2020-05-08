
<!DOCTYPE html>
<html>
    <script type="text/javascript">
        function del_product(pid)//確認刪除產品後，刪除產品
        {
            if (confirm("確認刪除產品?"))
            location.href="del_product.php?product_id="+pid;
        }
    </script>

<?php include("manage_header.php");?>
    <?php include("manage_menu.php");?>
    <div id="main-content">
        <?php include("product_list.php"); ?>
    </div>

</html>