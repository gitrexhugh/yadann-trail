<!DOCTYPE html>
<html>
<script src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">
        function check_data()
        {
            if (document.productform.product_name.value.length==0)
            alert("請輸入產品名稱");
            else
            productform.submit();
        }
</script>
<script>
      tinymce.init({
        selector:'textarea'
        });
</script>
<?php include("manage_header.php");?>
<?php include("manage_menu.php");?>
<div id="main-content">
    <section class="form_formate">
    <title>新增產品</title>
    <a href="product_page.php">返回</a>

        <form action="chkproduct.php?action=add" method="post" name="productform" enctype="multipart/form-data">
        <div class="edit_form_col">
            產品名稱<input name="product_name" type="text">
        </div>
        <div class="edit_form_col">
            <label class="col_title"> 圖檔：</label>
            <label class="btn_img">請選擇圖片
                <input id="upload_img" type="file" multiple="multiple" name="myfile" style="display:none;">
            </label>
            <div class="form_img_col">
                <div class="edit_form_img">
                    <img id="img_preview" />
                    <lable id="btn_del" class="btn_del" >刪除</label>
                </div>
            </div>
        </div>
        <label class="col_title">產品介紹</label>
        <textarea id="editor1" name="product_content" type="textarea" style="height: 350px;"></textarea>
        
        <div class="edit_form_col">
            <label class="col_title">是否發布</lable>
            <label class="switch">
                <input id="publish" type="checkbox" name="publish" onchange="check_publish()" >
                <span class="slider round"></span>
            </label>
        </div>
        <input class="form_submit" type="button" value="新增" onclick="check_data()"></input>
        </form>
       
        </section>

</div>
</html>

<script>
    //檢查產品圖片，根據是否有圖片顯示不同的圖片區塊
    $(document).ready(function(){
            $(".edit_form_img").hide();
            $("#btn_del").hide();
        //alert(img_view);
    });
</script>
<script>//選擇圖片後產生預覽
    function readURL(input) {
        $(".edit_form_img").show();
        $("#btn_del").show();
        if (input.files && input.files[0]) { //多選檔案
            var reader = new FileReader();
                    
            reader.onload = function(e) {
                $('#img_preview').attr('src', e.target.result);
            }
               reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#upload_img").change(function() {
            readURL(this);
    });
</script>

<script>
//檢查資料庫中的產品發佈狀態，顯示對應的publish狀態
    $(document).ready(function(){
        var publish=<?php echo "$is_publish" ?>;
        if (publish==0){
            $("#publish").prop("checked",'');
           
        }else{
            $("#publish").prop("checked",true);
        }
        //alert(publish);
    });
</script>


<script>
//檢查發布狀態的CheckBox是否被勾選
    function check_publish(){
        if($("#publish").is(':checked')){
            $("#publish").val('1');
            //document.productform.publish.value=1;
            //alert(document.productform.publish.value); 
        }        
        else
        {
            $("#publish").val('0');
        //    document.productform.publish.value=0;
        }
            //alert(document.productform.publish.value);     
    }
        
</script>
