<?php
  require 'session.php';
  if(isset($_POST['new_thread'])) {
    require_once 'lib/lib_sql_func.php';
    require_once 'test/connexionBD.php';

    $champs = array('title', 'creator_id');
    lib_sql_insert_from_post($champs, $connexion, 'threads');
    $thread_id = get_last_id('threads', $connexion);

    $champs = array('user_id');
    lib_sql_insert_from_post($champs, $connexion, 'posts');
    $post_id = get_last_id('posts', $connexion);
    lib_sql_update(array('thread_id', 'text'), array($thread_id, $_POST['post_content']), $connexion, 'posts', $post_id);

    $champs = array('id_last_post');
    $valeurs = array($post_id);
    lib_sql_update($champs, $valeurs, $connexion, 'threads', $thread_id);

    update_date($thread_id, 'date_init', $connexion, 'threads');
    update_date($post_id, 'date_sent', $connexion, 'posts');

    echo "<p>New thread</p>";
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php
    require_once 'test/connexionBD.php';

    if(isset($_GET['thread'])) {
      echo '<title>'.htmlentities($_GET['thread']).'</title>';
    } elseif(isset($_POST['title'])) {
      echo '<title>'.htmlentities($_POST['title']).'</title>';
    } else {
      echo '<title>ERROR 404</title>';
    }
    ?>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php
			include 'header.php';

		?>
    <div class="main">
      <h1>
        <?php
        if(isset($_GET['thread'])) {
          echo $_GET['thread'];
        } else {
          echo 'Thread non trouvé';
        }
        ?>
      </h1>
      <div class="separator"></div>




      <?php include 'post_edit.php' ?>
    </div>
    <?php include 'footer.php'; ?>
  </body>
</html>
