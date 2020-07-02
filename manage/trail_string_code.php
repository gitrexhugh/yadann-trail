<html>
<form action="trail_string_code.php" method="post" name="textform">
    原始輸入<br>
    <textarea id="editor1" name="inputtext" type="textarea"  style="width:400px;height:200px;"></textarea><br>
    <input class="form_submit" type="Submit" value="Submit"></input>
</form>


</html>

<?php
    //require_once("fundation_func.php");
    //$link = new mysqli($dbhost,$dbuser,$dbpass,$db);
    $inputtext=$_POST['inputtext'];
    //$specialchars=htmlspecialchars($inputtext,ENT_QUOTES,'UTF-8', true);
    //$htmlentities=htmlentities($inputtext);
    $decode=htmlspecialchars_decode($inputtext);
    //$real_escape_string=$link->real_escape_string($inputtext);
    //$htmlspecialchars=htmlspecialchars($inputtext);
    echo "<font color='black'>未處理字串：$inputtext<br></font>";
    //echo "<font color='blue'>specialchars處理後：<br>$specialchars<br></font>";
    //echo "<font color='blue'>tities處理後：<br>$htmlentities<br></font>";
    echo "<font color='red'>decode處理後：<br>$decode<br></font>";
    //echo "<font color='green'>real_escape_string處理後：$real_escape_string<br></font>";
    //echo "<font color='pink'>htmlspecialchars處理後：$htmlspecialchars<br></font>";
?>

