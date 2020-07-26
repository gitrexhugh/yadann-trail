<?php //檢查登入資料

//取得資料庫設定與連線function
require_once("fundation_func.php");

$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
if($link->connect_error) {
die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
}else
{
//  echo 'Connect Sueccess';

//取得index.php輸入的登入資料
//使用entiries_fix_string來去除_POST取得的不合法字串
$account=entities_fix_string($link,$_POST["account"]);
$password=entities_fix_string($link,$_POST["password"]);
//$sql_query="SELECT account FROM users Where account='$account' AND password='$password'";
//查詢帳號是否存在，回傳帳號資料
$sql_query="SELECT * FROM hash_user Where uacnt='$account'";
$result=$link->query($sql_query);
$row=$result->fetch_array(MYSQLI_ASSOC);
//$account=$row[account];
$account=$row['uacnt'];
//echo "查詢帳號為：$account";

if(!$account) 
    {   
        //帳號不存在，則顯示錯誤訊息紀錄Cookie為False，跳出視窗顯示帳號或密碼錯誤
        setcookie("passed","FALSE");
        echo "<script type='text/javascript'>";
        echo "alert('帳號或密碼錯誤');";
        echo "history.back();";
        echo "</script>";
    }
    else{//若帳號存在，則比對密碼是否正確
        if (password_verify($password,$row['upswd'])){
            
            //密碼比對正確時紀錄Cookie 帳號以及True，轉到管理首頁
            setcookie("account",$account);
            setcookie("passed","TRUE");
            header("location:manage.php");
        }else{
            // 密碼比對錯誤，則顯示錯誤訊息紀錄Cookie為False，跳出視窗顯示帳號或密碼錯誤
            setcookie("passed","FALSE");
            echo "<script type='text/javascript'>";
            echo "alert('帳號或密碼錯誤');";
            echo "history.back();";
            echo "</script>";
        }


    }


}



?>
