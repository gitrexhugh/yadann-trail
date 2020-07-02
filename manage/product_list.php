<section class="form_formate">
    <title>產品清單</title>
    <a href="add_product.php">新增</a>
</section>
<?php 
//取得資料庫設定與連線function
require_once("fundation_func.php");

$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
if($link->connect_error) {
die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
}else
{
    //查詢產品清單
    $sql_query="SELECT product_id,product_name, product_img, is_publish FROM product";
    $result= $link->query($sql_query);

    if(!$result)//若$query無資料，則顯示資料庫讀取失敗
        {
            die('無資料'.mysqli_error($link));
        }
        //顯示產品清單表頭
        echo <<<_END
        <div class="form_List">
        <div class="from_header">
            <div class="form_product_name">產品名稱</div>
            <div class="form_product_img">圖片</div>
            <div class="form_product_status">是否發布</div>
            <div class="form_function">功能</div>
        </div>
        _END;
        //取得SQL產出的資料並顯示出來
        while($row=$result->fetch_array(MYSQLI_ASSOC))
        {
            $pid=$row['product_id'];
            $pname=$row['product_name'];
            if($row['is_publish'])//將is_publish的bolean值轉為中文
            {
                $publish="是";
            }else{
                $publish="否";
            }

        //帶product_id到網址中，由edit_product_.php取id來進行編輯
        //帶product__id到del_product.php，確認後直接刪除
        //呼叫js del_product()顯示確認視窗再執行del_product.php
        echo <<<_END
            <div class="form_List_col">
            <div class="form_product_name">$pname</div>
            <div class="form_product_img">{$row['product_img']}</div>
            <div  class="form_product_status">{$publish}</div>
            <div class="form_function">
                <a href='edit_product.php?ed_p=$pid'>編輯</a>
                <a href='#' onclick='del_product("$pid","$pname")'>刪除</a>
            </div> 
            </div>
        _END;
        }
        echo '</div>';
        $result->free();
        $link->close();
}


?>
