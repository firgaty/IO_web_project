<?php
	header("Content-Type: text/html; charset=utf-8");
	require 'lib/lib_sql_func.php';


	//Pour interdire certain caractere lors d'une inscription
	function isChar($ligne, $c){
		for($i = 0; $i < count($ligne); $i++){
			if($ligne[$i]==$c){return true;}
		}
	return false;
	}

	require "test/connexionBD.php";

	if(findUser($_POST['pseudo']) != false){
		header("Location: Inscription.php?error=2");exit;
	}//verifie si le pseudo existe

	if($_POST['password'] != $_POST['password2']){
		header("Location: Inscription.php?error=1");exit;
	}//verifie si le mot de passe et sa verification son pareil
	
	$_POST['password'] = sha1($_POST['password']);

	$champs = array('firstname','lastname','pseudo','mail','password');
	lib_sql_insert_from_post($champs, $connexion, 'users');
	header("Location: Accueil.php");

?>
