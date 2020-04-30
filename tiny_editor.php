<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TinyMCE 測試</title>
    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
  </head>
  <body>
    <form>
      <textarea id="editor1">
      Hello World! 這是 TinyMCE!
      </textarea>
    </form>
    <script>
      tinymce.init({
        selector:'textarea'
        });
    </script>
  </body>
</html>
