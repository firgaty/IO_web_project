<?php
       include 'session.php';
?>
<!DOCTYPE>
<html>
<head>
        <title> Accueil</title>
        <meta charset='utf-8'>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
        <?php
	include 'header.php';
        ?>
	<h1>Accueil</h1>
  <?php
require "test/connexionBD.php";
/* Vérification de la connexion */
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

/* Retourne le nom de la base de données courante */
if ($result = mysqli_query($connexion, "SELECT DATABASE()")) {
    $row = mysqli_fetch_row($result);
    printf("La base de données courante est %s.\n", $row[0]);
    mysqli_free_result($result);
}

mysqli_close($connexion);
?>
	<?php include 'footer.php'; ?>
</body>
</html>
