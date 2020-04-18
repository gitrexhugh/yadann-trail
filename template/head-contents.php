<title><?php print $PAGE_TITLE;?></title>

<?php if ($CURRENT_PAGE == "Index") { ?>
	<meta name="description" content="" />
	<meta name="keywords" content="" /> 
<?php } ?>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!-- 取得a_config定義的CSS路徑  -->
<link rel="stylesheet" type="text/css" href="<?php echo $css_root?>main.css";?>> 

<style>
	#main-content {
		margin-top:20px;
	}
	.footer {
		font-size: 14px;
		text-align: center;
	}
</style>