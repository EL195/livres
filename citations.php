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
	$p=mysqli_query($set,"SELECT * FROM citations");
	$q=mysqli_fetch_array($p);
	$bk=$q['name'];
	$ba=$q['author'];
  $bas=$q['Description'];
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

<span class="SubHead">Vos citations</span><br>
<tr><td style="color:white!important;" class="labels"><label>Rechercher par livre |</label> </td><td><input id="myInput" onkeyup="myFunction()" type="text" name="id" placeholder="Entrer le nom du livre" size="25" class="fields" required="required"  /></td></tr> <br>
<tr><td style="color:white!important;" class="labels"><label>Rechercher par autheur |</label> </td><td><input id="myInputa" onkeyup="myFunctiona()" type="text" name="id" placeholder="Entrer le nom de l autheur" size="25" class="fields" required="required"  /></td></tr>  <br>
<tr><td style="color:white!important;" class="labels"><label>Rechercher par citation |</label> </td><td><input id="myInputb" onkeyup="myFunctionb()" type="text" name="id" placeholder="Entrer la citation" size="25" class="fields" required="required"  /></td></tr>  <br>

<br />
<br />
<form method="post" action="">
<table id="myTable" border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr class="SubHead" style="text-decoration:underline;"><td class='SubHead'>Nom</td><td class='SubHead'>Auteur</td><td class='SubHead'>Citation</td></tr>
</div>
<?php
$x=mysqli_query($set,"SELECT * FROM citations");
$yo=mysqli_fetch_assoc($x);
while($y=mysqli_fetch_array($x))
{
	?>
	<tr class="SubHead" style="text-decoration:underline;"><td class='labels'><?php echo $y['name'];?></td><td class='labels'><?php echo $y['author'];?></td><td class='labels'><?php echo $y['Description'];?> </td> <th><a href="mocit.php?var=<?php echo($y['id']) ?>">Modifier</a><br><a href="sucit.php?var=<?php echo($y['id']) ?>" onclick="return confirm('Etes-vous sûr ?')">Supprimer</a></th></th></tr>

<?php
}
?>


</table>
</form>
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
    td = tr[i].getElementsByTagName("td")[0];
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

function myFunctiona() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputa");
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

function myFunctionb() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputb");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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