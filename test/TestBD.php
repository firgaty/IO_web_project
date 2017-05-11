<?php
require 'connexionBD.php';
$link = $connexion;
/* Vérification de la connexion */
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

/* Retourne le nom de la base de données courante */
if ($result = mysqli_query($link, "SELECT DATABASE()")) {
    $row = mysqli_fetch_row($result);
    printf("La base de données courante est %s.\n", $row[0]);
    mysqli_free_result($result);
}

//$req = "INSERT INTO users VALUES (3, 'felix', 'desmaretz', 'firgaty2', 'firgaty@gmail.com', 'mdp')";
//mysqli_query($link, $req);

if ($result = mysqli_query($link, "SELECT * FROM users")) {
   $row = mysqli_fetch_assoc($result);
   while($row) {
     print_r($row);
     $row = mysqli_fetch_assoc($result);
   }
   mysqli_free_result($result);
}


/* Change la base de données en "world" */
mysqli_select_db($link, "world");

/* Retourne le nom de la base de données courante */
if ($result = mysqli_query($link, "SELECT DATABASE()")) {
    $row = mysqli_fetch_row($result);
    printf("La base de données courante est %s.\n", $row[0]);
    mysqli_free_result($result);
}

mysqli_close($link);
?>
