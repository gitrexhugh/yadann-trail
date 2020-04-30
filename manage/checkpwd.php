<?php //檢查登入資料

//取得資料庫設定與連線function
require_once("m_config.php");

//取得index.php輸入的登入資料
$account=$_POST["account"];
$password=$_POST["password"];

//連線資料庫
$link=create_connection();

//查詢使用者資料表中，帳號、密碼與輸入資料相同的資料
$sql_query="SELECT*FROM users Where account='$account' AND password='$password'";
//執行查詢後將結果存入$result
$result= execute_sql($link,"mydb",$sql_query);

if(mysqli_num_rows($result)==0)// mysqli_num_rows取得SQL結果的資料數
{
    mysqli_free_result($result);
    mysqli_close($link);
    setcookie("passed","FALSE");
    echo "<script type='text/javascript'>";
    echo "alert('帳號或密碼錯誤');";
    echo "history.back();";
    echo "</script>";

}
else//否則將資料寫入 cookie，導向user_page
{
    $id_data=mysqli_fetch_object($result);//將SQL執行結果存為物件形式，以table欄位為index取得物件內容
    $account=$id_data->account;//取得user_id欄位
    mysqli_free_result($result);
    mysqli_close($link);

    setcookie("account",$account);
    setcookie("passed","TRUE");
    header("location:manage.php");

}
?>
