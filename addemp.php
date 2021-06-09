<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$a=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$bn=$_POST['name'];
$au=$_POST['auth'];
if($bn!=NULL && $au!=NULL)
{
	
	$ab=mysqli_query($set,"SELECT * FROM emp WHERE livre='$bn' and auth='$au'");
	$bbb=mysqli_fetch_array($ab);
	$names=$bbb['livre'];
	$aut=$bbb['auth'];
	if ($names==$bn && $aut==$au)
	{
		$msg="Cet emprunt existe déjà";
	}
	else{
	$a="INSERT INTO `emp`(`auth`, `livre`) VALUES ('$bn','$au')";
	
	$sql=mysqli_query($set,$a);
	
	if($sql)
	{
		$msg="Ajouté avec succès";
	}
	else
	{
		$msg="Cette citation existe déjà";
	}}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application de Gestion de Bibliothèque</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="chortcut icon" href="images/logo.png" type="images/png">

</head>

<body>
<div id="banner">
<span style="text-align:center;display: block;padding-top: 23px;" class="head">Application de Gestion de Bibliothèque</span><br />
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">AJOUTER UN EMPRUNT</span>
<br />
<br />
<form method="post" action="" enctype="multipart/form-data">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr>

<tr><td class="labels">Nom de livre *: </td><td><input type="text" name="name" placeholder="Entrer le nom de livre" size="25" class="fields" required="required"  /></td></tr>
<tr><td class="labels">Demandeur *: </td><td><input type="text" name="auth" placeholder="Auteur" size="25" class="fields" required="required"  /></td></tr>



<tr><td colspan="2" align="center"><input type="submit" value="Ajouter un emprunt" class="fields" /></td></tr>





</table>
</form>
<br />
<br />
<a href="adminhome.php" class="link">Retour</a>
<br />
<br />

</div>
</div>
</body>
</html>
