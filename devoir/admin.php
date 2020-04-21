<?php 
session_start();
if(isset($_POST['submit'])){
	session_destroy();
	header('location: index.php');
}
if(isset($_SESSION['connected_admin'])){
		if($_SESSION['connected_admin'] == false){
			header('location: connexion_admin.php');
		}
	}

$myDB = $myDB = new mysqli('localhost','root','','biblio');

if(isset($_POST['submit_ajout_livre'])){
	$ISBN = $_POST['ISBN'];
	$auteur = $_POST['auteur'];
	$titre = $_POST['titre'];
	$type = $_POST['type'];

	$sql = "insert into livre values('".$ISBN."','".$auteur."','".$titre."','".$type."','non')";
	if($myDB->query($sql) === true){
	}
}

if(isset($_POST['submit_delete'])){
	$ISBN_delete = $_GET['ISBN'];
	$sql = "delete from livre where ISBN='".$ISBN_delete."';";
	$myDB->query($sql);
	locatin('location: admin.php');
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
	<div class="header bg-primary text-center text-light display-4 pt-2">Bievenue dans l'espace Admin</div>
	<div class="container-fluid pt-4">

		<div class="row mt-3 text-center">
			<div class="col-4 text-center">
				<center>
					<div class="jumbotron" style="width:100%">
						<h3 class="text-center mb-3">Ajout d'un livre</h3>
						<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
							<div class="form-group">
								Nom de L'auteur : 
								<input type="text" name="auteur" placeholder="entrer le nom de l'auteur" class="form-control" required>
							</div>

							<div class="form-group">
								Titre : 
								<input type="text" name="titre" placeholder="entrer le nom du livre" class="form-control" required>
							</div>

							<div class="form-group">
								Categorie : 
								<select class="form-control" name="type" required>
									<option value="Informatique">Informatique</option>
									<option value="Roman">Roman</option>
									<option value="Politique">Politique</option>
								</select>
							</div>

							<div class="form-group">
								Numero ISBN : 
								<input type="text" name="ISBN" placeholder="entrer le numero ISBN" class="form-control" required>
							</div>

							<button class="btn btn-primary submit" name="submit_ajout_livre" type="submit">Ajouter</button>
						</form>
					</div>
				</center>
			</div>
			<div class="col-8 text-center">
				<center>
					<div class="jumbotron" style="width:100%">
						<h3 class="text-center">Listes Des Livres</h3>
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
									echo "<td><form action='admin.php?ISBN=".$data['ISBN']."' method='post'><button class='btn btn-danger submit' type='submit' name='submit_delete'>Supprimer Livre</button></form></td>";
									echo "</tr>";
								}
							}
						 ?>
						</tbody>
						</table>
					</div>
				</center>
			</div>
		</div>



		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<button type="submit" class="btn btn-warning mb-4" name="submit">Se déconnecter</button>
		</form>
	</div>
	
</body>
</html>