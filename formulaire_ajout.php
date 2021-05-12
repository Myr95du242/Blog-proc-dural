<!DOCTYPE html>
<html>
<head>
	<title>Page Accueil</title>
	<meta charset="utf-8" content="text/html" />
</head>
<body>
	<h3>Formulaire d'ajout de contenu au Blog</h3>
	<form action="insertion_contenu.php" method="post" enctype="multipart/form-data">
		<p>
			<label>Titre </label><br/> 
			<input type="text" name="titre"><br/>
		</p>
		<p>
			<label>Commentaire</label><br/>
			<textarea name="message"></textarea><br/>
		</p>
		<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
		<p>Choisissez votre photo à ajouter</p>
		<input type="file" name="photo"><br/>
		<input type="submit" name="envoyer" value="send">
	</form>
	<br/><a href="affichage_blog.php">Page d'affichage du blog</a><br/>
</body>
</html>