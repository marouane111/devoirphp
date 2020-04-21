<?php 
	session_start();
	if(isset($_SESSION['connected_lecteur'])){
		if($_SESSION['connected_lecteur'] == true){
			header('location: lecteur.php');
		}
	}
	else{
		$myDB = new mysqli('localhost','root','','biblio');
		if(isset($_POST['submit'])){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$sql = "select * from lecteur where email='".$email."' and password='".$password."';";
			$response = $myDB->query($sql);
			if($response->num_rows > 0){
				$_SESSION['connected_lecteur'] = true;
				$data = $response->fetch_assoc();
				$_SESSION['id_lecteur'] = $data['id_lecteur'];
				header('location: lecteur.php');
			}
			else{
				echo 'Email ou mot de passe incorrecte';
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
		<div class="text-center display-4">Connexion Lecteurs</div>
		<center>
		<div class="jumbotron mt-4 text-center">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
				<div class="form-group">
					Email : 
					<input type="email" name="email" class="form-control" placeholder="Entrer votre email" required>
				</div>
				<div class="form-group">
					Mot de passe : 
					<input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe" required>
				</div>
				<button class="btn btn-primary" type="submit" name="submit">Connexion</button>
			</form>
			<div class="mt-3">Vous n'avez pas de comptes ?<a href="inscription_lecteur.php"> Cliquez ici </a>pour créer un compte</div>
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