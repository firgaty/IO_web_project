<?php
	include 'session.php';
?>
<!DOCTYPE>
<html>
<head>
        <title> Inscription </title>
        <meta charset='utf-8'>
	<link rel="stylesheet" href="style.css">
</head>
<body>
        <?php
	include 'header.php';
	?>
	<p>
	Vous possédez déja un compte ? <a href='Connexion.php' > Connectez vous ici </a>
	</p>
	<form id='inscription' action='VerifInscrip.php' method='POST'>
	<table> 
	<tr> <td> Nom : </td> <td> <input type='text' name='lastname'></td></tr>
	<tr> <td> Prénom : </td> <td> <input type='text' name='firstname'></td></tr>
	<tr> <td> Pseudo : </td> <td> <input type='text' name='pseudo'></td></tr>
	<tr> <td> Mail : </td> <td> <input type='email' name='mail'></td></tr>
	<tr> <td> Mot de passe : </td> <td> <input type='password' name='password'></td></tr>
	<tr> <td> Vérification du mot de passe : </td> <td> <input type='password' name='password2'></td></tr>
	</table>
	<input type='submit' value='Valider mon insciption'>
	</form>
</body>
</html>
