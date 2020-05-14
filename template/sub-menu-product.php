

<nav class="submenu"> 
    <div id="nav-title">產品類別</div>
    <ul class="category">
<!--        <li><a href="#">SAB Cable軌道車輛電纜</a></li>
        <li><a href="#">PFLITSCH電纜固定頭</a></li>
        <li><a href="#">功率半導體</a></li>
        <li><a href="#">FA工控產品</a></li>
        <li><a href="#">Finder軌道車用繼電器</a></li>
        <li  class="current"><em>E-T-A直流保護開關</em></li> -->
        <?php 
        //取得資料庫設定與連線function
        require_once("a_config.php");

        //建立資料庫連線
        $link=create_connection();

        //查詢產品清單
        $sql_query="SELECT product_id,product_name FROM product";
        $result= execute_sql($link,"mydb",$sql_query);

        if(!$result)//若$query無資料，則顯示資料庫讀取失敗
            {
                die('無資料'.mysqli_error($link));
            }

            //取得SQL產出的資料並顯示出來
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
                $pid=$row['product_id'];
                $product_name=$row['product_name'];
            echo "<li><a href='product.php?pid=$pid'>$product_name</a></li>";
            }

            //---------------
            mysqli_free_result($result);//釋放記憶體
            mysqli_close($link);
        ?>

    </ul>
</nav>
