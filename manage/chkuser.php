<?php 
//取得資料庫設定與連線function
//require_once("m_config.php");
require_once("fundation_func.php");
require_once("user_func.php");

    //取得輸入的帳號、email、密碼
    $uacnt=entities_fix_string($link,$_POST["account"]);
    $tpswd=entities_fix_string($link,$_POST["password"]);
    $upswd= password_hash($tpswd,PASSWORD_DEFAULT);//將密碼hash處理
    $umail=entities_fix_string($link,$_POST["email"]);
    $ustat=entities_fix_string($link,$_POST["ustat"]);
    $modtime=get_time();//寫入修改時間

    //echo"account:$account<br>pw:$password<br>h_pw:$hash_pw<br>mail:$email";

    //當網址中沒有帶入edu字串，usid是空的表示為新增帳號資料
    if(!$_SERVER['QUERY_STRING']){
        $cksame=check_same_user($link, $uacnt);
        echo "same_user=$cksame";
        if($cksame==1){//若有查到相同帳號的資料，則出現錯誤訊息，並返回前一頁
           
            echo "<script type='text/javascript'>";
            echo "alert('輸入帳號已存在');";
            echo "history.back();";
            echo "</script>";
        }else{
            //若無相同帳號在啟用狀態，則呼叫新增使用者的function
            add_user_info_wlink($link,$uacnt,$upswd,$umail,$ustat,$modtime);
            echo "新增same_user=0";
            echo "<script type='text/javascript'>";
            echo "alert('已新增帳號');";
            echo "history.back();";
            echo "</script>";
            
            header('location:user_page.php');
        }
    }
    //當action是edit，修改帳號資料
    else{
        $usid=entities_fix_string($link,$_GET["edu"]);
        if($cksame==0){//若有查到相同帳號的資料，則出現錯誤訊息，並返回前一頁
            echo "<script type='text/javascript'>";
            echo "alert('帳號重複。請變更帳號名稱，或將變更帳號啟用狀態');";
            echo "history.back();";
            echo "</script>";

        }else{
            //若無相同帳號在啟用狀態，則呼叫修改使用者的function
            update_user_info_wlink($link,$usid,$uacnt,$upswd,$umail,$ustat,$modtime);
            echo "更新-$uacnt";
            echo "<script type='text/javascript'>";
            echo "alert('已新增帳號');";
            echo "history.back();";
            echo "</script>";
            
            header('location:user_page.php');
        }
    }

?>
