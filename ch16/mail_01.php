<?php
  //設定收件者
  $to = "jean@hotmail.com";

  //設定郵件主旨
  $subject = "測試信";
  $subject = "=?utf-8?B?" . base64_encode($subject) . "?=";
  
  //設定郵件內容
  $message = "這是一封測試信\n\n若您收到此封信，表示測試成功。";

  //傳送郵件
  mail($to, $subject, $message);
?>