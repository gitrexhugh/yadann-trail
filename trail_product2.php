
<?php //測試以product物件取得product資料

    require_once("manage/product_func.php");
    require_once("manage/fundation_func.php");
    $link = new mysqli($dbhost,$dbuser,$dbpass,$db);
    //$product=new product_object;
    //$product->test();
    //$target=$product->test_id(46);
    //$db=$product->db_info($dbhost,$dbuser,$dbpass,$db);
    //$db=$product->db_link($dbhost,$dbuser,$dbpass,$db,46);
    //$db=db_link2($dbhost,$dbuser,$dbpass,$db,46);
    //$db=get_product_content(46); // 呼叫product_func.php中的取得產品資料函式，並將資料寫入變數$db
    //$db=get_product_content_withlink($link,46);
    $db=get_p_product_list_wlink($link);
    $product_id=$db->product_id;
    $product_name=$db->product_name;
    $product_content=$db->product_content;
    $product_img=$db->product_img;
    //$db=$product->db_info2();
    //$g_product_name=$target->product_name;

    echo 
    $db;
    //"<h1 id='product_title'>產品$target</h1>";
    //"<h1 id='product_title'>DB=$db</h1>";
    //"<h1 id='product_title'>ID=$product_id<br>Name=$product_name<br>content=$product_content<br>img=$product_img </h1>";
?>

