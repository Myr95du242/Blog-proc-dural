<?php
session_start();
	
	if (isset($_POST['valider'])) 
	{
		if (!empty($_POST['pseudo']) AND !empty($_POST['mdp'])) 
		{

			$pseudo_par_defaut="admin";
			$mdp_par_defaut ='admin1234';

			$pseudo_saisi=htmlspecialchars($_POST['pseudo']);
			$mdp_saisi =htmlspecialchars($_POST['mdp']);
			if ($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi ==$mdp_par_defaut) 
			{
				$_SESSION['mdp']= $mdp_saisi;
				header('Location:indexAdmin.php');
			}else{
				echo 'pseudo ou mdp incorrect !';
			}
		}else{
			echo 'Remplir tous les champs !';
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Connexion Admin</title>
</head>
<body>
	<h2>Connexion</h2>
	<form action="" method="post">
		<div>
			<label for="pseudo">Pseudo</label><br/>
			<input type="text" name="pseudo" id="pseudo" placeholder="pseudo" 
			value="<?php if(isset($_POST['pseudo']) AND !empty($_POST['pseudo'])){ echo $_POST['pseudo'] ;} ?>" >			
		</div> <br/>
		
		<div>
			<label for="mdp">Mdp</label><br/>
			<input type="password" name="mdp" id="mdp"  placeholder="mdp">			
		</div> <br/>
		<div>
			<button type="submit" name="valider" value="Login">Connexion</button> 		
		</div> 
	</form>
	
</body>
</html>