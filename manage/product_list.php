<a href="add_product.php">新增</a>
<?php 
//取得資料庫設定與連線function
require_once("m_config.php");

//建立資料庫連線
$link=create_connection();

//查詢使用者清單
$sql_query="SELECT product_id,product_name, product_img, tags, is_publish FROM product";
$result= execute_sql($link,"mydb",$sql_query);

if(!$result)//若$query無資料，則顯示資料庫讀取失敗
    {
        die('無資料'.mysqli_error($link));
    }
    echo '<h2>產品列表</h2>';
    echo '<table>
    <tr>
        <td>產品名稱</td><td>圖片</td><td>標籤</td><td>功能</td>
    </tr>';
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $pid=$row['product_id'];
        if(!$row['is_publish'])
        {
            $publish="是";
        }else{
            $publish="否";
        }
        
        echo "<tr><td>{$row['product_name']}</td>".
        "<td>{$row['product_img']}</td>".
        "<td>{$row['tags']}</td>".
        "<td>{$publish}</td>".
        "<td><a href='edit_prodcut.php?ed_u=$pid'>編輯</a></td>". //帶user_id到網址中，由edit_user.php取id來進行編輯
        "<td><a href='#' onclick='del_product($pid)'>刪除</a></td>".//帶user_id到del_user()再由del_user轉址到del_user.php中
        "</tr>";
    }
    echo '</table>';
    mysqli_free_result($result);//釋放記憶體
mysqli_close($link);

?>

