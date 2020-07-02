<?php include("a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("template/head-info.php");?>
</head>
<?php include("template/header.php");?>
<?php include("sub-pages/banner.php");?>
<div id="main-content">
    <?php include("template/nav-bar.php");?>
    <?php
        $PRODUCT_ID=$_GET['pid'];
        if ($PRODUCT_ID)
        {
            include("template/sub-menu-product.php");
            include("sub-pages/product_page.php");
            //echo "product_page";
        }else
        {
            include("sub-pages/product_page_index.php");
            //include("trail_product2.php");
            
        }
    ?>
    <?php include("template/footer.php");?>
    <?php //include("sub-pages/table_list.php");?>
</div>
</html>