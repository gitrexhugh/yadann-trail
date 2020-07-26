<section class="form_formate">
    <title>產品清單</title>
    <a href="add_product.php">新增</a>
</section>
<?php 
//取得資料庫設定與連線function
require_once("fundation_func.php");
require_once("product_func.php");

$product_list=get_a_product_list_wlink($link);
  // 計算Array長度
  $array_num=count($product_list);
  //用For Loop取得產品清單的產品資料，並輸出至頁面上
  for ($i=0; $i<$array_num; $i++){
    $product_id=$product_list[$i]['product_id'];
    $product_name=$product_list[$i]['product_name'];

    if (!$product_list[$i]['product_img']){
      $product_img="sub-pages/default_product.png";
    }else{
      $product_img=$product_list[$i]['product_img'];
    }
    /*
    $product_img=$product_list[$i]['product_img'];
    if (!$product_img){
      $product_img="sub-pages/default_product.png";
    }*/
    $product_content=get_pure_text($product_list[$i]['product_content']);
    $product_content=mb_substr($product_content,0,200,"utf-8")."...";
    $product_status=$product_list[$i]['is_publish'];

    if($product_status)//將is_publish的bolean值轉為中文
    {
        $product_status="已發布";
    }else{
        $product_status="未發布";
    }
    
    echo <<<_END
      <div class='product_list'>
        <div class='list_product_summary'>
            <div class="list_product_status">$product_status</div>
            <div class="list_product_img"><img src=$product_img></div>
            <div class="list_product_disp">
                <div class="list_product_name"><a href="product.php?pid=$product_id">$product_name</a></div>         
                <div class="list_product_content">$product_content</div>
            </div>
            <div class="list_product_function">
                <a href='edit_product.php?ed_p=$product_id'>編輯</a>
                <a href='#' onclick='del_product("$product_id","$product_name")'>刪除</a>
            </div>
        </div>
      </div>

    _END;
  }


?>
