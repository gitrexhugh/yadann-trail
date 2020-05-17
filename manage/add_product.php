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
    <title>新增產品</title>
    <a href="product_page.php">返回</a>

        <form action="chkproduct.php?action=add" method="post" name="productform" enctype="multipart/form-data">
        <div class="edit_form_col">
            產品名稱<input name="product_name" type="text">
        </div>
        <div class="edit_form_col">
            產品圖片<input type="file" name="myfile">
        </div>
        <div class="edit_form_col">
            是否發布<input type="radio" name="publish" value="1">是<input type="radio" name="publish" value="0">否
        </div>
            <p>產品介紹</p>
            <textarea id="editor1" name="product_content" type="textarea"></textarea>
            <input class="form_submit" type="button" value="新增" onclick="check_data()"></input>
        </form>
       
        </section>

</div>
</html>
