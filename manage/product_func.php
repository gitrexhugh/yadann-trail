<?php
//取得資料庫設定與連線function
require_once("fundation_func.php");

class product_object 
{
    public $product_id,$product_content,$product_img,$product_name;
    
}

//取得帶入ID，取得產品名稱、內容、圖片的Function
function get_product_content($product_id){
    $db=db_info();
    $pid=$product_id;
    $link = new mysqli($db[1],$db[2],$db[3],$db[0]);
    if($link->connect_error) {
        die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
    }else
    {
        //echo "<br>資料庫名稱$db[0],位置$db[1],使用者$db[2],$db[3]";
        $p_obj=new product_object;
        $sql_query="SELECT * FROM product WHERE product_id=$pid";
        $result= $link->query($sql_query);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $p_obj->product_name=$row['product_name'];
        $p_obj->product_id=$row['product_id'];
        $p_obj->product_content=$row['product_content'];
        $p_obj->product_img=$row['product_img'];
        return $p_obj;
    }
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

//取得帶入ID，更新產品名稱、內容、圖片的Function
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

function get_p_product_list_wlink($link){

    $product_list_array=array(
        array('product_id','product_name', 'product_content','product_img'),
    );

    if($link->connect_error) {
        die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
    }else
    {
        //$p_obj=new product_object;
        // 測試將資料存到product類型的陣列中
        //$p_pbj[0]->product_name="test 0 product_name";
        //$p_pbj[1]->product_name="test 1 product_name";
        //$out_pbj0=$p_pbj[0]->product_name;
        //$out_pbj1=$p_pbj[1]->product_name;
        //$p_list="$out_pbj0&$out_pbj1";
        
        //$test_s=$p_pbj[0]->product_name;
        
        //$sql_query="SELECT product_id, product_img, product_name, LEFT(product_content,100) FROM product WHERE is_publish='1'";
        $sql_query="SELECT * FROM product WHERE is_publish='1'";
        //$sql_query="SELECT product_id, product_img, product_name,LEFT(product_content,200) FROM product WHERE is_publish='1'";
        $result= $link->query($sql_query);
        if(!$result)//若$query無資料，則顯示資料庫讀取失敗
        {
            die('無資料'.mysqli_error($link));
        }else{
            //$row=$result->fetch_array(MYSQLI_ASSOC);

            $row_num=$result->num_rows;//取得查詢結果行數
            echo "num=$row_num";
            //$row=$result->fetch_array(MYSQLI_ASSOC); //將查詢結果按欄位編號存到$row陣列中
            //$p_obj->product_name=$row['product_name'];
            //$p_obj->product_id=$row['product_id'];
            //$p_obj->product_content=$row['product_content'];
            //$p_obj->product_img=$row['product_img'];
            
            /*
            $product_list_array=array(
                '0'=> array(
                    'product_id'=>"id0",
                    'product_name'=>"name_0",
                    'product_content'=>"content0",
                    'product_img'=>"img0"),

                '1'=> array(
                    'product_id'=>"id1",
                    'product_name'=>"name_1",
                    'product_content'=>"content1",
                    'product_img'=>"img1")    
            );
            */

            
            //while($row=$result->fetch_array(MYSQLI_ASSOC)){
                /*
                $product_id=$row['product_id'];
                $product_name=$row['product_name'];
                $product_content=$row['product_content'];
                $product_img=$row['product_img'];

                echo <<<_END
                    ID:$product_id..NAME:$product_name..IMG:$product_img
                _END;
            */
            //$row=$result->fetch_array(MYSQLI_ASSOC);
                //for ($i=0; $i<$row_num; $i++){
             /*   while($row=$result->fetch_array(MYSQLI_ASSOC)){    
                    $product_list_array=array(
                         array(
                            'product_id'=>$row['product_id'],
                            'product_name'=>$row['product_name'],
                            'product_content'=>$row['product_content'],
                            'product_img'=>$row['product_img'])
                    );
                }
             */   
            //}
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

                /*
                $p_obj->product_name=$row['product_name'];
                $p_obj->product_id=$row['product_id'];
                $p_obj->product_content=$row['product_content'];
                $p_obj->product_img=$row['product_img'];
                */
            
            

            /*
            for ($i=0;$i<2;$i++)//使用for loop將資料寫入product array中
            {
                $list_result="$row[$i]<br>";
                //$list_result="$list_result<br>";
                //$p_obj[$i]->product_name=$result[$i]['product_name'];
                //$p_obj[$i]->product_content=$result[$i]['product_content'];
            }
            */

            //$p_obj->product_name=$result_num['product_name'];
            
/*            while( $row=$result->fetch_array(MYSQLI_ASSOC)){
            $p_obj->product_name=$row['product_name'];
            $p_obj->product_id=$row['product_id'];
            $p_obj->product_content=$row['product_content'];
            $p_obj->product_img=$row['product_img'];
            echo "ID=$product_id<br>Name=$product_name<br>content=$product_content<br>img=$product_img";
            }*/
            return $product_list_array;
            //return $result_num;
        }
    }
}

/*
function get_product_info($product_id){
    echo "id=$product_id";
    $product= new product_object();
    $link = new mysqli($dbhost,$dbuser,$dbpass,$db);
    if($link->connect_error) {
    die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
    }else
    {
        $sql_query="SELECT product_id,product_name, product_img, product_content, is_publish FROM product WHERE product_id=$product_id";
        $result= $link->query($sql_query);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $product->product_id=$row['product_id'];
        $product->product_name=$row['product_name'];
        $product->product_img=$row['product_img'];
        $product->product_content=$row['product_content'];
        $product->is_publish=$row['is_publish'];
        */

/*
        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $product_img=$row['product_img'];
        $product_content=$row['product_content'];
        $is_publish=$row['is_publish'];
        */
 /*
    }
    return $product;

  }


  //移除字串中的魔術符號
  function mysql_fix_string($link,$string){
      if(get_magic_quotes_gpc()) 
      $string=stripslashes($string);
      return $link->real_escape_string($string);
  }
*/

?>