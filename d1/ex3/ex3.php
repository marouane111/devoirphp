<!DOCTYPE html>
<html>
<head>
	<title>Centrale d'achats</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/journal/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<h1>Centrale d'achats</h1><br>
	<h3>Commande clients</h3><br>
	<table class="table">
    <thead>
      <tr>
        <th>Numéro de commande</th>
        <th>Numéro Client</th>
        <th>Date de commande</th>
        <th>Désignation article</th>
        <th>Quantité</th>
        <th>Prix unitaire</th>
        <th>Date de Livraison</th>
        <th>Adresse client</th>
      </tr>
    </thead>
	<?php 
	$mon_fichier=fopen("cmd.txt", "r");
	
	while (!feof($mon_fichier)) {
			$cmp=fgets($mon_fichier);
			$chaine=explode('|', $cmp);
			$numc=$chaine[0];
			$numcl=$chaine[1];
			$datecmd=$chaine[2];
			$des=$chaine[3];
			$quant=$chaine[4];
			$prixu=$chaine[5];
			$datel=$chaine[6];
			$adresse=$chaine[7];

			echo "<tbody>
      <tr>
        <td>".$numc."</td>
        <td>".$numcl."</td>
        <td>".$datecmd."</td>
        <td>".$des."</td>
        <td>".$quant."</td>
        <td>".$prixu."</td>
        <td>".$datel."</td>
        <td>".$adresse."</td>
      </tr> 
      ";
			
			
	}


 ?>
</table>

</div>
</body>
</html>