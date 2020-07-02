<?php 
//取得資料庫設定與連線function
//require_once("m_config.php");
require_once("fundation_func.php");

//建立資料庫連線物件$link
$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
if($link->connect_error) {
die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
}else
{
    //取得要執行的動作action
    $action=entities_fix_string($link,$_GET["action"]);
    $user_id=entities_fix_string($link,$_GET["ed_u"]);

    //取得輸入的帳號、email、密碼
    $in_account=entities_fix_string($link,$_POST["account"]);
    $password=entities_fix_string($link,$_POST["password"]);
    $hash_pw= password_hash($password,PASSWORD_DEFAULT);//將密碼hash處理
    $email=entities_fix_string($link,$_POST["email"]);

    //echo"account:$account<br>pw:$password<br>h_pw:$hash_pw<br>mail:$email";

    //當action不是edit，表示是新增帳號資料
    if($action!="edit"){
        $sql_query="SELECT *  FROM hash_user where u_ac='$in_account'";
        $result=$link->query($sql_query);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $account=$row[u_ac];
       // echo "輸入-$account";
        //$result.free();
        if($account){
            //若帳號重複則出現錯誤訊息，並返回前一頁
            echo "<script type='text/javascript'>";
            echo "alert('輸入帳號已存在');";
            echo "history.back();";
            echo "</script>";
            $result->free();
            $link->close();
        }else{
            $sql="INSERT INTO hash_user(u_ac, user_password, user_email) VALUES ('$in_account','$hash_pw','$email')";
            $link->query($sql);
            echo "新增-$account";
            echo "<script type='text/javascript'>";
            echo "alert('已新增帳號');";
            echo "history.back();";
            echo "</script>";
            $result->free();
            $link->close();
            header('location:user_page.php');
    
        }

        //echo "action!=edit";
    }
    else{
        $sql="UPDATE hash_user SET u_ac='$in_account', user_password='$hash_pw', user_email='$email' WHERE user_id=$user_id";
        $link->query($sql);
        echo "<script type='text/javascript'>";
        echo "alert('已更新帳號資料');";
        echo "history.back();";
        echo "</script>";
        $link->close();
        header('location:user_page.php');
    }
    
}


//建立資料庫連線
/*
$link=create_connection();

if ($action=="edit")
{
    //編輯使用者資料則Update資料
    $sql="UPDATE hash_users SET account='$account', password='$hash_pw', email='$email' WHERE user_id=$user_id";
    $link->query($sql);
    //$result=execute_sql($link,"yandance",$sql);
    echo "<script type='text/javascript'>";
    echo "alert('已更新帳號資料');";
    echo "history.back();";
    echo "</script>";
    header('location:user_page.php');
}else{
// 若非編輯則需檢查是否存在相同account
//查詢使用者清單中有沒有存在相同account的資料
$sql_query="SELECT *  FROM hash_users where account='$account'";
$result= $link->query($sql);
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
*/
?>
