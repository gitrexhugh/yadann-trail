<?php
  //取得表單資料
  $from_name = "=?utf-8?B?" . base64_encode($_POST["from_name"]) . "?=";
  $from_email = $_POST["from_email"];	
  $to_name = "=?utf-8?B?" . base64_encode($_POST["to_name"]) . "?=";
  $to_email = $_POST["to_email"];	
  $format = $_POST["format"];
  $subject = "=?utf-8?B?" . base64_encode($_POST["subject"]) . "?=";
  $message = $_POST["message"];
  $message = "
    <!DOCTYPE html>
    <html>
      <head>
        <title></title>
      </head>
      <body>
        $message
      </body>
    </html>
  ";
	
  //設定郵件標頭資訊
  $headers  = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/$format; charset=utf-8\r\n";
  $headers .= "To: $to_name<$to_email>\r\n";
  $headers .= "From: $from_name<$from_email>\r\n";
	
  //傳送郵件
  mail($to_email, $subject, $message, $headers);
?>