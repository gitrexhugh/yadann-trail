<?php include("a_config.php");?>//載入設定php檔 <!-- 同個框架下應該可以不用重複載入? -->

<!--以下為simditor文字編輯器 -->
<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="/simditor/site/assets/styles/simditor.css" />
<script type="text/javascript" src="/simditor/site/assets/scripts/jquery.min.js"></script>
<script type="text/javascript" src="/simditor/site/assets/scripts/module.js"></script>
<script type="text/javascript" src="/simditor/site/assets/scripts/hotkeys.js"></script>
<script type="text/javascript" src="/simditor/site/assets/scripts/uploader.js"></script>
<script type="text/javascript" src="/simditor/site/assets/scripts/simditor.js"></script>
</head>

<html>
<!--測試somditor -->
<textarea id="editor" placeholder="Balabala" autofocus></textarea>
<script type="text/javascript">
var editor = new Simditor({
  textarea: $('#editor');
  //optional options
  placeholder: '';
  defaultImage: 'images/image.png'
  params: {}
  upload: false
  tabIndent: true
  toolbar: true
  toolbarFloat: true
  toolbarFloatOffset: 0
  toolbarHidden: false
  pasteImage: false
  cleanPaste: false
});
</script>

</html>
