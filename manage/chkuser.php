<?php 
//取得資料庫設定與連線function
require_once("m_config.php");

//取得要執行的動作action
$action=$_GET["action"];
$user_id=$_GET["ed_u"];

//取得輸入的帳號、email、密碼
$account=$_POST["account"];
$password=$_POST["password"];
$email=$_POST["email"];

//建立資料庫連線
$link=create_connection();

if ($action=="edit")
{
    //編輯使用者資料則Update資料
    $sql="UPDATE users SET account='$account', password='$password', email='$email' WHERE user_id=$user_id";
    $result=execute_sql($link,"mydb",$sql);
    echo "<script type='text/javascript'>";
    echo "alert('已更新帳號資料');";
    echo "history.back();";
    echo "</script>";
    header('location:user_page.php');
}else{
// 若非編輯則需檢查是否存在相同account
//查詢使用者清單中有沒有存在相同account的資料
$sql_query="SELECT *  FROM users where account='$account'";
$result= execute_sql($link,"mydb",$sql_query);
    if(mysqli_num_rows($result)!=0)//檢查帳號是否已存在
    {   //若帳號重複則出現錯誤訊息，並返回前一頁
        mysqli_free_result($result);//釋放記憶體
        echo "<script type='text/javascript'>";
        echo "alert('輸入帳號已存在');";
        echo "history.back();";
        echo "</script>";
    }
    else{//若帳號不存在則新增輸入的資料到資料庫中
        mysqli_free_result($result);//釋放記憶體
        $sql="INSERT INTO users(account, password, email) VALUES ('$account','$password','$email')";
        $result=execute_sql($link,"mydb",$sql);
        echo "<script type='text/javascript'>";
        echo "alert('已新增帳號');";
        echo "history.back();";
        echo "</script>";
        header('location:user_page.php');
    }
}

    mysqli_close($link);

?>
