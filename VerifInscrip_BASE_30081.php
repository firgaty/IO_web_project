<?php
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
	
	$champs = "(pseudo, firstname, lastname, mail, password)";
	$values = "('".$_POST['pseudo']."', '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['mail']."', '".$_POST['password']."')";

	$req = "INSERT INTO users $champs VALUES $values ;";
	echo $req;
	//mysqli_query($connexion,$req);
	header("Location: Accueil.php"); exit;

?>
