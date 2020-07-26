<section class="form_formate">
    <title>聯絡清單</title>
</section>
<?php 
//取得資料庫設定與連線function
require_once("fundation_func.php");

$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
if($link->connect_error) {
die ('連線資料庫失敗'. "host-$dbhost,user-$user".mysqli_error($link));
}else
{
    //查詢產品清單
    $sql_query="SELECT * FROM contacts";
    $result= $link->query($sql_query);

    if(!$result)//若$query無資料，則顯示資料庫讀取失敗
        {
            die('無資料'.mysqli_error($link));
        }
        //顯示產品清單表頭
        echo <<<_END
        <div class="form_List">
        <div class="from_header">
            <div class="form_contact_name">聯絡人</div>
            <div class="form_contact_email">聯絡信箱</div>
            <div class="form_contact_tel">聯絡電話</div>
            <div class="form_contact_company">所屬公司</div>
            <div class="form_contact_time">聯絡時間</div>
            <div class="form_contact_status">是否回覆</div>
            <div class="form_function">功能</div>
        </div>
        _END;
        //取得SQL產出的資料並顯示出來
        while($row=$result->fetch_array(MYSQLI_ASSOC))
        {
            $con_id=$row['con_id'];
            $con_name=$row['con_name'];
            $con_tel=$row['con_tel'];
            $con_mail=$row['con_mail'];
            $con_company=$row['con_company'];
            $con_time=$row['con_time'];
            if($row['is_reply'])//將is_publish的bolean值轉為中文
            {
                $is_reply="是";
            }else{
                $is_reply="否";
            }

        echo <<<_END
            <div class="form_List_col">
            <div class="form_contact_name">$con_name(#$con_id)</div>
            <div class="form_contact_email">$con_mail</div>
            <div class="form_contact_tel">$con_tel</div>
            <div class="form_contact_company">$con_company</div>
            <div class="form_contact_time">$con_time</div>
            <div class="form_contact_status">$is_reply</div>
            <div class="form_function">
                <a href='contacts.php?rno=$con_id'>編輯</a>
                <a href='#' onclick='del_contact("$con_id","$con_name")'>刪除</a>
            </div> 
            </div>
        _END;
        }
        echo '</div>';
        $result->free();
        $link->close();
}


?>
