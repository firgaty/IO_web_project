<?php
	include 'session.php';
	if(isset($_POST['pass'])){
		setcookie('pass',$_POST['pass'], time()+5*60);
		header("Location: modification.php");
	}
?>
<!DOCTYPE>
<html>
<head>
        <title> Modification </title>
        <meta charset='utf-8'>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
        <?php
	include 'header.php';
	require_once 'lib/lib_sql_func.php';
        ?>
	<div class="body_center">
	<h1>Modification du profil</h1>

	<table>
	<?php
		if(!isset($_COOKIE['pass'])){
			printf("Entrez votre mot de passe pour modifier vos données<br>");
			echo"<form method='POST' action='modification.php'>";
			printf("<input type='password' name='pass'>");
			printf("<input type='submit' value='Valider'>");
			echo"</form>";
		}elseif(!lib_sql_password_verify($_COOKIE['pass'],$pseudo)){
			printf("Mot de passe incorrect réessayez<br>");
			echo"<form method='POST' action='modification.php'>";
			printf("<input type='password' name='pass'>");
			printf("<input type='submit' value='Valider'>");
			echo"</form>";
		}else{
			if(isset($_GET['error'])){
				if($_GET['error'] == 1){echo"Mot de passe et vérification de mot de passe différent.";}
				elseif($_GET['error'] == 2){echo"Pseudo existant.";}
				elseif($_GET['error'] == 3){echo"Remplissage des champs incomplet.";}
			}
			$password = $_COOKIE['pass'];
			echo"<form action='miseAJourProfil.php' method='POST'>";
			echo"<table>";
			echo"<tr> <td> Nom : </td> <td> <input type='text' name='lastname' value='$lastname' maxlength='50'></td></tr>";
			echo"<tr> <td> Prénom : </td> <td> <input type='text' name='firstname' maxlength='50' value='$firstname'></td></tr>";
			echo"<tr> <td> Pseudo : </td> <td> <input type='text' name='pseudo' maxlength='50' value='$pseudo'></td></tr>";
			echo"<tr> <td> Mail : </td> <td> <input type='email' name='mail' maxlength='50' value='$mail'></td></tr>";
			echo"<tr> <td> Nouveau mot de passe : </td> <td>
				<input type='password' name='password' maxlength='50' value='$password'></td></tr>";
			echo"<tr> <td> Retapez votre nouveau mot de passe : </td> <td>
				<input type='password' name='password2' maxlength='50' value='$password'></td></tr>";
			echo"</table>";
			echo"<input type='submit' value='Enregistrer'>";
			echo"</form>";
		}
	?>
	</table>
	</div>

	<?php include 'footer.php'; ?>
</body>
</html>
