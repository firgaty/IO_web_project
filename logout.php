<?php
	session_start();
	$a=session_destroy();
	if($a){
		echo"Déconnexion réussi <br>";
		echo"<a href='Accueil.php'> Revenir à l'accueil</a>";
	}
?>

