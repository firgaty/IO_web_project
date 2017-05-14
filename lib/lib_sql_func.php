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
    $champs = "";
    $sql_values = "";

    foreach ($tab_post as $i => $value) {
        if (isset($_POST[$value])) {
            $champs = $champs.mysqli_real_escape_string($link, $value).", ";
            $_POST[$value] = mysqli_real_escape_string($link, $_POST[$value]);
            if (is_string($_POST[$value])) {
                $sql_values = $sql_values."'".$_POST["$value"]."'".", ";
            } elseif (is_numeric($_POST[$value])) {
                $sql_values = $sql_values.$_POST["$value"].", ";
            }
        }
    }
    if (strlen($champs) == 0 || strlen($sql_values) == 0) {
        return;
    }

    $champs = "(".substr($champs, 0, -2).")";
    $sql_values = "(".substr($sql_values, 0, -2).")";

    echo 'Champs: '.$champs."\n";
    echo 'sql_values: '.$sql_values."\n";

    $req = "INSERT INTO ".$table." ".$champs." VALUES ".$sql_values.";";
    mysqli_query($link, $req);
}

function lib_sql_insert($fields, $values, $link, $table) {

}

//fonction qui renvoie toutes les données d'un utilisateur
//ou false si l'utilisateur n'existe pas
//si $user est une chaine de caractere, cherche le pseudo
//si $user est un nombre, cherche l'id

function findUser($user)
{
    require "test/connexionBD.php";
    if (is_numeric($user)) {
        $req = "SELECT * FROM users WHERE id=$user;";
    } else {
        $user = mysqli_real_escape_string($connexion, $user);
        $req = "SELECT * FROM users WHERE pseudo='$user';";
    }
    $reponse = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
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
    $req = "UPDATE users SET ";
    foreach ($values as $k => $v) {
        $req = $req.$k."='".mysqli_real_escape_string($connexion, $v)."' ,";
    }
    $req = substr($req, 0, -1);
    $req = $req." WHERE id = $id;";
    echo $req;
    mysqli_query($connexion, $req);
    mysqli_close($connexion);
}

function get_thread_id($thread_name) {
  $request = "SELECT id FROM threads WHERE title = '".$thread_name."';";
  $out = mysqli_fetch_array(mysqli_query($request), MYSQL_NUM);
  return $out[0];
}

function get_user_id($user_pseudo) {
  $request = "SELECT id FROM users WHERE pseudo = '".$thread_name."';";
  $out = mysqli_fetch_array(mysqli_query($request), MYSQL_NUM);
  return $out[0];
}

function input_date($row_id, $field, $link, $table) {
  $request = "INSERT INTO $table ($field) WHERE 'id' = $row_id VALUES (".date("Y-m-d H:i:s").");";
  mysqli_query($request);
}
