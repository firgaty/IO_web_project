<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Nouveau thread</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
    include 'session.php';
    include 'header.php';
    ?>
    <div class="main">
      <h1>Nouveau thread</h1>
      <div class="separator"></div>
      <form class="" action="thread.php" method="POST">
        <input type="hidden" name="new_thread" value="true">
        <input type="hidden" name="creator_id" value=<?php echo "$id" ?>>
        <input type="hidden" name="user_id" value=<?php echo "$id" ?>>
        <table>
          <tr>
            <td>Nom du thread: </td>
            <td><input type="text" name="title" value="Titre"></td>
          </tr>
          <tr>
            <td>Premier post:</td>
            <td><textarea name="post_content" rows="8" cols="80" class="message"></textarea></td>
          </tr>
        </table>
        <input type="submit" name="submit_btn" value="POST IT!" class="submit btn">
      </form>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>
