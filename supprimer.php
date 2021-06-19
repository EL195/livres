<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	
}
$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$date=date('d/m/Y');
$bn=$_POST['name'];
if($bn!=NULL)
{
	$p=mysqli_query($set,"SELECT * FROM books WHERE id='$bn'");
	$q=mysqli_fetch_array($p);
	$bk=$q['name'];
	$ba=$q['author'];
	$sql=mysqli_query($set,"INSERT INTO issue(sid,name,author,date) VALUES('$sid','$bk','$ba','$date')");
	if($sql)
	{
		$msg="Ajouté avec succès";
	}
	else
	{
		$msg="erreur, veuillez réessayer plus tard";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application de Gestion de Bibliothèque</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
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

<span class="SubHead">Selectionnez un livre </span><br>
<tr><td class="labels">Rechercher | </td><td><input id="myInput" onkeyup="myFunction()" type="text" name="id" placeholder="Entrer le nom du livre" size="25" class="fields" required="required"  /></td></tr> 

<br />
<br />

<table id="myTable" border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>


<?php
$x=mysqli_query($set,"SELECT * FROM books");
while($y=mysqli_fetch_assoc($x))
{
	?>
	<div >
<tr ><td class='SubHead'> <?php echo $y['id'];?> </td> <td class='SubHead'><?php echo $y['name']." ".$y['author'];?></td><td><img width=80px height=90px src="./pic/<?php echo $y['image']; ?>"></td>
</td><th><a class='link' href="suppbook.php?var=<?php echo($y['id']) ?>" onclick="return confirm('Etes-vous sûr ?')">supprimer</a> </th></tr>
<?php		
}
?>
</div>
</table>

<br />
<br />
<a href="adminhome.php" class="link">Retour</a>
<br />
<br />

</div>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>