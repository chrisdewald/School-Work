<?php include_once $_SERVER['DOCUMENT_ROOT']
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cookie counter</title>
  </head>
  <body>
    <p>
      <?php
      if ($visits > 1)
      {
        echo "This is visit number $visits.";
      }
      else
      {
        // First visit
        echo 'Welcome to my website! Click here!';
      }
      ?>
    </p>
  </body>
</html>