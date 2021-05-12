<?php
$bdd = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
if (!$bdd) {
	echo 'Echec de connexion !';
	exit();
}
?>