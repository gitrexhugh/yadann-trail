
<form action="upload.php" method="post" name="upload_img" enctype="multipart/form-data">
        <div class="edit_form_col">
            <input type="hidden" name="MAX_FILE_SIZE" value="20048576">
            <input type="file" name="myfile"><br>
        </div>
        <input type="submit" value="上傳" action="upload()">
</form>

<!--upload Function -->
<script type="text/javascript">
        function upload()
        {
            if (document.upload_img.myfile.value.length==0)
            alert("請輸入產品名稱");
            else
            upload_img.submit();
        }
</script>
