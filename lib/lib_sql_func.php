<?php
/**
* Lib qui regroupe toutes les fonctions qui seront utiles lors
* des interactions avec la BD
*/

/**
* Insere les STRING dans la table BD donnée à partir du $_POST.
*
* @param $tab_post : tableau de toutes les champs que l'on veut inserer.
* @param $link : ce qu'a retourné le mysqli_connect();
* @param $table : STRING la table SQL dans laquelle on insere les valeurs.
*/
function lib_sql_insert_from_post($tab_post, $link, $table)
{
    echo "<p>insert_post, $table</p>";
    $champs = "";
    $sql_values = "";

    foreach ($tab_post as $i => $value) {
      echo "$i \n";
        if (isset($_POST[$value])) {
            $champs = $champs.mysqli_real_escape_string($link, $value).", ";
            echo "$_POST[$value]";
            $_POST[$value] = mysqli_real_escape_string($link, $_POST[$value]);
            echo "$_POST[$value]";
            if (is_string($_POST[$value])) {
                $sql_values = $sql_values."'".$_POST["$value"]."'".", ";
            } elseif (is_numeric($_POST[$value])) {
                $sql_values = $sql_values.$_POST["$value"].", ";
            }
        } else {echo "<p>not set</p>";}
    }
    if (strlen($champs) == 0 || strlen($sql_values) == 0) {
        echo strlen($champs);
        return;
    }

    $champs = "(".substr($champs, 0, -2).")";
    $sql_values = "(".substr($sql_values, 0, -2).")";

    echo 'Champs: '.$champs."\n";
    echo 'sql_values: '.$sql_values."\n";

    $query = "INSERT INTO ".$table." ".$champs." VALUES ".$sql_values.";";
    mysqli_query($link, $query);
    echo "<p>$query<p>";

}

function lib_sql_insert($fields, $values, $link, $table, $id) {
  echo "<p>insert</p>";
  $sql_fields = "";

  foreach ($fields as $i => $field) {
    if(isset($field)) {
      $sql_fields = $sql_fields.mysqli_real_escape_string($link, $field).", ";
      if (is_string($values[$i])) {
          $sql_values = $sql_values."'".mysqli_real_escape_string($link, $values[$i])."'".", ";
      } elseif (is_numeric($values[$i])) {
          $sql_values = $sql_values.mysqli_real_escape_string($link, $values[$i]).", ";
      }
    }
  }

  if (strlen($sql_fields) == 0 || strlen($sql_values) == 0) {
      return;
  }

  $sql_fields = "(".substr($sql_fields, 0, -2).")";
  $sql_values = "(".substr($sql_values, 0, -2).")";

  $query = "INSERT INTO ".$table." ".$sql_fields." VALUES ".$sql_values.";";
  mysqli_query($link, $query);
  echo "<p>$query<p>";

}

function lib_sql_update($fields, $values, $link, $table, $id) {
  echo "<p>update<p>";
  $sql_fields = "";

  foreach ($fields as $i => $field) {
    if(isset($field)) {
      // if(ctype_digit($values[$i])) {
      //     $sql_fields = $sql_fields."'".$field."'=".$values[$i].", ";
      // } else
      if (is_string($values[$i])) {
          $sql_fields = $sql_fields."`".$field."`='".$values[$i]."'".", ";
      } elseif (is_numeric($values[$i])) {
          $sql_fields = $sql_fields."`".$field."`=".$values[$i].", ";
      }
    }
  }

  // if (strlen($sql_fields) == 0) {
  //     return;
  // }

  $sql_fields = substr($sql_fields, 0, -2);

  $query = "UPDATE `".$table."` SET ".$sql_fields." WHERE `$table`.`id` = $id;";
  mysqli_query($link, $query);
  echo "<p>$query<p>";
}

//fonction qui renvoie toutes les données d'un utilisateur
//ou false si l'utilisateur n'existe pas
//si $user est une chaine de caractere, cherche le pseudo
//si $user est un nombre, cherche l'id

function findUser($user)
{
    require "test/connexionBD.php";
    if (is_numeric($user)) {
        $query = "SELECT * FROM users WHERE id=$user;";
    } else {
        $user = mysqli_real_escape_string($connexion, $user);
        $query = "SELECT * FROM users WHERE pseudo='$user';";
    }
    $reponse = mysqli_query($connexion, $query) or die(mysqli_error($connexion));
    $tab = mysqli_fetch_assoc($reponse);
    mysqli_close($connexion);
    return $tab;
}


//fonction qui vérifie que le mot de passe soit correct
function lib_sql_password_verify($pass, $user)
{
    $user = findUser($user);
    if ($user != false) {
        return sha1($pass) == $user['password'];
    } else {
        return false;
    }
}

function updateUser($id, $values)
{
    require "test/connexionBD.php";
    $query = "UPDATE users SET ";
    foreach ($values as $k => $v) {
        $query = $query.$k."='".mysqli_real_escape_string($connexion, $v)."' ,";
    }
    $query = substr($query, 0, -1);
    $query = $query." WHERE id = $id;";
    echo $query;
    mysqli_query($connexion, $query);
    mysqli_close($connexion);
}

function get_thread_id($thread_name, $link) {
  $query = "SELECT id FROM threads WHERE title = '".$thread_name."';";
  $out = mysqli_fetch_array(mysqli_query($link, $query), MYSQLI_NUM);
  return $out[0];
}

function get_user_id($user_pseudo, $link) {
  $query = "SELECT id FROM users WHERE pseudo = '".$thread_name."';";
  $out = mysqli_fetch_array(mysqli_query($link, $query), MYSQLI_NUM);
  return $out[0];
}

function get_last_id($table, $link) {
  $query = "SELECT id FROM $table WHERE id = ( SELECT MAX(id) FROM $table )";
  $out = mysqli_fetch_array(mysqli_query($link, $query), MYSQLI_NUM);
  print_r($out);
  echo "<p>$out[0]<p>";
  return $out[0];
}

function update_date($row_id, $field, $link, $table) {
  $query = "UPDATE `$table` SET `$field`='".date("Y-m-d H:i:s")."' WHERE `$table`.`id` = $row_id;";
  mysqli_query($link, $query);
  echo "<p>$query</p>";
}
