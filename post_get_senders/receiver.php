<?php
if(isset($_POST['x1']))
{
$show1=$_POST['x1'];
}else{
$show1="not assigned...";
}
echo "begin...<br>";
echo $show1;
echo "<br>end...<br>";
echo "<a href=\"sender.php\">back</a>";
?>

