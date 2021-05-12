<?php
include('config.php');
$req_sql="INSERT INTO contenu(titre,date_contenu,commentaire,photo)
					VALUES(?,NOW(),?,?)";
//préparation des données
$req=$bdd->prepare($req_sql);
if(!empty($_POST['titre']) AND !empty($_POST['message']) AND !empty($_FILES['photo']['name']) ) 
{
	$titre=htmlspecialchars(addslashes($_POST['titre']));
	$commentaire=htmlspecialchars(addslashes($_POST['message']));
	$photo=$_FILES['photo']['name'];
	$error_photo= $_FILES['photo']['error'];
	$tmp_photo= $_FILES['photo']['tmp_name'];
	if($error_photo) 
	{
		switch ($_FILES['photo']['error']) 
		{
			case 1:
				echo "La taille du fichier est supérieure à 2M";
				break;
			case 2:
				echo "La taille du fichier envoyée est nulle";
				break;
			case 3:
				echo "Interruption durant le transfert";
				break;
			default:
		}
	}else{
		echo "Aucune erreur <br/>";
		if (isset($photo) && $error_photo==UPLOAD_ERR_OK) 
		{
			$destination='photos/';
			move_uploaded_file(($tmp_photo), $destination.$photo);
			echo "Le fichier ".$photo. " est donc copié correctement<br/>";
		}else{
			echo "Impossible de copier la photo";
		}
	}
	//var_dump($_FILES);
	$data = $req->execute(array($titre,$commentaire,$photo));
	echo "Votre connexion a reussi!";
}

?>