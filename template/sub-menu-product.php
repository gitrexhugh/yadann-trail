
<nav class="submenu"> 
    <div id="nav-title">產品項目</div>
    <ul class="category">

        <?php 
        
        //--取得左側產品選單
        $product_list=get_p_product_list_wlink($link);
        // 計算Array長度
        $array_num=count($product_list);
        //用For Loop取得產品清單的產品資料，並輸出至頁面上
        for ($i=0; $i<$array_num; $i++){
            $product_id=$product_list[$i]['product_id'];
            $product_name=$product_list[$i]['product_name'];
            //$product_img=$product_list[$i]['product_img'];
            echo "<li><a href='product.php?pid=$product_id'>$product_name</a></li>";
        }
        ?>

    </ul>
</nav>

