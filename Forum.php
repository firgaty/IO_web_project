<?php
	include 'session.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Forum </title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php include 'header.php' ?>
    <h1>Forum</h1>
    <?php
      if (isset($_POST['debut'])) {
        $debut = $_POST['debut'];
      } else {
        $debut = 0;
      }
      if (isset($_POST['nombre_posts'])) {
        $nombre_posts = $_POST['nombre_posts'];
      } else {
        $nombre_posts = 30;
      }

      for($i = $debut; $i < $nombre_posts; $i ++) {
        echo "<div class=\"topic ".(($i % 2 == 0) ? "pair" : "impair")."\">
          <div class=\"topic_left\">
            <p>IMAGE</p>
          </div>
          <div class=\"topic_right\">
            <table class=\"topic_table\">
              <tr>
                <th class=\"text_left\">TITRE</th>
                <th class=\"topic_date\">DATE</th>
              </tr>
              <tr>
                <th colspan=\"2\" class=\"post\">DERNIER POST : Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</th>
              </tr>
            </table>
          </div>
          <div class=\"after\"/>
          </div>
        </div>";
      }
    ?>

	<?php include 'footer.php'; ?>
  </body>
</html>
