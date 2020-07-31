<?php
//取得資料庫設定與連線function
require_once("fundation_func.php");
//require_once("uploadimg.php");
/*
$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
$q_product_id=entities_fix_string($link,$_GET["ed_p"]);
$product=get_product_content_wlink($link,$q_product_id);
$product_id=$product->product_id;
$product_name=$product->product_name;
$product_content=$product->product_content;
$product_img=$product->product_img;
$is_publish=$product->product_pub;
*/
//$test="product_imgs/20200710023209000.jpg";
//echo "ID=$product_id<br>Name=$product_name<br>content=$product_content<br>img=$product_img";

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="manage.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <form id="img_form" action="uploadimg.php?ed_p=001" method="POST" name="img_form" enctype="multipart/form-data">
    <div class="edit_form_col">
        <label class="col_title"> 圖檔：</label>
        <label class="btn_img">請選擇圖片
            <input id="upload_img" type="file" multiple="multiple" name="myfile">
        </label>
        <div class="form_img_col">
            <div class="edit_form_img">
                <img id="img_preview" name="img_pv" />
                <label id="btn_del" class="btn_del" onclick="clear_preview()" >刪除</label>
            </div>
            <textarea id="imgb64" style="display:none;" name="imgb64"></textarea>
        </div>
        <input class="form_submit" type="button" value="修改" onclick="sent_img()"></input>
    </form>
</html>

<script>
    //檢查產品圖片，根據是否有圖片顯示不同的圖片區塊
    
    $(document).ready(function(){
        //var img_view="<?php// echo "$product_img" ?>";
        //check_img(img_view);
        $(".edit_form_img").hide();
        $("#btn_del").hide();

    });
    

    //選擇圖片後產生預覽func1
    function readURL(input) {
        $(".edit_form_img").show();
        $("#btn_upload").show();
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
        //$("#upload_img").set(0).files[0]=img_view;
        //$("#upload_img").val(img_view);
    }

    $("#upload_img").change(function() {
        //readURL(this);//互叫變更預覽圖片的功能
        //取得file選擇的檔案
        var pv_img = $("#upload_img").get(0).files[0];
        //轉乘base64來預覽圖片
        var reader = new FileReader();
        reader.onload=function(){
            $("#img_preview").attr('src',reader.result);
            $("#imgb64").val(reader.result);
            $(".edit_form_img").show();
            $("#btn_del").show();
        }
        reader.readAsDataURL(pv_img);

/*
        //取得路徑來預覽圖片
        var pv_img= $("#upload_img").get(0).files[0];
        var img_src=window.URL.createObjectURL(pv_img);
        $("#img_preview").attr('src',img_src);
        $(".edit_form_img").show();

        imgb= new Blob();
        imgb=reader.readAsDataURL(pv_img);
        show_imgb (imgb);
        */
            
    });

    function clear_preview(){
        clear='';
        //var reader = new FileReader();
        //reader.onload=function(){
            $(".edit_form_img").hide();
            $("#btn_del").hide();
            $("#img_preview").attr('src',clear);
            $("#imgb64").val(clear);
        //}
        //reader.readAsDataURL('');
    }


    //傳送圖片資料
    function sent_img(){
        //alert (imgb);
        //$("#img_preview").val(imgb);
        img_form.submit();
    }

</script>