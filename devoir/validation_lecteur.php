<?php 
	session_start();
	

 ?>






<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<title>Projet Biblio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0 user-scalable=no">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/litera/bootstrap.min.css">
	<style type="text/css">
		.header{
			width:100%;
			height:100px;
		}
		.jumbotron{
			width:50%;
		}
	</style>
</head>
<body>
	<div class="header bg-primary text-center text-light display-4 pt-2">Bibilio & reservation de livres</div>
	<div class="container pt-4">
		<h3 class="text-center">Validation Lecteur</h3>
		<br><hr><br>
		<?php 
		if(isset($_SESSION['validation_lecteur'])){
			if($_SESSION['validation_lecteur'] == false){
				header('location: index.php');
			}
			else{
				echo "<p><b>Email : </b>".$_SESSION['lecteur_email']."</p>";
				echo "<p><b>Password : </b>".$_SESSION['lecteur_password']."</p>";
				echo "<p><b>Nom Complet : </b>".$_SESSION['lecteur_nom_complet']."</p>";
				echo "<p><b>Addresse : </b>".$_SESSION['lecteur_addresse']."</p>";
				echo "<p><b>Ville : </b>".$_SESSION['lecteur_ville']."</p>";
				echo "<p><b>Code Postale : </b>".$_SESSION['lecteur_code_postale']."</p>";
				echo "<a href='connexion_lecteur.php'>Clique ici </a> Pour se connecter comme Lecteur";
			}
		}	
		 ?>
	</div>
	
</body>
</html>