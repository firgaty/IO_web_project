<?php
	echo "<header>";
	echo "<ul class='header'> 
		<li> <a href='Accueil.php'> Accueil </a></li>
		<li> <a href='Forum.php'> Forum </a></li>";
	if(!$connect){//partie a afficher si l'utilisateur n'est pas connecté
		echo "<li> <a href='Inscription.php'> Inscription </a></li>
		<li> <a href='Connexion.php'> Connexion </a></li>";
	}
	else{//partie à afficher si l'utilisateur est connecté
		echo "Bonjour $firstname $lastname";
		echo "<a href='logout.php'> Déconnexion </a>";
	}

	echo "</ul>";
	echo "</header>";
?>
