<?php
include("setting.php");
session_start();

$s=$_GET['var'];
$f="DELETE FROM `emp` WHERE id=$s";
echo("$f");
$sql=mysqli_query($set,$f);
header("location:emp.php");

	
	?>