<!DOCTYPE html>
<html>
<script type="text/javascript">
        //刪除聯絡資料的Javascript
        function del_contact(con_id,con_name)//確認刪除產品後，刪除產品
        {
            if (confirm("確認刪除"+con_name+"的聯絡資訊?"))
            location.href="del_contact.php?rno="+con_id;
        }
    </script>
<?php include("manage_header.php");?>
<?php include("manage_menu.php");?>

<div id="main-content">
<?php 
    if ($_SERVER['QUERY_STRING']){
        include("contacts_info.php");

    }else{
        include("contacts_list.php");
    }
    
?>

</div>
</html>