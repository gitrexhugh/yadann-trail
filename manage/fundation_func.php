<?php
// 取得資料庫設定
$ini = parse_ini_file('webconfig.ini',true);
$db=$ini["database"]["db"];
$dbhost=$ini["database"]["dbhost"];
$dbuser=$ini["database"]["dbuser"];
$dbpass=$ini["database"]["dbpass"];


function db_info()
{
  $ini = parse_ini_file('webconfig.ini',true);
  $db=$ini["database"]["db"];
  $dbhost=$ini["database"]["dbhost"];
  $dbuser=$ini["database"]["dbuser"];
  $dbpass=$ini["database"]["dbpass"];
  $db_info= array("$db","$dbhost","$dbuser","$dbpass");
  return $db_info;

}

  //去除輸入字串中的html語言
  function entities_fix_string($link, $string){
      return htmlentities(mysql_fix_string($link,$string));
  }

  //移除字串中的魔術符號
  function mysql_fix_string($link,$string){
      if(get_magic_quotes_gpc()) 
      $string=stripslashes($string);
      return $link->real_escape_string($string);
  }

  function get_pure_text($string){
    $text=htmlspecialchars_decode($string);//將轉換後的符號還原為html標籤
    $str=trim($text);
    $str=trim(strip_tags($str));// 去除html標籤及前後空格
    $puretext = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/", "",$str); //去除特殊符號及內文中的空白
    return $puretext;
  }

  
?>