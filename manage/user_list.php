<section class="form_formate">
    <title>使用者清單</title>
    <a href="add_user.php">新增</a>
</section>
<?php 
//取得資料庫設定與連線function
require_once("m_config.php");

//建立資料庫連線
$link=create_connection();

//查詢使用者清單
$sql_query="SELECT user_id, account, email FROM users";
$result= execute_sql($link,"mydb",$sql_query);

if(!$result)//若$query無資料，則顯示資料庫讀取失敗
    {
        die('無資料'.mysqli_error($link));
    }
    //測試div
    echo '<div class="form_List">
    <div class="from_header">
        <div class="form_user_no">編號</div><div class="form_user_account">帳號</div><div class="form_user_email">email</div><div class="form_function">功能</div>
    </div>';
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $uid=$row['user_id'];
        echo "<div class=\"form_List_col\"><div class=\"form_user_no\">{$row['user_id']}</div>".
        "<div class=\"form_user_account\">{$row['account']}</div>".
        "<div  class=\"form_user_email\">{$row['email']}</div>".
        "<div class=\"form_function\"><a href='edit_user.php?ed_u=$uid'>編輯</a>". //帶user_id到網址中，由edit_user.php取id來進行編輯
        "<a href='#' onclick='del_user($uid)'>刪除</a></div>".//帶user_id到del_user()再由del_user轉址到del_user.php中
        "</div>";
    }
    echo '</div>';
    mysqli_free_result($result);//釋放記憶體
mysqli_close($link);

?>

