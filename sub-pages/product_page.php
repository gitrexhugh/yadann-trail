<?php //測試連線到GCP 建立資料庫及資料表
mysqli_select_db($link,'mydb');//連線到資料庫mydb

//查詢產品ID取得產品名稱、產品內容、產品圖片
$sql_query="SELECT product_name, product_img, product_content FROM product WHERE PRODUCT_ID=4";

$query=mysqli_query($link, $sql_query);//執行SQL查詢資料，查詢後存到$query中
if(!$query)//若$query無資料，則顯示資料庫讀取失敗
    {
        die('資料讀取失敗:'.mysqli_error($link));
    }
    $row=mysqli_fetch_array($query,MYSQLI_ASSOC); //將SQL取得資料寫入$row中
    // 產生product區塊，並帶入SQL取得的產品資料
    echo "<section id=\"product\">".
    "<h1 id=\"product_title\">{$row['product_name']}</h1>".
    "<article id=\"product_content\">{$row['product_content']}\"</article>".
    "<div id=\"product_imgs\"><img src=\"{$row['product_img']}\"/></div></section>";

    mysqli_free_result($query);//釋放記憶體
    mysqli_close($link);//結束連線

?>
