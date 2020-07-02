<?php
//取得資料庫設定與連線function
//echo "$dbhost,$dbuser,$dbpass,$db";
//$product=new product_object;
//$product->test();
require_once("fundation_func.php");

class product_object 
{
    public $product_id,$product_content,$product_img,$product_name;
    

    public function test(){
        $db=db_info();
        $dbase=$db[0];
        $host=$db[1];
        $user=$db[2];
        $pw=$db[3];
        echo "資料庫名稱$dbase,位置$host,使用者$user,密碼$pw";
    }
    
    public function test_id($p_id){
        //$product->product_id=$p_id;
        $pid=$p_id;
        return $pid;
    }


    public function db_info($dbhost,$dbuser,$dbpass,$db){
        $host=$dbhost;
        $user=$dbuser;
        $pw=$dbpass;
        $dbase=$db;
        echo "$host,$user,$pw,$dbase";
        //return $infor;
    }

   public function db_link($dbhost,$dbuser,$dbpass,$db,$product_id){
        $host=$dbhost;
        $user=$dbuser;
        $pw=$dbpass;
        $dbase=$db;
        $pid=$product_id;
        $link = new mysqli($host,$user,$pw,$dbase);
        if($link->connect_error) {
            die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
        }else
        {
            echo "$host,$user,$pw,$dbase,$pid";

            $sql_query="SELECT product_name FROM product WHERE product_id=$pid";
            $result= $link->query($sql_query);
            $row=$result->fetch_array(MYSQLI_ASSOC);
            $name=$row['product_name'];
            echo "連線成功-Name=$name";
        }
    }
}

function db_link2($dbhost,$dbuser,$dbpass,$db,$product_id){
    $host=$dbhost;
    $user=$dbuser;
    $pw=$dbpass;
    $dbase=$db;
    $pid=$product_id;
    $link = new mysqli($host,$user,$pw,$dbase);
    if($link->connect_error) {
        die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
    }else
    {
//        echo "$host,$user,$pw,$dbase,$pid";
        $p_obj=new product_object;
        $sql_query="SELECT product_name FROM product WHERE product_id=$pid";
        $result= $link->query($sql_query);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $p_obj->product_name=$row['product_name'];
        echo "Name=$p_obj->product_name";
        return $p_obj;
    }
}

function db_link3($product_id){
    $db=db_info();
    $pid=$product_id;
    $link = new mysqli($db[1],$db[2],$db[3],$db[0]);
    if($link->connect_error) {
        die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
    }else
    {
//        echo "$host,$user,$pw,$dbase,$pid";
        echo "<br>資料庫名稱$db[0],位置$db[1],使用者$db[2],$db[3]";
        $p_obj=new product_object;
        $sql_query="SELECT * FROM product WHERE product_id=$pid";
        $result= $link->query($sql_query);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $p_obj->product_name=$row['product_name'];
        $p_obj->product_id=$row['product_id'];
        $p_obj->product_content=$row['product_content'];
        $p_obj->product_img=$row['product_img'];
        //echo "Name=$p_obj->product_name";
        return $p_obj;
    }
}

/*
function get_product_info($product_id){
    echo "id=$product_id";
    $product= new product_object();
    $link = new mysqli($dbhost,$dbuser,$dbpass,$db);
    if($link->connect_error) {
    die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
    }else
    {
        $sql_query="SELECT product_id,product_name, product_img, product_content, is_publish FROM product WHERE product_id=$product_id";
        $result= $link->query($sql_query);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $product->product_id=$row['product_id'];
        $product->product_name=$row['product_name'];
        $product->product_img=$row['product_img'];
        $product->product_content=$row['product_content'];
        $product->is_publish=$row['is_publish'];
        */

/*
        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $product_img=$row['product_img'];
        $product_content=$row['product_content'];
        $is_publish=$row['is_publish'];
        */
 /*
    }
    return $product;

  }


  //移除字串中的魔術符號
  function mysql_fix_string($link,$string){
      if(get_magic_quotes_gpc()) 
      $string=stripslashes($string);
      return $link->real_escape_string($string);
  }
*/

?>