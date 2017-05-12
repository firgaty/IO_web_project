<div id="new_post" class="message">
  <h4>Nouveau post :</h4>
  <?php
    require 'lib/lib_php_func.php'  ;

    $url = get_current_url();
    echo "<form class='' action='$url' method='post'>";
  ?>
    <textarea name="post_content" rows="8" cols="80" class="center"></textarea>
    <input type="submit" name="confirmation" value="POST IT !" class="btn submit">
  </form>
</div>
