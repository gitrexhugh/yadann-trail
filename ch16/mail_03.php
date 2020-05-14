<?php
  //設定收件者
  $to = "jean@hotmail.com";
  //設定郵件主旨
  $subject = "=?utf-8?B?" . base64_encode("HTML格式測試信") . "?=";  
  //設定郵件內容
  $message = "
    <!DOCTYPE html>
    <html>
      <head>
        <title></title>
      </head>
      <body bgcolor='#FFFFCC'>
        <p><h1>這是一封HTML格式的郵件</h1></p>
        <p><i>您可以使用任何HTML元素</i></p>
      </body>
    </html>
  ";
	
  //將寄件者的顯示名稱進行編碼
  $from_name = "=?utf-8?B?" . base64_encode("小丸子") . "?=";
  //設定Content-type郵件標頭資訊
  $headers  = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=utf-8\r\n";
  $headers .= "To: Jean<jean@hotmail.com>\r\n";
  $headers .= "From: $from_name<jean@seed.net.tw>\r\n";
  $headers .= "Cc: Jerry<jerry.php@m2k.com.tw>\r\n"; 
  //傳送郵件
  mail($to, $subject, $message, $headers);
?>