<?php 
    require_once("manage/fundation_func.php");
    require_once("manage/product_func.php");

?>

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
    //GET產品ID，若有ID則進入產品內頁，若無ID則進入產品首頁
    
        //$PRODUCT_ID=entities_fix_string($link,$_GET["pid"]);
        //if ($PRODUCT_ID)

        if ($_SERVER['QUERY_STRING'])//取的網址中的參數，若有參數則取得pid
        {
            $PRODUCT_ID=entities_fix_string($link,$_GET["pid"]);
            //載入左側產品選單
            include("template/sub-menu-product.php");

            //帶入DB Link, 產品ID取得產品物件資料
            $product=get_product_content_wlink($link,$PRODUCT_ID);
            $product_name=$product->product_name;
            $product_content=$product->product_content;
            $product_content=htmlspecialchars_decode($product_content);//還原編碼後的html內容
            $product_img=$product->product_img;
            $product_img="manage/".$product->product_img;
            
            //輸入產品資料到網頁上
            echo <<<_END
              <div id='product'>
              <h1 id='product_title'>$product_name</h1>
              <div id='product_imgs'><img src="$product_img"/></div>
              <article id='product_content'>$product_content</article>
              </div>
            _END;

        }else//網址中無pid時，載入產品首頁
        {
            include("sub-pages/product_page_index.php");
            //include("trail_product2.php");
            
        }
    ?>
    <?php include("footer.php");?>
    <?php //include("sub-pages/table_list.php");?>
</div>
</html>