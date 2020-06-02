<nav class="breadcrumb"> <!--無障礙網頁麵包屑設計加上aria-label="Breadcrumb"  -->
    <ol class="cd-breadcrumb custom-separator">
        <li><a href="index.php">首頁</a></li>

<?php

    $root_path="/~hugh/practice/"; //定義要去除的目錄路徑
    $page_uri=str_replace($root_path,"",$_SERVER["REQUEST_URI"]);//將網址中的目錄路徑用""來替換掉
    //echo "uri=$page_uri";
    $current_page=explode("?",$page_uri);//用?來分開檔案以及頁面POST參數
    $case_N=$current_page[0];
    //echo "$case_N";

    switch ($case_N)
    {
        case "product.php":
            //$get_name=get_product_name();
            echo "<li><a href=\"product.php\">產品資訊</a></li>";
            echo "<li class=\"current\"><em>$get_name</em></li>";
            break;

        case "index.php":
        case "about_us.php":
        case "contact.php":
    }

    /*顯示處理後的路徑字串
    $counter=count($current_page)-1;
    for($i=0; $i<=$counter;$i++)
    {
        echo"$i-$current_page[$i]";
    }*/

    function get_product_name(){
        $PRODUCT_ID=$_GET['pid'];
        //建立資料庫連線
        $link=create_connection();
        mysqli_select_db($link,'mydb');//連線到資料庫mydb
        //查詢產品ID取得產品名稱、產品內容、產品圖片
        $sql_query="SELECT product_name FROM product WHERE PRODUCT_ID=$PRODUCT_ID";
        $query=mysqli_query($link, $sql_query);//執行SQL查詢資料，查詢後存到$query中
        if(!$query)//若$query無資料，則顯示資料庫讀取失敗
        {
            die('資料讀取失敗:'.mysqli_error($link));
        }
            $row=mysqli_fetch_array($query,MYSQLI_ASSOC); //將SQL取得資料寫入$row中
            // 產生product區塊，並帶入SQL取得的產品資料
            $product_name=$row['product_name'];
            return $product_name;
    }

?>

    </ol>
</nav>