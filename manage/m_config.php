<?php
	  
  function create_connection()
  {
    $ini = parse_ini_file('webconfig.ini',true);// 取得資料庫設定
    $db=$ini["database"]["db_name"];
    $dbhost=$ini["database"]["db_url"];
    $dbuser=$ini["database"]["db_user"];
    $dbpass=$ini["database"]["db_password"];
    //連線資料庫
    $link = mysqli_connect($dbhost,$dbuser,$dbpass)
      or die("無法建立資料連接: " . mysqli_connect_error());
	  
    mysqli_query($link, "SET NAMES utf8");
			   	
    return $link;
  }
	
  function execute_sql($link, $database, $sql)
  {
    mysqli_select_db($link, $database)
      or die("開啟資料庫失敗: " . mysqli_error($link));
						 
    $result = mysqli_query($link, $sql);
		
    return $result;
  }


?>