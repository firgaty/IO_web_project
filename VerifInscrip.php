<?php
	header("Content-Type: text/html; charset=utf-8");
	require_once 'lib/lib_sql_func.php';


	//Pour interdire certain caractere lors d'une inscription
	function isChar($ligne, $c){
		for($i = 0; $i < count($ligne); $i++){
			if($ligne[$i]==$c){return true;}
		}
	return false;
	}

	require "test/connexionBD.php";

	foreach($_POST as $k => $v){
		if($v==""){
		header("Location: Inscription.php?error=3");exit;}
	}//vérifie que tous les champs soit remplis

	if(findUser($_POST['pseudo']) != false){
		header("Location: Inscription.php?error=2");exit;
	}//verifie si le pseudo existe

	if($_POST['password'] != $_POST['password2']){
		header("Location: Inscription.php?error=1");exit;
	}//verifie si le mot de passe et sa verification son pareil


	$_POST['password'] = sha1($_POST['password']);

	$champs = array('firstname','lastname','pseudo','mail','password');

	lib_sql_insert_from_post($champs, $connexion, 'users');

	session_start();
	$user = findUser($_POST['pseudo']);
	$liste = array("id", "firstname", "lastname", "mail","pseudo");
	for($i=0;$i<count($liste);$i++){$_SESSION[$liste[$i]] = $user[$liste[$i]];}

	header("Location: Accueil.php");exit;

?>
