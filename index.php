<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AAOKH CTD Data</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"></link>
  </head>
  <body>
    <div class="header">
      <div class="container">
        <img src="images/aaokh_header.png" />
      </div>
    </div>
    <div class="container">
    <?php
      $directory = 'plots';
      $ignored = array('.', '..');

      foreach (scandir($directory) as $file) {
        if (!in_array($file, $ignored)) {
          $fullPath = $directory . '/' . $file;
          print '<h3>' . date('F d Y', filemtime($fullPath)) . '</h3>';
          print '<a href="' . $fullPath . '"><img src="' . $fullPath . '" class="plot"></a>'; 
        }
      }
    ?>
    </div>
  </body>
</html>
