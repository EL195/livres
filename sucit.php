<?php
include("setting.php");
session_start();

$s=$_GET['var'];
$f="DELETE FROM `citations` WHERE id=$s";
echo("$f");
$sql=mysqli_query($set,$f);
header("location:citations.php");

	
	?>