<?php
	echo "<header>";
	echo "<ul class='header'> 
		<li> <a href='Accueil.php'> Accueil </a></li>
		<li> <a href='Forum.php'> Forum </a></li>";
	if(!$connect){//partie a afficher si l'utilisateur n'est pas connecté
		echo "<li> <a href='Inscription.php'> Inscription </a></li>";
		echo "<li> <a href='Connexion.php'> Connexion </a></li>";
		echo "<li> <form action='Login.php' method='POST'> 
			<input type='text' name='pseudo' placeholder='pseudo'><br>
			<input type='password' name='password' placeholder='password'><br>
			<input type='submit' value='connexion'>
			</form></li>";
	}
	else{//partie à afficher si l'utilisateur est connecté
		echo "<li> <a href='profil.php'> Profil </a></li>";
		echo "<li><a href='logout.php'> Déconnexion </a></li>";
	}

	echo "</ul>";
	echo "</header>";
?>
