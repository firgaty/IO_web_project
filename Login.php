<?php
	session_start();

	function findUser(){
		$connexion = mysqli_connect ( "pams.script.univ-paris-diderot.fr", "pmejan65", 'd0M%bw5Z' ) ;	
		MYSQLI_SELECT_DB($connexion, 'pmejan65');
		if (!$connexion) {
			echo "Pas de connexion au serveur " ; exit ;	
		}
		$req = "SELECT * FROM users WHERE pseudo='".$_POST['pseudo']."';";
		$reponse = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
		$tab = mysqli_fetch_assoc($reponse1);
		return $tab; 
	}

	$user = findUser();
	//doit renvoyer false si l'utilisateur n'existe pas et un tableau des données de l'utilisateur si il existe
	$user = array("id"=>"1", "firstname"=>"askia", "lastname"=>"hamani", "mail"=>"aaa@gmail.com","pseudo"=>"asas","password"=>"azerty");
	
	if(!user){header("Location: Connexion.php?error=1");exit;}
	// Si l'utilisateur n'existe pas renvoie un erreur

	if($_POST['password'] != $user['password']){header("Location: Connexion.php?error=2");exit;}
	//Si le mot de passe est incorrect renvoie une erreur
	else{
		$liste = array("id", "firstname", "lastname", "mail","pseudo");
		for($i=0;$i<count($liste);$i++){$_SESSION[$liste[$i]] = $user[$liste[$i]];}
	header("Location: Accueil.php");
	}
	//Sinon creer une session à l'utilisateur
?>
