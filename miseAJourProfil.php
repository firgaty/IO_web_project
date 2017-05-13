<?php 
	require 'session.php';
	require 'lib/lib_sql_func.php';
	
	foreach($_POST as $k => $v){
		if($v==""){
		header("Location: modification.php?error=3");exit;}
	}//vérifie que tous les champs soit remplis
	
	if(findUser($_POST['pseudo']) != false && $_POST['pseudo'] != $pseudo){
		header("Location: modification.php?error=2");exit;
	}//verifie si le pseudo existe

	if($_POST['password'] != $_POST['password2']){
		header("Location: modification.php?error=1");exit;
	}//verifie si le mot de passe et sa verification son pareil

	$_POST['password'] = sha1($_POST['password']);

	unset($_POST['password2']);

	updateUser($id,$_POST);
	
	$user = findUser($id);
	$liste = array("id", "firstname", "lastname", "mail","pseudo");
	for($i=0;$i<count($liste);$i++){$_SESSION[$liste[$i]] = $user[$liste[$i]];}
	
	unset($_COOKIE['pass']);
	header("Location: profil.php");exit;
?>
