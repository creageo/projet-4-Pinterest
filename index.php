<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Pinterest</title>

</head>
<body>

<hr>

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

<form method="POST" enctype="multipart/form-data">
	<input type="file" name="avatar">
	<input type="submit" name="bouton" value="Envoyer le fichier">
</form>

</body>
</html>