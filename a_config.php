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
?>