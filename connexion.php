<?php
session_start();
require_once('config.php');

if (!empty($_POST['pseudo']) AND !empty($_POST['mdp'])) 
{

	$pseudo=htmlspecialchars(trim($_POST['pseudo']));
	$mdp=htmlspecialchars(trim($_POST['mdp']));

	$req_sql='SELECT * FROM members WHERE pseudo=?';

	$req= $bdd->prepare($req_sql);

	$req->execute(array($pseudo));

	$data=$req->fetch();

	$isPseudoExist= $req->rowCount();

	if ($isPseudoExist)
	{
		$mdp_recup= $data['mdp'];
		$isMdpexist=password_verify($mdp, $mdp_recup);
			if ($isMdpexist) 
			{
				$msg='Vous êtes connectés !';	
				//header('Location: index.php?message='.$msg);

				$_SESSION['id']= $data['id_member'];
				$_SESSION['user']= $pseudo;
				header('Location:langing.php?');
			}
			else
			{
				$msg='Mdp incorrect !';	
				header('Location: index.php?message='.$msg);
			}		
	}
	else
	{
		$msg='Veuillez vous inscrire !';	
		header('Location: index.php?message='.$msg);
	}	
}
else
{
	$msg='Tous les champs doivent être entrés !';	
	header('Location: index.php?message='.$msg);
}
?>