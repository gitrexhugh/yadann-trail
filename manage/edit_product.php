<?php

//取得資料庫設定與連線function
require_once("fundation_func.php");
require_once("product_func.php");

$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
$q_product_id=entities_fix_string($link,$_GET["ed_p"]);
$product=get_product_content_wlink($link,$q_product_id);
$product_id=$product->product_id;
$product_name=$product->product_name;
$product_content=$product->product_content;
$product_img=$product->product_img;
$is_publish=$product->product_pub;
//$test="product_imgs/20200710023209000.jpg";
//echo "ID=$product_id<br>Name=$product_name<br>content=$product_content<br>img=$product_img";

?>

<!--html編輯頁面 -->
<!DOCTYPE html>
<html>
<script src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">
        function check_data()//檢查產品名稱是否有值
        {
            if (document.productform.product_name.value.length==0)
            {
                alert("請輸入產品名稱");
            }
            else if(document.productform.publish.value!=1){
                //alert(document.productform.publish.value);
                productform.submit();
            }else {
                productform.submit();
            }

        }
</script>


<script>// 文字編輯器初始化JS
      tinymce.init({
        selector:'textarea',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
</script>
<?php include("manage_header.php");?>
<?php include("manage_menu.php");?>
<div id="main-content">




<section class="form_formate">
    <title>編輯產品</title>
    <a href="product_page.php">返回</a>
    <form id="edit_product_form" action="chkproduct.php?action=edit&ed_p=<?php echo "$product_id"?>" method="post" name="productform" enctype="multipart/form-data">
        <div class="edit_form_col">
            <label class="col_title"> 產品名稱
                <input name="product_name" type="text" value=<?php echo "$product_name";?>>
            </label>
        </div>
        <div class="edit_form_col">
        <label for="cate_select" class="col_title">整合銷售分類</label>
        <select id="cate_select" class="form-control">
            <option value="1">軌道應用</option>
            <option value="2">自動控制化</option>
        </select>
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
        <textarea id="editor1" name="product_content" type="textarea" style="height: 350px;"><?php echo "$product_content";?></textarea>
        
        <div class="edit_form_col">
            <label class="col_title">是否發布</lable>
            <label class="switch">
                <input id="publish" type="checkbox" name="publish" onchange="check_publish()" >
                <span class="slider round"></span>
            </label>
        </div>

        <input class="form_submit" type="button" value="修改" onclick="check_data()"></input>
    </form>
</section>
</div>
</html>

<script>
    //檢查產品圖片，根據是否有圖片顯示不同的圖片區塊
    $(document).ready(function(){
        var img_view="<?php echo "$product_img" ?>";
        //alert(img_view);
        check_img(img_view);

        
/*
        if (img_view){
            $("#img_preview").attr('src',img_view);
            $("#btn_del").click(function(e){
                del_img(img_view);
            });
        }else{
            //img_view='null'
            $(".edit_form_img").hide();
            $("#btn_del").hide();
        }
        */
        //alert(img_view);
    });

    //選擇圖片後產生預覽func1
    function readURL(input) {
        $(".edit_form_img").show();
        //$("#btn_del").show();
        
        if (input.files && input.files[0]) { //多選檔案
            var reader = new FileReader();
                    
            reader.onload = function(e) {
                $('#img_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
        
    }
    //檢查資料庫中是否已有圖片檔案，若有則顯示圖片區塊，若無則隱藏
    function check_img(img_view){
        if (img_view){
            $("#img_preview").attr('src',img_view);
            $("#btn_del").click(function(e){
                del_img(img_view);
            });

        }
        else{
            $(".edit_form_img").hide();
            $("#btn_del").hide();
        }
        $("#upload_img").set(0).files[0]=img_view;
    }

    $("#upload_img").change(function() {
        //readURL(this);//互叫變更預覽圖片的功能
        
        //預覽圖片
        var pv_img= $("#upload_img").get(0).files[0];
        var img_src=window.URL.createObjectURL(pv_img);
        $("#img_preview").attr('src',img_src);
        $(".edit_form_img").show();
            
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

//檢查發布狀態的CheckBox是否被勾選
    function check_publish(){
        if($("#publish").is('checked')){
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
