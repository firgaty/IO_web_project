<?php
/**
* @file connexionDB.php
* fichier qui définit la variable $connexion et test la connexion effective à la BD.
*/

  $DB_USER = "felix"; // Changer à "pierre" ou "Pierre" pour avoir ta BD.

  $connexion;

  if($DB_USER == "felix" || $DB_USER == "Felix" || $DB_USER == "Félix" || $DB_USER == "félix"){
    $connexion = mysqli_connect ( "127.0.0.1", "root", '', 'IO2_web_project') ;
  }
  elseif ($DB_USER == "pierre" || $DB_USER == "Pierre") {
    $connexion = mysqli_connect ( "pams.script.univ-paris-diderot.fr", "pmejan65", 'd0M%bw5Z', 'pmejan65') ;
  }


  if (!$connexion) {
    echo "Pas de connexion au serveur " ; exit ;
  }

?>
