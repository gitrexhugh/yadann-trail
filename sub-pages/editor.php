<?php include("a_config.php");?>//載入設定php檔 <!-- 同個框架下應該可以不用重複載入? -->

<!--以下為simditor文字編輯器 -->
<!DOCTYPE html>
<head>
  <!--
  <script
    type="text/javascript"
    src="tinymce/js/tinymce/tinymce.min.js"
    referrerpolicy="origin">
  </script>
-->
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
</head>

<body>
  <form>
    <textarea id="myTextarea"></textarea>
  </form>
  <script>
      tinymce.init({
        selector:'textarea'
        });
    </script>
</body>

