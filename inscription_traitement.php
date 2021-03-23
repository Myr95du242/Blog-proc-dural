<?php
session_start();

require_once('config.php');

	if( !empty($_POST['pseudo']) AND !empty($_POST['email']) AND
		!empty($_POST['mdp']) AND !empty($_POST['mdpC']) )
	{
		$message='On avance !';
		header('Location:inscription.php?message='.$message); // Envoi du msg de réussite
		
		$pseudo=htmlspecialchars(trim($_POST['pseudo']));
		$email=htmlspecialchars(trim($_POST['email']));
		$mdp=htmlspecialchars(trim($_POST['mdp']));
		$mdpC=htmlspecialchars(trim($_POST['mdpC']));  

		// Connexion et requête à la base de donnée
		$check= $bdd->prepare('SELECT pseudo, email, mdp FROM members WHERE pseudo= ? ');
		$check->execute(array($pseudo));
		$data = $check->fetch();		
		$is_pseudo_exist = $check->rowCount();

		//Checking du pseudo
		if ($is_pseudo_exist==0)
		{
			$message='Vous pouvez vous inscrire !';
			header('Location:inscription.php?message='.$message);
			if (strlen($pseudo)<=100)
			{
				$message=' pseudo normal !';
				header('Location:inscription.php?message='.$message);

				//Vérif du mail
				if (filter_var($email,FILTER_VALIDATE_EMAIL) )
				{
					$message='le mail est correct !';
					header('Location:inscription.php?message='.$message);

					//Vérif mdp
					if ($mdp==$mdpC) 
					{
						$mdp_hash=password_hash($mdp, PASSWORD_DEFAULT);
						$ip= $_SERVER['REMOTE_ADDR'];

						$check->closeCursor();

						$req_inscription='INSERT INTO members(pseudo,email,mdp,ip)VALUES(:pseudo,:email,:mdp,:ip)';

						$check=$bdd->prepare($req_inscription);
						$check->execute(array(	'pseudo'=>$pseudo,
												'email'=>$email,
												'mdp'=>$mdp_hash,
												'ip'=>$ip
											)
										);	
						$message='Bienvenue ! Vous êtes inscrit';
						header('Location:inscription.php?message='.$message);					
					}
					else
					{
						$message='Mot de passe incorrect !';
						header('Location:inscription.php?message='.$message);
					}
				}
				else
				{
					$message='Mail invalide !';
					header('Location:inscription.php?message='.$message);
				}

			}
			else
			{
				$message='Pseudo trop lent !';
				header('Location:inscription.php?message='.$message);
			}
		}
		else
		{
			$message='Ce pseudo existe déjà !';
			header('Location:inscription.php?message='.$message);
		}
	}
	else
	{
		$message='Tous les champs doivent être remplis !'; 
		header('Location:inscription.php?message='.$message);
	}
?>