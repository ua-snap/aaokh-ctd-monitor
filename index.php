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
      $plotDirectory = 'plots';
      $plotQuantity = 3;

      $ignored = array('.', '..');

      $fileTimes = array();
      foreach (scandir($plotDirectory) as $file) {
        if (!in_array($file, $ignored)) {
          $fullPath = $plotDirectory . '/' . $file;
          $fileTimes[$fullPath] = filemtime($fullPath);
        }
      }

      asort($fileTimes);
      $sortedFiles = array_keys($fileTimes);
      $topFiles = array_slice($sortedFiles, 0, $plotQuantity);

      foreach ($topFiles as $file) {
        print '<h3>' . date('F d Y', filemtime($file)) . '</h3>';
        print '<a href="' . $file . '"><img src="' . $file . '" class="plot"></a>';
      }
    ?>
    </div>
  </body>
</html>
