<?php
session_start();

if (!isset($_SESSION['user'])) 
{
	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Bienvenue !</title>
</head>
<body>
	<h1> Bonjour <?php echo '<em>'.$_SESSION['user'].'</em>';?>
	</h1>
	<a href="deconnexion.php">Déconnexion</a>	
</body>
</html>