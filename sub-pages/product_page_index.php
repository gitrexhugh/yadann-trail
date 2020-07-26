<?php 
  //require_once("a_config.php");

  // 呼叫取的產品清單Array的函式
  $product_list=get_p_product_list_wlink($link);
  // 計算Array長度
  $array_num=count($product_list);
  //用For Loop取得產品清單的產品資料，並輸出至頁面上
  for ($i=0; $i<$array_num; $i++){
    $product_id=$product_list[$i]['product_id'];
    $product_name=$product_list[$i]['product_name'];

    if (!$product_list[$i]['product_img']){
      $product_img="sub-pages/default_product.png";
    }else{
      $product_img="manage/".$product_list[$i]['product_img'];
    }
    /*
    $product_img=$product_list[$i]['product_img'];
    if (!$product_img){
      $product_img="sub-pages/default_product.png";
    }*/
    $product_content=get_pure_text($product_list[$i]['product_content']);
    $product_content=mb_substr($product_content,0,200,"utf-8")."...";
    
    echo <<<_END

      <div class='product_list'>
        <div class='list_product_summary'>
            <div class="list_product_img"><img src=$product_img></div>
            <div class="list_product_disp">
                <div class="list_product_name"><a href="product.php?pid=$product_id">$product_name</a></div>         
                <div class="list_product_content">$product_content</div>
            </div>
        </div>
      </div>

    _END;
  }

?>
