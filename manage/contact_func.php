<?php
//取得資料庫設定與連線function
require_once("fundation_func.php");

class contact_obj 
{
    public $con_name,$con_mail,$con_tel,$con_company,$con_content,$is_reply;
    
}

function get_contact_list_wlink($link){

    $contact_list_array=array(
        array('con_id','con_name','con_mail','con_tel', 'con_company','con_content','is_reply'),
    );

    if($link->connect_error) {
        die ('連線資料庫失敗'. mysqli_error($link));
    }else
    {
        //取得已發布(is_publish)的產品
        $sql_query="SELECT * FROM contacts";
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
                    'con_id'=>$row['con_id'],
                    'con_name'=>$row['con_name'],
                    'con_mail'=>$row['con_mail'],
                    'con_tel'=>$row['con_tel'],
                    'con_company'=>$row['con_company'],
                    'is_reply'=>$row['is_reply'],
                );
                $i++;
            }

            return $contact_list_array;
            //return $result_num;
        }
    }
}

//帶入ID、DB Link取得聯絡內容的Function
function get_contact_info_wlink($link,$con_id){
    if($link->connect_error) {
        die ('連線資料庫失敗'. mysqli_error($link));
    }else
    {
        $contact_info=new contact_obj;
        //$sql_query="SELECT slogan,about_us,about_us_tel,about_us_address,about_us_mail,company_name FROM about_us";
        $sql_query="SELECT con_name, con_mail, con_tel,con_company,con_content,is_reply,user_time,con_id FROM contacts where con_id=$con_id";
        $result= $link->query($sql_query);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $contact_info->con_name=$row['con_name'];
        $contact_info->con_mail=$row['con_mail'];
        $contact_info->con_tel=$row['con_tel'];
        $contact_info->con_company=$row['con_company'];
        $contact_info->user_time=$row['user_time'];
        $contact_info->is_reply=$row['is_reply'];
        $contact_info->con_content=$row['con_content'];
        $contact_info->con_id=$row['con_id'];
        
        return $contact_info;
    }
}

//寫入聯絡內容的Function，新增後回傳編號     
function add_contact_info_wlink($link,$con_name,$con_mail,$con_tel,$con_company,$con_content,$is_reply,$user_time){
    if($link->connect_error) {
        die ('連線資料庫失敗'. mysqli_error($link));
    }else
    {
        $contact_info=new contact_obj;
        //$sql_query="SELECT slogan,about_us,about_us_tel,about_us_address,about_us_mail,company_name FROM about_us";
        $sql_query="INSERT INTO contacts(con_name, con_mail, con_tel,con_company,con_content,is_reply,user_time) 
        VALUES ('$con_name','$con_mail','$con_tel','$con_company','$con_content','0','$user_time')"; 
        //select con_id FROM contacts where con_name='$con_name' and user_time='$user_time';""
        $link->query($sql_query);
        $sql_query="select con_id FROM contacts where con_name='$con_name' and user_time='$user_time'";

        //echo "sql=$sql_query";
        $result= $link->query($sql_query);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $con_id=$row['con_id']; 
        //echo "cid=$con_id";
        return $con_id;

    }
}

//寄送信件通知內部人員
function send_contact_mail($con_name,$con_mail,$con_tel,$con_company,$con_content,$con_id){
    $to="windhugh@gmail.com";//此為設定收信的人員資料
    $sub="透過網站聯絡信：$con_name.#$con_id";
    $message="
    <!DOCTYPE html>
    <html>
        <head>
            <title>$con_name.透過網站的聯繫。</title>
            <style type='text/css'>

            #contact_us{
                display: block;
                width: 100%;
                margin-top: 1%;
                margin-bottom: 3%;
            }

            #contact_title{
                font-size: 20pt;
                font-weight: 500;
                color: #006BAC;
                margin-top: 5px;
                margin-bottom: 5px;
                text-align: center;
            }

            #contact_disc{
                height: auto;
                font-size: 14pt;
                line-height: 30px;
                color: #022758;
                text-align: center;
                margin-bottom: 5px;
            }


            #contact_form{
                display: block;
                width: 80%;
                align-content: center;
                margin: auto;
            }

            .contact_form_col{
                display: block;
                height: auto;
                font-size: 20pt;
                line-height: 30px;
                color: #505050;
                margin-bottom: 2%;
                
            }
            </style>
        </head>
        <body>
        <section id='contact_us'>
        <dv id='contact_form'>
        <div id='contact_disc'>這是透過網站的聯繫；再請回覆處理。</div>
            <div class='contact_form_col'>
                <div class='col_title'>姓名</div>
                <div class='contact_review'>$con_name</div>
            </div>
            <div class='contact_form_col'>
                <div class='col_title'>聯絡信箱</div>
                <div class='contact_review'>$con_mail</div>
            </div>
            <div class='contact_form_col'>
                <div class='col_title'>聯絡電話</div>
                <div class='contact_review'>$con_tel</div>
            </div>
            <div class='contact_form_col'>
                <div class='col_title'>公司名稱</div>
                <div class='contact_review'>$con_company</div>
            </div>
            <div class='contact_form_col'>
                <div class='col_title'>需求訊息</div>
                <div class='contact_review'>$con_content</div>
            </div>
        </div>
        </section>
        </body>

    </html>
    ";
    $header="MIME-Version:1.0\r\n";
    $header.="Content-type:text/html;charset=utf-8\r\n";
    $header.="From: dev@dzerolab.twmail.org";

    mail($to,$sub,$message,$header);
}

?>