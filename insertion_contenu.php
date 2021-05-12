<?php


$bdd = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
if (!$bdd) {
	echo 'Echec de connexion !';
	exit();
}

$req_sql="INSERT INTO contenu(titre,date_contenu,commentaire,photo)
					VALUES(?,NOW(),?,?)";
//préparation des données
$req=$bdd->prepare($req_sql);

if(!empty($_POST['titre']) AND !empty($_POST['message']) AND !empty($_FILES['photo']['name']) ) 
{
	$titre=htmlspecialchars(addslashes($_POST['titre']));
	$commentaire=htmlspecialchars(addslashes($_POST['message']));
	$photo=$_FILES['photo']['name'];

	$data = $req->execute(array($titre,$commentaire,$photo));
	echo "Votre connexion a reussi!";
}



?>