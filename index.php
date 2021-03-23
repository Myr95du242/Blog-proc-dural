<!DOCTYPE html>
<html>
<head>
	<title>Accueil Connexion</title>
</head>
<body>
	<h3>Connexion</h3>
	<div>
		<form action="connexion.php" method="post">
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
			<button type="submit" name="formconnexion" value="Login">Connexion</button> 		
		</div> 
	</form>
	<p><a href="inscription.php"><em> Pas de compte? Inscrivez-vous </em></a> </p>
	<?php
		if(isset($_GET['message']))
		{
			echo '<font color="red">'.$_GET['message'].'</font>';

			if (isset($_SESSION['id']) AND isset($_SESSION['user'])) 
			{
				echo $_SESSION['id'].'<br/>';
				echo $_SESSION['user'].'<br/>';
			}

			/*if (isset($_SESSION['id_member']) AND isset($_SESSION['pseudo'])) 
			{
				echo $_SESSION['id_member'].'<br/>';
				echo $_SESSION['pseudo'].'<br/>';
			}*/
		}
	?> 
	</div>
</body>
</html>