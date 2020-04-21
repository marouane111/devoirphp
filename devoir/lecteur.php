<?php 
session_start();
if(isset($_POST['submit'])){
	session_destroy();
	header('location: index.php');
}
if(isset($_SESSION['connected_lecteur'])){
		if($_SESSION['connected_lecteur'] == false){
			header('location: connexion_lecteur.php');
		}
	}

$myDB = new mysqli('localhost','root','','biblio');


if(isset($_POST['submit_reserver'])){
	$ISBN_reserver = $_GET['ISBN'];
	$sql = "update livre set reserve='oui' where ISBN='".$ISBN_reserver."';";
	$myDB->query($sql);


	$sql2 = "insert into reservation(ISBN,id_lecteur)values('".$ISBN_reserver."','".$_SESSION['id_lecteur']."');";
	$myDB->query($sql2);

	header('location: lecteur.php');
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
	</style>
</head>
<body>
	<div class="header bg-primary text-center text-light display-4 pt-2">Bievenue dans l'espace Lecteur</div>
	<div class="container-fluid pt-4">

		<div class="row">
			<div class="col-4">
				<div class="jumbotron">
					<h3 class="text-center">Mes Reservations</h3>
					<table class="table table-striped text-center">
							<thead>
								<tr>
									<th>ID Reservation</th>
									<th>ISBN</th>
									<th></th>
								</tr>
							</thead>
						<tbody>
						<?php 
							$sql = "select * from reservation where id_lecteur='".$_SESSION['id_lecteur']."';";
							$response = $myDB->query($sql);
							if($response->num_rows > 0){
								while($data = $response->fetch_assoc()){
									echo "<tr>";
									echo "<td>".$data['id_reservation']."</td>";
									echo "<td>".$data['ISBN']."</td>";
									echo "<td><form action='lecteur.php?ISBN=".$data['ISBN']."' method='post'><button class='btn btn-warning submit' type='submit' name='submit_reserver'>Annuler Reservation</button></form></td>";
									echo "</tr>";
								}
							}
						 ?>
						</tbody>
						</table>
				</div>
			</div>
			<div class="col-8">
				<div class="jumbotron">
					<h3 class="text-center">Listes des livres</h3>
					<table class="table table-striped text-center">
							<thead>
								<tr>
									<th>ISBN</th>
									<th>Auteur</th>
									<th>Titre</th>
									<th>Type</th>
									<th>Réservé ?</th>
									<th></th>
								</tr>
							</thead>
						<tbody>
						<?php 
							$sql = "select * from livre";
							$response = $myDB->query($sql);
							if($response->num_rows > 0){
								while($data = $response->fetch_assoc()){
									echo "<tr>";
									echo "<td>".$data['ISBN']."</td>";
									echo "<td>".$data['auteur']."</td>";
									echo "<td>".$data['titre']."</td>";
									echo "<td>".$data['type']."</td>";
									echo "<td>".$data['reserve']."</td>";
									if($data['reserve'] == 'non'){
										echo "<td><form action='lecteur.php?ISBN=".$data['ISBN']."' method='post'><button class='btn btn-success submit' type='submit' name='submit_reserver'>Réserver ce livre</button></form></td>";
									}
									echo "</tr>";
								}
							}
						 ?>
						</tbody>
						</table>
				</div>
			</div>
		</div>




		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<button type="submit" class="btn btn-warning" name="submit">Se déconnecter</button>
		</form>
	</div>
	
</body>
</html>