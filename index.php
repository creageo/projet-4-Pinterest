<!DOCTYPE html>

<html>

<head>

	<!-- lien vers bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- lien vers mon css -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- charactrere spécial -->
	<meta charset="utf-8">
	<!-- titre dans l'onglet -->
	<title>Pinterest</title>

</head>

<body>

	<!-- ligne horizontale -->
	<hr>
	<!-- titre principale -->
	<h1>Pinterest</h1>

	<hr>

	<?php

	if(isset($_FILES['avatar'])){

	$dossier = 'upload/';
	$fichier = $dossier . basename($_FILES['avatar']['name']);
	$extensions = array('jpg','jpeg','png','gif','WebP');
	$imagePath_parts = pathinfo($_FILES['avatar']['name']);
	$extentionImage = $imagePath_parts['extension'];

	if (!in_array($extentionImage, $extensions)) {
		$erreur = 'ONLY FILETYPE : .jpg .jpeg .png .gif .WebP';
	}

		if (move_uploaded_file($_FILES['avatar']['tmp_name'], $fichier)) {
			echo 'Envoie du fichier : ok';
			echo "<br>";
		}

		else{
			echo 'Envoie du fichier : echec';
			echo "<br>";
		}

	}

	$dossier = 'upload/';
	$contenu_du_dossier = scandir( $dossier );

	foreach( $contenu_du_dossier as $value ){
	if ( 0 != strpos($value, '.') ){
	echo '<img src="'.$dossier. '/'. $value.'" alt="" width="200">';
	}
	}

	?>

	<hr>
	<!-- début de mon formulaire d'envoie multimedia et lien vers mon fichier php, avec la methode post -->
	<form method="POST" enctype="multipart/form-data" class="form-inline">

		<div class="form-group">
		<!-- image a envoyer -->
		<input type="file" id="exampleInputFile" name="avatar">
		</div>

		<div class="form-group">
		<!-- bouton d'envoie du formulaire -->
		<input class="btn btn-default" type="submit" name="bouton">
		</div>

	</form>

</body>

</html>