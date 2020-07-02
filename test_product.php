<?php

//取得資料庫設定與連線function
require_once("manage/fundation_func.php");
require_once("manage/product_func.php");

$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
//$q_product_id=entities_fix_string($link,$_GET["ed_p"]);
/*
$product=get_product_content_wlink($link,46);
$product_id=$product->product_id;
$product_name=$product->product_name;
$product_content=$product->product_content;
$product_img=$product->product_img;
echo "ID=$product_id<br>Name=$product_name<br>content=$product_content<br>img=$product_img";
*/

get_p_product_list_wlink($link)
//$product_list=get_p_product_list_wlink($link);
//$plist_lng=count($product_list);

/*
$product_id=$product_list->product_id;
$product_name=$product_list->product_name;
$product_content=$product_list->product_content;
$product_img=$$product_list->product_img;
*/
//echo "ID=$product_id<br>Name=$product_name<br>content=$product_content<br>img=$product_img";


/*
for($i=0; $i<=$plist_lng;$i++)
{
    $product_id=$product_list[$i]->product_id;
    $product_name=$product_list[$i]->product_name;
    $product_content=$product_list[$i]->product_content;
    $product_img=$product_list[$i]->product_img;
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
*/
/*
while($product_list){
    
    $product_id=$product_list->product_id;
    $product_name=$product_list->product_name;
    $product_content=$product_list->product_content;
    $product_img=$product_list->product_img;

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
*/


?>