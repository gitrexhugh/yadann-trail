<?php
  //設定收件者
  $to = "jean@hotmail.com";
	
  //設定寄件者
  $from = "jean@seed.net.tw";

  //設定郵件主旨
  $subject = "=?utf-8?B?" . base64_encode("附加檔案測試") . "?=";

  //設定郵件內容
  $message = "
    <!DOCTYPE html>
    <html>
      <head>
        <title></title>
      </head>
      <body>
        <p><h1>這封郵件可以傳送附加檔案</h1></p>
        <p><i>您可以附加任何類型的檔案</i></p>
      </body>
    </html>
  ";
	
  //設定要傳送的附加檔案
  $file_name = ".\bird.jpg";

  //呼叫mail_attach()函式來傳送郵件	
  mail_attach($to, $from, $subject, $message, $file_name);

  //自訂mail_attach()函式來傳送郵件
  function mail_attach($to, $from, $subject, $message, $file_name)
  {
    $big5_file_name = iconv("UTF-8", "Big5", $file_name);
	
    //建立MIME邊界字串
    $mime_boundary = md5(uniqid(mt_rand(), TRUE));
		
    //開啟指定的檔案
    $fp = fopen($big5_file_name, "rb");
		
    //讀取檔案內容
    $data = fread($fp, filesize($big5_file_name));
		
    //使用MIME base64來對 $data編碼
    $data = chunk_split(base64_encode($data));
		
    //建立郵件標頭資訊
    $header = "From: $from\r\n";
    $header.= "To: $to\r\n";
    $header.= "MIME-Version: 1.0\r\n";
    $header.= "Content-Type: multipart/mixed; boundary=$mime_boundary\r\n";
		
    //建立郵件內容
    $content = "This is a multi-part message in MIME format.\r\n";
    $content .= "--$mime_boundary\r\n";
    $content .= "Content-Type: text/html; charset=utf-8\r\n";
    $content .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
    $content .= "$message\r\n";
		
    //加入附加檔案
    $content .= "--$mime_boundary\r\n";		
    $content .= "Content-Type: image/pjpeg; name=". basename($file_name) . "\r\n"; 
    $content .= "Content-Disposition: attachment; filename=" . basename($file_name) ."\r\n";					
    $content .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $content .= "$data\r\n";
    $content .= "--$mime_boundary--\r\n";
		
    //傳送郵件
    mail($to, $subject, $content, $header);
  }
?>