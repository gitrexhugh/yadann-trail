
<?php //測試連線到GCP 建立資料庫及資料表
  
//取得資料庫設定與連線function
require_once("a_config.php");

//建立資料庫連線
$link=create_connection();

mysqli_select_db($link,'mydb');//連線到資料庫mydb


//查詢產品ID取得產品名稱、產品內容、產品圖片

$sql_query="SELECT product_id, product_name, product_img, tags, product_content FROM product where is_publish='1'";
$result= execute_sql($link,"mydb",$sql_query);

if(!$result)//若$query無資料，則顯示資料庫讀取失敗
    {
        die('無資料'.mysqli_error($link));
    }

    
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $pid=$row['product_id'];
        $pname=$row['product_name'];
        $pimg=$row['product_img'];
        $ptag=$row['tags'];
        $pcontent=$row['product_content'];
        
        /*echo "<div class='product_list'>".
        "<div class='list_product_summary'>".
            "<div class=\"list_product_img\"><img src=\"{pimg}\" /></div>".
            "<div class=\"list_product_disp\">".
                "<div class=\"list_product_name\"><a href=\"product.php?pid={$pid}\">{$pname}</a></div>".    
                "<div class=\"list_product_tag\">{$ptag}</div>".        
                "<div class=\"list_product_content\">{$pcontent}</div>".
            "</div></div>";*/

            echo <<<_END
            <div class='product_list'>
            <div class='list_product_summary'>
                <div class=\"list_product_img\"><img src=\"{pimg}\" /></div>
                <div class=\"list_product_disp\">
                    <div class=\"list_product_name\"><a href=\"product.php?pid={$pid}\">{$pname}</a></div>  
                    <div class=\"list_product_tag\">{$ptag}</div>        
                    <div class=\"list_product_content\">{$pcontent}</div>
                </div></div>
            _END;
        
    }
    echo '</div>';
    mysqli_free_result($query);//釋放記憶體
    mysqli_close($link);//結束連線

?>
