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

    //靜態顯示產品清單表頭
    /*
    echo '<div class="product_list">
    <div class="list_product_summary">
        <div class="list_product_img"><img src="product_imgs/test_product_img.png" /></div>
        <div class="list_product_disp">
            <div class="list_product_name">產品名稱</div>      
            <div class="list_product_tag">產品標籤、標籤二</div>           
            <div class="list_product_content">產品內容介紹文字</div>
        </div>
    </div>';*/
    //取得SQL產出的資料並顯示出來
    
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $pid=$row['product_id'];
        $pname=$row['product_name'];
        $pimg=$row['product_img'];
        $ptag=$row['tags'];
        $pcontent=$row['product_content'];
        
        echo "<div class='product_list'>".
        "<div class='list_product_summary'>".
            "<div class=\"list_product_img\"><img src=\"{pimg}\" /></div>".
            "<div class=\"list_product_disp\">".
                "<div class=\"list_product_name\"><a href=\"product.php?pid={$pid}\">{$pname}</a></div>".    
                "<div class=\"list_product_tag\">{$ptag}</div>".        
                "<div class=\"list_product_content\">{$pcontent}</div>".
            "</div></div>";
        
    }
    echo '</div>';
    mysqli_free_result($query);//釋放記憶體
    mysqli_close($link);//結束連線

?>
