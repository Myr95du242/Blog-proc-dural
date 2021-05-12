<?php
$bdd = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
if (!$bdd) {
	echo 'Echec de connexion !';
	exit();
}

$request='SELECT id_contenu,titre,DATE_FORMAT(date_contenu,\'%d/%m/%Y à %Hh%imin%ss\') As date_fr,commentaire,photo FROM contenu ORDER BY date_contenu DESC LIMIT 0,5';
$req= $bdd->query($request);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
</head>
<body>
	<h3>BLOG</h3>

	<?php
		while($data = $req->fetch()){
			?>
			<h5><?= htmlspecialchars(addslashes($data['titre'])) ?></h5>			
			<strong> Le <?= $data['date_fr'] ?></strong><br/>
			<p><?= htmlspecialchars(addslashes($data['commentaire'])) ?></p>			

			<p><?= htmlspecialchars(addslashes($data['photo'])) ?></p>
	<?php
		}
		$req->closeCursor();
	?>
	
	
</body>
</html>