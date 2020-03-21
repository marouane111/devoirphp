<?php 
	$images=array(
		'pomme.jpg',
		'orange.jpg',
		'pommedt.jpg',
		'avocat.jpg',
		'carotte.jpg'
	);
	shuffle($images);

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Vente Fruits et Légumes</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/journal/bootstrap.min.css">
</head>
<body>
	<div class="container text-center font-weight-bold"><h1>Délice des Fruits et Légumes</h1></div>
	<ul>
		<?php 
			for ($i=0; $i <5 ; $i++) { 
				echo "<li style=\"display:inline;\">
					<img src=\"$images[$i]\" width=\"250\" height=\"250\"></li>"
				;
			}

		 ?>
	</ul>

</body>
</html>