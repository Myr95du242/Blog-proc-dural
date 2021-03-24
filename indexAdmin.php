<?php
session_start();
	if (!$_SESSION['mdp']) 
	{
		header('Location:connexionAdmin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	<h2>Connexion Admin</h2>
	<div>
		<ul>
			<li><a href="membersAdmin.php"> Afficher les membres</a> </li>
			<li><a href="publierArticle.php"> Publier un article</a> </li>
			<li><a href="afficherArticle.php"> Afficher Article</a> </li>
			<li><a href="modifArticle.php"> Modification</a> </li>
		</ul>		
	</div>
</body>
</html>