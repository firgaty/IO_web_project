<?php
/**
* Lib qui regroupe toutes les fonctions qui seront utiles lors
* des interactions avec la BD
*/

/**
*
* @param $tab_post : tableau de toutes les champs que l'on veut inserer.
* @param $link : ce qu'a retourné le mysqli_connect();
* @param $table : STRING la table SQL dans laquelle on insere les valeurs.
*/
function lib_sql_insert_from_post($tab_post, $link, $table) {
  $champs = "";
  $sql_values = "";

  foreach($tab_post as $i => $value){
    if(isset($_POST[$value])) {
      $champs = $champs.$value.", ";
      $sql_values = $sql_values."'".$_POST["$value"]."'".", ";
    }
  }

  $champs = "(".substr($champs, 0 , -2).")";
  $sql_values = "(".substr($sql_values, 0, -2).")";

  echo 'Champs: '.$champs."\n";
  echo 'sql_values: '.$sql_values."\n";

  $req = "INSERT INTO ".$table." ".$champs." VALUES ".$sql_values.";";
  echo $req;
  mysqli_query($link, $req);
}

?>
