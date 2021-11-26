<!DOCTYPE html>
<html>
<head>
	<title> Pilonne Airtel </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<table class="tableau-style">
<form method="post">
<label>Recherche</label>
<input type="text" name="search">
<input type="submit" name="submit">
	
</form>
</table>
</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=newgeo21",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `newgeo21` WHERE Cellid = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table class="tableau-style">
			<tr>
				<th>Cellid</th>
				<th>Site_name</th>
				<th>Territoire</th>
			</tr>
			<tr>
				<td><?php echo $row->Cellid; ?></td>
				<td><?php echo $row->Site_name;?></td>
				<td><?php echo $row->Territoire;?></td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Cell_Id not Found";
		}


}

?>