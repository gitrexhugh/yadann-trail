<?php 
require_once("fundation_func.php");

class user_obj 
{
    public $usid,$uacnt,$upswd,$umail,$login_time,$hpswd,$u_status;
    
}
//取得使用者清單function
function get_user_list_wlink($link){
    $user_list_array=array(
        array('usid','uacnt','upswd','umail', 'ulgtime','modtime','ustat'),
    );
        $sql_query="SELECT usid, uacnt, upswd, umail,ulgtime,modtime,ustat FROM hash_user";
        $result= $link->query($sql_query);
        if(!$result)//若$query無資料，則顯示資料庫讀取失敗
        {
            die('無資料'.mysqli_error($link));
        }else{
            //$row=$result->fetch_array(MYSQLI_ASSOC);

            $row_num=$result->num_rows;//取得查詢結果行數
            $i=0;
            while($row=$result->fetch_array(MYSQLI_ASSOC)){    
                $user_list_array[$i]=array(
                    'usid'=>$row['usid'],
                    'uacnt'=>$row['uacnt'],
                    'upswd'=>$row['upswd'],
                    'umail'=>$row['umail'],
                    'ulgtime'=>$row['ulgtime'],
                    'modtime'=>$row['modtime'],
                    'ustat'=>$row['ustat']
                );
                $i++;
            }
            $result->free();
            $link->close();

            return $user_list_array;
            //return $result_num;
        }

        
}

//取得使用者資料
function get_user_info_wlink($link,$usid){
    
        $user_info=new user_obj;
        $sql_query="SELECT usid, uacnt, upswd, umail,ulgtime,modtime,ustat FROM hash_user where usid=$usid";
        $result= $link->query($sql_query);
        if(!$result)//若$query無資料，則顯示資料庫讀取失敗
        {
            die('無資料'.mysqli_error($link));
        }else{
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $user_info->usid=$row['usid'];
        $user_info->uacnt=$row['uacnt'];
        $user_info->upswd=$row['upswd'];
        $user_info->umail=$row['umail'];
        $user_info->ulgtime=$row['ulgtime'];
        $user_info->modtime=$row['modtime'];
        $user_info->ustat=$row['ustat'];
        }
        $result->free();
        $link->close();
        return $user_info;
}

//新增使用者資料
function add_user_info_wlink($link,$uacnt,$upswd,$umail,$ustat,$modtime){
    
    $sql_query="INSERT INTO hash_user(uacnt, upswd, umail,ustat,modtime) VALUES ('$uacnt','$upswd','$umail','$ustat','$modtime')";
            $link->query($sql_query);
            $link->close();
            //echo "新增-$sql_query";
}

//修改使用者資料
function update_user_info_wlink($link,$usid,$uacnt,$upswd,$umail,$ustat,$modtime){
    
    $sql_query="UPDATE hash_user SET uacnt='$uacnt', upswd='$upswd', umail='$umail',ustat='$ustat',modtime='$modtime' WHERE usid='$usid'";
            $link->query($sql_query);
            $link->close();

}

//檢查是否有相同帳號且狀態是啟用的狀態
function check_same_user($link, $uacnt){
    $sql_query="SELECT *  FROM hash_user WHERE uacnt='$uacnt' AND ustat=1";//查詢在資料庫中是否已有相同帳號且狀態是啟用的
    //echo "檢查sql-$sql_query";
    $result=$link->query($sql_query);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    if($row['uacnt']){
        return 1;
    }else{
        return 0;
    };

}



?>

