<?php 
$about_info=get_about_info_wlink($link);//取得about_us內容的function
$slogan=$about_info->slogan;
$about_us=$about_info->about_us;
$about_us=htmlspecialchars_decode($about_us);//還原編碼後的html內容
$about_us_tel=$about_info->about_us_tel;
$about_us_address=$about_info->about_us_address;
$about_us_fax=$about_info->about_us_fax;
$about_us_mail=$about_info->about_us_mail;
$company_name=$about_info->company_name;

?>

<section id="about">
    <h1 id="about_title"><?php echo "$company_name";?></h1>
    <div id="about_img"><img src="images/about_us_img.png" /></div>
    <article id="about_content"><?php echo "$about_us";?>
    </article>

</section>