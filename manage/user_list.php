<a href="add_user.php">新增</a>
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
    echo '<h2>使用者清單</h2>';
    echo '<table>
    <tr>
        <td>編號</td><td>帳號</td><td>email</td><td>功能</td>
    </tr>';
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $uid=$row['user_id'];
        echo "<tr><td>{$row['user_id']}</td>".
        "<td>{$row['account']}</td>".
        "<td>{$row['email']}</td>".
        "<td><a href='edit_user.php?ed_u=$uid'>編輯</a></td>". //帶user_id到網址中，由edit_user.php取id來進行編輯
        "<td><a href='#' onclick='del_user($uid)'>刪除</a></td>".//帶user_id到del_user()再由del_user轉址到del_user.php中
        "</tr>";
    }
    echo '</table>';
    mysqli_free_result($result);//釋放記憶體
mysqli_close($link);

?>

