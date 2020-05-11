<?php
	switch ($_SERVER["SCRIPT_NAME"]) { //當網址改變時，改變CURRENT_PAGE-navigation 、PAGE_TITLE-head的值
		case "/edit.php":
			$CURRENT_PAGE = "Edit"; 
			$PAGE_TITLE = "Edit_Table";
			break;
		case "/articles.php":
			$CURRENT_PAGE = "Article"; 
			$PAGE_TITLE = "Article_List";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Show Talbe List!";
    }
  
/* 此段應被create_connection()取代
    //取得網站連線設定檔
    $ini = parse_ini_file('webconfig.ini',true);
    $db=$ini["database"]["db_name"];
    $dbhost=$ini["database"]["db_url"];
    $dbuser=$ini["database"]["db_user"];
    $dbpass=$ini["database"]["db_password"];
    //測試連線
    $link=mysqli_connect($dbhost,$dbuser,$dbpass);
    if(! $link) {
        die ('DB連線失敗'. mysqli_error($link));
    }
    //echo 'DB連線成功';
*/

    //連線資料庫Function
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

    //執行SQL Function
    function execute_sql($link, $database, $sql)
    {
      mysqli_select_db($link, $database)
        or die("開啟資料庫失敗: " . mysqli_error($link));
                           
      $result = mysqli_query($link, $sql);
          
      return $result;
    }

?>