<!DOCTYPE html>
<html>
<head>
	<title>Commande</title>
</head>
<body>
	<h3>Tableau de commandes : </h3>
	<table>
		<?php 
		$myfile = fopen("cmd.txt", "r");

		echo "<table>";
		while(!feof($myfile)) {
  				echo "<tr><td width='600' bgcolor='#fefbd8'>";
  				echo fgets($myfile) . "<br>";
  				echo "</td></tr>";
				}
				echo "</table>";
				fclose($myfile); ?>
	</table>

</body>
</html>