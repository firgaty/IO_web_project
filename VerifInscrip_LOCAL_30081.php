<?php
	header("Content-Type: text/html; charset=utf-8");
	require_once 'lib_sql_func.php';


	//Pour interdire certain caractere lors d'une inscription
	function isChar($ligne, $c){
		for($i = 0; $i < count($ligne); $i++){
			if($ligne[$i]==$c){return true;}
		}
	return false;
	}


	/*$connexion = mysqli_connect ( "pams.script.univ-paris-diderot.fr", "pmejan65", 'd0M%bw5Z' ) ;

	MYSQLI_SELECT_DB($connexion, 'pmejan65');

	if (!$connexion) {
		echo "Pas de connexion au serveur " ; exit ;
	}*/
	$connexion = mysqli_connect('127.0.0.1', 'root', '', 'IO2_web_project');
	if(!$connexion) {
		echo 'Pas de connexion au seveur';
		exit;
	}


	$champs = array('firstname','lastname','pseudo','mail','password');
	lib_sql_insert_from_post($champs, $connexion, 'users');
	// header("Location: Accueil.php");

?>
