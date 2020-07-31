<?php 

class img_object 
{
    public $img_id,$product_id,$imgb;
}

//取得資料庫設定與連線function
require_once("fundation_func.php");
$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
if($link->connect_error) {
    die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
    }else
    {
        $product_id=entities_fix_string($link,$_GET["ed_p"]);
        $imgb=entities_fix_string($link,$_POST["imgb64"]);
        insert_img($link,$product_id,$imgb);
    }
    
    
    function insert_img($link,$product_id,$imgb){
        //若是新增則Insert產品資料
            $sql="INSERT INTO product_img(product_id, imgb) VALUES ('$product_id','$imgb')";
            $link->query($sql);
            echo "<script type='text/javascript'>";
            echo "alert('已新增資料-$product_id');";
            //echo "history.back();";
            echo "</script>";
        
        //header("location:product_page.php");//轉址到產品清單頁面
        $link->close();
    }

    function query_img($link,$product_id){
        $imgs_array=array(
            array('img_id','imgb'),
        );
        $sql="SELECT img_id, imgb FROM product_img WHERE product_id=$product_id";
        $result=$link->query($sql);
        //$row_num=$result->num_rows;//取得查詢結果行數
            $i=0;
            while($row=$result->fetch_array(MYSQLI_ASSOC)){    
                $imgs_array[$i]=array(
                        'img_id'=>$row['img_id'],
                        'imgb'=>$row['imgb']
                );

                $i++;
            }
            return $imgs_array;
    }

?>
