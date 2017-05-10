<?php 
	include 'session.php';
?>
<html>
<head>
        <title> Connexion </title>
        <meta charset='utf-8'>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>       
	<?php
	include 'header.php';
	if(isset($_GET['error'])){
		echo"<p>Connection échouée.<br>";
		if($_GET['error'] == 1){echo"Utilisateur introuvable.";}
		if($_GET['error'] == 2){echo"Mot de passe incorrect.";}		
	}
	//Vérifie les erreurs
	?>
	<h1> Connexion </h1>
	<p>
	Vous n'êtes pas encore inscrit ? <a href='Inscription.php' > Inscrivez vous ici </a>
	</p><br>
	<form action='Login.php' method='POST'><table>
	<tr><td> Pseudo : </td><td> <input type='text' name='pseudo'></td></tr>
	<tr><td> Mot de passe : </td><td> <input type='password' name='password'></td></tr>
	</table>
	<input type='submit' value='Connexion'> </form>
	
	<?php include 'footer.php'; ?>
</body>
</html>
