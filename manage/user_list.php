<section class="form_formate">
    <title>使用者清單</title>
    <a href="add_user.php">新增</a>
</section>


<?php 
//取得資料庫設定與連線function
//require_once("m_config.php");
require_once("fundation_func.php");
require_once("user_func.php");

$ulist=get_user_list_wlink($link);
$row_num=count($ulist);//取得查詢結果行數
//echo "num=$row_num ";

echo '<div class="form_List">
    <div class="from_header">
        <div class="form_user_st">狀態</div>
        <div class="form_user_account">帳號</div>
        <div class="form_user_email">email</div>
        <div class="form_function">功能</div>
    </div>';

for ($i=0; $i<$row_num; $i++){
    $ustat=$ulist[$i]['ustat'];
    if ($ustat==1){
        $dis_stat="啟用";
    }else{
        $dis_stat="停用";
    }
    $usid=$ulist[$i]['usid'];
    $uacnt=$ulist[$i]['uacnt'];
    $umail=$ulist[$i]['umail'];
    echo <<<_END
        <div class="form_List_col">
        <div class="form_user_st">$dis_stat</div>
        <div class="form_user_account">$uacnt</div>
        <div  class="form_user_email">$umail</div>
        <div class="form_function"><a href='edit_user.php?edu=$usid'>編輯</a> 
        <a href='#' onclick='del_user($usid)'>刪除</a></div>
        </div>
    _END;
}

?>

