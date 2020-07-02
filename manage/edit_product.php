<?php

//取得資料庫設定與連線function
require_once("fundation_func.php");
require_once("product_func.php");

$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
$q_product_id=entities_fix_string($link,$_GET["ed_p"]);
$product=get_product_content_wlink($link,$q_product_id);
$product_id=$product->product_id;
$product_name=$product->product_name;
$product_content=$product->product_content;
$product_img=$product->product_img;
//echo "ID=$product_id<br>Name=$product_name<br>content=$product_content<br>img=$product_img";


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
        selector:'textarea',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
</script>
<?php include("manage_header.php");?>
<?php include("manage_menu.php");?>
<div id="main-content">
<section class="form_formate">
    <title>編輯產品</title>
    <a href="product_page.php">返回</a>
    <form id="edit_product_form" action="chkproduct.php?action=edit&ed_p=<?php echo "$product_id"?>" method="post" name="productform" enctype="multipart/form-data">
        <div class="edit_form_col">產品名稱<input name="product_name" type="text" value=<?php echo "$product_name";?>></div>
        <div class="edit_form_col">
            <input type="file" name="myfile" value=<?php  echo "$product_img";?>><br>
        </div>
        <?php 
        //echo "$is_publish";
            if($is_publish)//檢查是否發布 is_publish的值來顯示radio button
                {
                    $publish="是";
                    echo "<div class=\"edit_form_col\">是否發布".
                        "<input type=\"radio\" name=\"publish\" value=\"1\" checked>是</input><input type=\"radio\" name=\"publish\" value=\"0\">否</input></div>";
                }else{
                    $publish="否";
                    echo "<div class=\"edit_form_col\">是否發布".
                        "<input type=\"radio\" name=\"publish\" value=\"1\" >是</input><input type=\"radio\" name=\"publish\" value=\"0\" checked>否</input></div>";
                }
         ?>  
        <p>產品介紹</p>
        <textarea id="editor1" name="product_content" type="textarea"><?php echo "$product_content";?></textarea>
        <input class="form_submit" type="button" value="修改" onclick="check_data()"></input>
    </form>
</section>
</div>
</html>

