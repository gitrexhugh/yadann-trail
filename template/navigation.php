<!--標示選單Navigation的php  -->
<!--根據Current_page參數，顯示active的功能，current_page參數在a_config網址來改變  -->
<div class="container">
	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="index.php">Home</a> 
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Edit") {?>active<?php }?>" href="edit.php">Edit</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Article") {?>active<?php }?>" href="articles.php">Article</a>
	  </li>
	</ul>
</div>