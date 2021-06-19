<?php
include("setting.php");
session_start();




if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}

$idll=$_GET['idl'];
$book=mysqli_query($set,"SELECT * FROM books WHERE id='$idll'");
$the_book=mysqli_fetch_array($book);
$nom = $the_book['name'];
$author = $the_book['author'];
$genres = $the_book['genre'];
$qte = $the_book['qte'];
$image = $the_book['image'];
$description = $the_book['Description'];
$aid=$_SESSION['aid'];

//echo //$aid;
$a=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$id=$_POST['id'];
$idl=$_GET['idl'];
$bn=$_POST['name'];
$au=$_POST['auth'];
$kte=$_POST['qte'];
$genre=$_POST['genre'];
$kte=$_POST['qte'];
$desc=$_POST['desc'];
$photo=$_FILES["photo"]["name"];
$tmp_fn=$_FILES["photo"]["tmp_name"];
move_uploaded_file($tmp_fn,"./pic/$photo");
if($bn!=NULL && $au!=NULL)
{
	$r="UPDATE `books` SET `id`=$idl,`name`='$bn',`author`='$au',`genre`='genre',`qte`=$kte,`image`='$photo',Description='$desc'  WHERE id=$idl";
	
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
<span style="text-align:center;display: block;padding-top: 23px;" class="head">Application de Gestion de Bibliothèque</span><br/>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">LE LIVRE</span>
<br />
<br />
<form method="post" action="" enctype="multipart/form-data">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr>
  </td></tr> 
<tr><td class="labels">Nom de livre : </td>
<td style="color: white;">
<?php echo $nom?>
</td>
</tr>
<tr><td class="labels">Auteur : </td><td style="color: white;"><?php echo $author?></td></tr>
<tr><td class="labels"> Quantité: </td><td style="color: white;"><?php echo $qte?></td></tr>
<tr>
<td class="labels"> Genre</td>  
<td style="color: white;">
<?php 
echo $genres;
?>
   
		</td>
	</tr>



<tr><td class="labels"> Image: </td><td><img width=80px height=90px src="./pic/<?php echo $image; ?>"></td></tr>
 <tr class="SubHead" style="text-decoration:underline;"> <th class="labels" rowspan=2
 
 span=2 rowspan=5>description </th> 
 <td colspan=4> <textarea readonly name='desc'  rows=10 cols=90> <?php echo $description?></textarea> </td></tr>


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