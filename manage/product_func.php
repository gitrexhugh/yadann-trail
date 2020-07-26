<?php
class product_object 
{
    public $product_id,$product_content,$product_img,$product_name;
}

//未實作
function update_product_content($product_id){
    $db=db_info();
    $pid=$product_id;
    $link = new mysqli($db[1],$db[2],$db[3],$db[0]);
    if($link->connect_error) {
        die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
    }else
    {
        $p_obj=new product_object;
        return $p_obj;
    }
}

//帶入ID、DB Link取得產品產品內容的Function
function get_product_content_wlink($link,$product_id){
    $pid=$product_id;
    if($link->connect_error) {
        die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
    }else
    {
        $p_obj=new product_object;
        $sql_query="SELECT * FROM product WHERE product_id=$pid";
        $result= $link->query($sql_query);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $p_obj->product_name=$row['product_name'];
        $p_obj->product_id=$row['product_id'];
        $p_obj->product_content=$row['product_content'];
        $p_obj->product_img=$row['product_img'];
        $p_obj->product_pub=$row['is_publish'];

        //echo "ID=$p_obj->product_id<br>Name=$p_obj->product_name<br>content=$p_obj->product_content<br>img=$p_obj->product_img<br>$p_obj->product_pub";
        return $p_obj;
    }
}

//取得已發布的產品清單的Function
function get_p_product_list_wlink($link){

    $product_list_array=array(
        array('product_id','product_name', 'product_content','product_img'),
    );

    if($link->connect_error) {
        die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
    }else
    {
        //取得已發布(is_publish)的產品
        $sql_query="SELECT * FROM product WHERE is_publish='1'";
        //$sql_query="SELECT product_id, product_img, product_name,LEFT(product_content,200) FROM product WHERE is_publish='1'";
        $result= $link->query($sql_query);
        if(!$result)//若$query無資料，則顯示資料庫讀取失敗
        {
            die('無資料'.mysqli_error($link));
        }else{
            //$row=$result->fetch_array(MYSQLI_ASSOC);

            $row_num=$result->num_rows;//取得查詢結果行數
            $i=0;
            while($row=$result->fetch_array(MYSQLI_ASSOC)){    
                $product_list_array[$i]=array(
                        'product_id'=>$row['product_id'],
                        'product_name'=>$row['product_name'],
                        'product_content'=>$row['product_content'],
                        'product_img'=>$row['product_img']
                );

                $i++;
            }
            return $product_list_array;
            //return $result_num;
        }
    }
}

//取得所有，含未發佈的產品清單的Function
function get_a_product_list_wlink($link){

    $product_list_array=array(
        array('product_id','product_name', 'product_content','product_img'),
    );

    if($link->connect_error) {
        die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
    }else
    {
        //取得已發布(is_publish)的產品
        $sql_query="SELECT * FROM product";
        //$sql_query="SELECT product_id, product_img, product_name,LEFT(product_content,200) FROM product WHERE is_publish='1'";
        $result= $link->query($sql_query);
        if(!$result)//若$query無資料，則顯示資料庫讀取失敗
        {
            die('無資料'.mysqli_error($link));
        }else{
            //$row=$result->fetch_array(MYSQLI_ASSOC);

            $row_num=$result->num_rows;//取得查詢結果行數
            $i=0;
            while($row=$result->fetch_array(MYSQLI_ASSOC)){    
                $product_list_array[$i]=array(
                        'product_id'=>$row['product_id'],
                        'product_name'=>$row['product_name'],
                        'product_content'=>$row['product_content'],
                        'product_img'=>$row['product_img'],
                        'is_publish'=>$row['is_publish']
                );
                $i++;
            }
            return $product_list_array;
            //return $result_num;
        }
    }
}


?>