<?php 
  require_once("manage/fundation_func.php");
  require_once("manage/product_func.php");

  $link = new mysqli($dbhost,$dbuser,$dbpass,$db);
  $product_list=get_p_product_list_wlink($link);
  $array_num=count($product_list);

  for ($i=0; $i<$array_num; $i++){
    $product_id=$product_list[$i]['product_id'];
    $product_name=$product_list[$i]['product_name'];
    $product_img=$product_list[$i]['product_img'];
    $product_content=get_pure_text($product_list[$i]['product_content']);
    $product_content=mb_substr($product_content,0,200,"utf-8")."...";
    //$product_content=substr($product_content,0,200)."...";
    echo <<<_END

      <div class='product_list'>
        <div class='list_product_summary'>
            <div class="list_product_img"><img src=$product_img/></div>
            <div class="list_product_disp">
                <div class="list_product_name"><a href="product.php?pid=$product_id">$product_name</a></div>         
                <div class=\"list_product_content\">$product_content</div>
            </div>
        </div>
      </div>

    _END;
  }
/*
  $p0=$product_list[0][product_id];
  $p1=$product_list[1][product_id];
  $p2=$product_list[2][product_id];
  $p3=$product_list[3][product_id];
  $p4=$product_list[4][product_id];

  echo "[0]:$p0, [1]:$p1, [2]:$p2,[3]:$p3, [4]:$p4";
*/


  
  //$product_list_name1= $$product_list[0]->product_name;
  //$product_list_name2= $$product_list[1]->product_name;
  


/*
  if($link->connect_error) {
  die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
  }else
  {
    while($product_list){
        $product_list=get_p_product_list_wlink($link);
        $product_id=$product_list->product_id;
        $product_name=$product_list->product_name;
        $product_content=$product_list->product_content;
        $product_img=$product_list->product_img;

        echo "row=$product_list";
        echo "product_page_index";
*/
/*
        echo  <<<_END
        <div class='product_list'>
        <div class='list_product_summary'>
            <div class="list_product_img"><img src="{pimg}" /></div>
            <div class="list_product_disp">
                <div class="list_product_name"><a href="product.php?pid=$product_id">$product_name</a></div>         
                <div class="list_product_content">$product_content</div>
            </div></div>
        _END;
      }
    
  }

/*

//取得資料庫設定與連線function
require_once("a_config.php");

//建立資料庫連線
$link=create_connection();

mysqli_select_db($link,'yandance');//連線到資料庫mydb


//查詢產品ID取得產品名稱、產品內容、產品圖片

$sql_query="SELECT product_id, product_name, product_img, tags, product_content FROM product where is_publish='1'";
$result= execute_sql($link,'yandance',$sql_query);

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
  /*  
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

    */
?>
