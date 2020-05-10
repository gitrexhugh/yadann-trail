<section class="form_formate">
    <title>產品清單</title>
    <a href="add_product.php">新增</a>
</section>
<?php 
//取得資料庫設定與連線function
require_once("m_config.php");

//建立資料庫連線
$link=create_connection();

//查詢產品清單
$sql_query="SELECT product_id,product_name, product_img, tags, is_publish FROM product";
$result= execute_sql($link,"mydb",$sql_query);

if(!$result)//若$query無資料，則顯示資料庫讀取失敗
    {
        die('無資料'.mysqli_error($link));
    }
    //顯示產品清單表頭
    echo '<div class="form_List">
    <div class="from_header">
        <div class="form_product_name">產品名稱</div>
        <div class="form_product_img">圖片</div>
        <div class="form_product_tags">標籤</div>
        <div class="form_product_status">是否發布</div>
        <div class="form_function">功能</div>
    </div>';
    //取得SQL產出的資料並顯示出來
     while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $pid=$row['product_id'];
        if($row['is_publish'])//將is_publish的bolean值轉為中文
        {
            $publish="是";
        }else{
            $publish="否";
        }

       echo "<div class=\"form_List_col\"><div class=\"form_product_name\">{$row['product_name']}</div>".
        "<div class=\"form_product_img\">{$row['product_img']}</div>".
        "<div  class=\"form_product_tags\">{$row['tags']}</div>".
        "<div  class=\"form_product_status\">{$publish}</div>".
        "<div class=\"form_function\"><a href='edit_product.php?ed_p=$pid'>編輯</a>". //帶product_id到網址中，由edit_product_.php取id來進行編輯
        "<a href='#' onclick='del_product($pid)'>刪除</a></div>".//帶product__id到del_product()再由del_product_轉址到del_product_.php中
        "</div>";
    }
    echo '</div>';

    //---------------
    mysqli_free_result($result);//釋放記憶體
    mysqli_close($link);
?>
