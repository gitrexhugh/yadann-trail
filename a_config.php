<?php

    //連線資料庫Function
    function create_connection()
    {
      $ini = parse_ini_file('manage/webconfig.ini',true);// 取得資料庫設定
      $db=$ini["database"]["db"];
      $dbhost=$ini["database"]["dbhost"];
      $dbuser=$ini["database"]["dbuser"];
      $dbpass=$ini["database"]["dbpass"];
      
      //連線資料庫2
      $con=new mysqli($dbhost, $dbuser, $dbpass, $db);
      if ($con->connect_error) die("無法建立資料連接: " . mysqli_connect_error());      
      
      /*
      //連線資料庫1
      $link = mysqli_connect($dbhost,$dbuser,$dbpass)
        or die("無法建立資料連接: " . mysqli_connect_error());
        
      mysqli_query($link, "SET NAMES utf8");
                     
      return $link;
      */
      return $con;
    }

    //執行SQL Function
    function execute_sql($link, $database, $sql)
    {
      mysqli_select_db($link, $database)
        or die("開啟資料庫失敗: " . mysqli_error($link));
                           
      $result = mysqli_query($link, $sql);
          
      return $result;
    }

?>