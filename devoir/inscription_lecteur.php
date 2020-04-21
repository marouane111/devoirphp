<?php 
	session_start();
	if(isset($_SESSION['connected'])){
		if($_SESSION['connected'] == true){
			header('location: lecteur.php');
		}
	}
	else{
		$myDB = new mysqli('localhost','root','','biblio');
		if(isset($_POST['submit'])){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$nom_complet = $_POST['nom_complet'];
			$addresse = $_POST['addresse'];
			$ville = $_POST['ville'];
			$code_postale = $_POST['code_postale'];

			$sql = "insert into lecteur(email,nom,password,addresse,ville,code_postale) values('".$email."','".$nom_complet."','".$password."','".$addresse."','".$ville."','".$code_postale."');";

			if($myDB->query($sql) === true){
				$_SESSION['validation_lecteur'] = true;
				$_SESSION['lecteur_email'] = $email;
				$_SESSION['lecteur_password'] = $password;
				$_SESSION['lecteur_nom_complet'] = $nom_complet;
				$_SESSION['lecteur_addresse'] = $addresse;
				$_SESSION['lecteur_ville'] = $ville;
				$_SESSION['lecteur_code_postale'] = $code_postale;
				header('location: validation_lecteur.php');
			}
			else{
				echo 'erreur';
			}
		}
	}

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
		<div class="text-center display-4">Inscription Lecteurs</div>
		<center>
		<div class="jumbotron mt-4 text-center">
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<div class="form-group">
					Email : 
					<input type="email" name="email" class="form-control" placeholder="Entrer votre email" required>
				</div>
				<div class="form-group">
					Nom Complet : 
					<input type="text" name="nom_complet" class="form-control" placeholder="Entrer votre nom" required>
				</div>
				<div class="form-group">
					Addresse : 
					<input type="text" name="addresse" class="form-control" placeholder="Entrer votre adresse" required>
				</div>
				<div class="form-group">
					Code Postale : 
					<input type="number" name="code_postale" class="form-control" placeholder="Entrer votre code postal" required>
				</div>
				<div class="form-group">
					Ville : 
					<input type="text" name="ville" class="form-control" placeholder="Entrer votre email" required>
				</div>
				<div class="form-group">
					Mot de passe : 
					<input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe" required>
				</div>
				<button class="btn btn-primary" type="submit" name="submit">Inscription</button>
			</form>
			
		</div>
		</center>
	</div>
	<div class="footer">
		<div class="container">
			Projet Réalisé par Marouane Soussi & Souhail Benlhachemi
			<br>Groupe : G3
		</div>
	</div>
</body>
</html>