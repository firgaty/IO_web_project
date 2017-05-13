<?php
	session_start();
	require_once 'lib/lib_sql_func.php';

	$user = findUser($_POST['pseudo']);
	//doit renvoyer false si l'utilisateur n'existe pas et un tableau des données de l'utilisateur si il existe
	if(!user){header("Location: Connexion.php?error=1");exit;}
	// Si l'utilisateur n'existe pas renvoie un erreur

	if(!lib_sql_password_verify($_POST['password'], $_POST['pseudo']))
		{header("Location: Connexion.php?error=2");exit;}
	//Si le mot de passe est incorrect renvoie une erreur
	else{
		$liste = array("id", "firstname", "lastname", "mail","pseudo");
		for($i=0;$i<count($liste);$i++){$_SESSION[$liste[$i]] = $user[$liste[$i]];}
	header("Location: Accueil.php");
	}
	//Sinon creer une session à l'utilisateur
?>
