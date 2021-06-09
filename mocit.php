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
$id=$_POST['id'];
$idl=$_GET['var'];
$aa=mysqli_query($set,"SELECT * FROM citations WHERE id='$idl'");
$bb=mysqli_fetch_array($aa);
$nom=$bb['name'];
$autheur=$bb['author'];
$Descriptions=$bb['Description'];

$bn=$_POST['name'];
$au=$_POST['auth'];
$desc=$_POST['desc'];
$photo=$_FILES["photo"]["name"];
$tmp_fn=$_FILES["photo"]["tmp_name"];
move_uploaded_file($tmp_fn,"./pic/$photo");
if($bn!=NULL && $au!=NULL)
{
	$r="UPDATE `citations` SET `id`=$idl,`name`='$bn',`author`='$au',Description='$desc'  WHERE id=$idl";
	
	$sql=mysqli_query($set,$r);
	$y=mysqli_fetch_assoc($sql);
	if($sql)
	{
		$msg="modifié avec succès";
	}
	else
	{
		$msg="Impossible de modifier";
	}
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

<span class="SubHead">MODIFIER LA CITATION</span>
<br />
<br />
<form method="post" action="" enctype="multipart/form-data">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr>
</td></tr> 
<tr><td class="labels">Nom de livre : </td><td><input type="text" name="name"  size="25" class="fields" required="required" value='<?php echo $nom; ?>'  /></td></tr>
<tr><td class="labels">Auteur : </td><td><input type="text" name="auth"  size="25" class="fields" required="required" value='<?php echo $autheur; ?>' /></td></tr>

 <tr class="SubHead" style="text-decoration:underline;"> <th class="labels" rowspan=2
 
 span=2 rowspan=5>Citation </th> 
 <td colspan=4> <textarea name='desc'  rows=10 cols=90><?php echo $Descriptions; ?></textarea> </td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Modifier" class="fields" /></td></tr>


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