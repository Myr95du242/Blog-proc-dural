<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
</head>
<body>
	<h2> Inscrisption</h2>
	<div>
		<form action="inscription_traitement.php" method="post">
		<div>
			<label for="pseudo">Pseudo</label><br/>
			<input type="text" name="pseudo" id="pseudo" required placeholder="pseudo">			
		</div> <br/>
		<div>
			<label for="email">Email</label><br/>
			<input type="Email" name="email" id="" required placeholder="email">			
		</div> <br/>
		<div>
			<label for="mdp">Mdp</label><br/>
			<input type="password" name="mdp" id="mdp"  placeholder="mdp">			
		</div> <br/>
		<div>
			<label for="mdpC">Confirmez votre mot de passe</label><br/>
			<input type="password" name="mdpC" id="mdpC"  placeholder="mdpC">			
		</div> <br/>
		<div>
			<button type="submit" name="formconnexion" value="Login">Connexion</button> 			
		</div> 
		<?php
			if(isset($_GET['message']))
			{
				echo '<font color="red">'.$_GET['message'].'</font>';
				
				if (isset($_SESSION['id_member']) AND isset($_SESSION['pseudo'])) {
				echo $_SESSION['id_member'].'<br/>';
				echo $_SESSION['user'].'<br/>'; 
				}
			}
		?> 
	</form>

	</div>



</body>
</html>