<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php
    if(isset($_GET['thread'])) {
      echo '<title>'.$_GET['thread'].'</title>';
    } else {
      echo '<title>post error 404</title>';
    }
    ?>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php
    	include 'session.php';
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
  </body>
</html>
