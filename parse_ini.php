<?php //測試連線到GCP 建立資料庫及資料表

$ini = parse_ini_file('ini_sample.ini',true);// 取得資料庫設定
      $db=$ini["config"]["db"];
      $dbhost=$ini["config"]["dbhost"];
      $dbuser=$ini["config"]["dbuser"];
      $dbpass=$ini["config"]["dbpass"];

      echo "db=$db <br>host=$dbhost<br>user=$dbuser<br>pass=$dbpass";

?>