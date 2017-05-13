<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Nouveau thread</title>
</head>

<body>
  <?php
    include 'session.php';
    include 'header.php';
    ?>
    <div class="main">
      <h1>Nouveau thread</h1>
      <div class="separator"></div>
      <form class="" action="thread.php?title=1" method="post">
        <table>
          <tr>
            <td>Nom du thread: </td>
            <td><input type="text" name="title" value="Titre"></td>
          </tr>
          <tr>
            <textarea name="post_content" rows="8" cols="80" class="message"></textarea>
          </tr>
        </table>
        <input type="submit" name="submit_btn" value="POST IT!">
      </form>
    </div>
    <?php include 'footer'; ?>
</body>

</html>
