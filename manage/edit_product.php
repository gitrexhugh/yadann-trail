<?php
//取得要編輯的product_id
$product_id=$_GET["ed_p"];
//取得資料庫設定與連線function
require_once("m_config.php");

//建立資料庫連線
$link=create_connection();

//查詢產品資料
$sql_query="SELECT product_id,product_name, product_img, tags, product_content, is_publish FROM product WHERE product_id=$product_id";
$result= execute_sql($link,"mydb",$sql_query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$product_id=$row['product_id'];
$product_name=$row['product_name'];
$product_img=$row['product_img'];
$product_content=$row['product_content'];
$is_publish=$row['is_publish'];

?>
<!--html編輯頁面 -->
<!DOCTYPE html>
<html>
<script src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">
        function check_data()
        {
            if (document.productform.product_name.value.length==0)
            alert("請輸入產品名稱");
            else
            productform.submit();
        }
</script>
<script>
      tinymce.init({
        selector:'textarea'
        });
</script>
<?php include("manage_header.php");?>
<?php include("manage_menu.php");?>
<div id="main-content">
<section class="form_formate">
    <title>編輯產品</title>
    <a href="product_page.php">返回</a>
    <form id="edit_product_form" action="chkproduct.php?action=edit&ed_p=<?php echo "$product_id"?>" method="post" name="productform">
        <div class="edit_form_col">產品名稱<input name="product_name" type="text" value=<?php echo "$product_name";?>></div>
        <div class="edit_form_col">產品圖片<input name="product_img" type="text" value=<?php echo "$product_img";?>></div>
        <?php 
            if(!$row['is_publish'])//檢查是否發布 is_publish的值來顯示radio button
                {
                    $publish="是";
                    echo "<div class=\"edit_form_col\">是否發布".
                         "<input type=\"radio\" name=\"publish\" vlaue=\"1\" checked=\"true\">是<input type=\"radio\" name=\"publish\" value=\"0\">否</div>";
                }else{
                    $publish="否";
                    "<input type=\"radio\" name=\"publish\" vlaue=\"0\" >是<input type=\"radio\" name=\"publish\" value=\"0\" checked=\"true\">否</div>";
                }
         ?>  
        產品介紹<textarea id="editor1" name="product_content" type="textarea"><?php echo "$product_content";?></textarea>
    </form>
    <input class="form_submit" type="button" value="修改" onclick="check_data()">
</section>
</div>
</html>
