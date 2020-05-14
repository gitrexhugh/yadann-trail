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
<?php include("upload_form.php") ?>

    <form action="trail_chk.php?action=add" method="post" name="productform">
        產品名稱<input name="product_name" type="text"></br>
        是否發布<input type="radio" name="publish" vlaue="true">是<input type="radio" name="publish" value="false">否</br>
        產品介紹<textarea id="editor1" name="product_content" type="textarea"></textarea>
        <input type="button" value="新增" onclick="check_data()">
    </form>
    


</html>
