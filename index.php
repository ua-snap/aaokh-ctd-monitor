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

      $dataDirectory = 'data';
      $dataQuantity = 3;

      $ignored = array('.', '..');

      function getRecentFiles($directory, $quantity) {
        $fileTimes = array();
        foreach (scandir($directory) as $file) {
          if (!in_array($file, $ignored)) {
            $fullPath = $directory . '/' . $file;
            $fileTimes[$fullPath] = filemtime($fullPath);
          }
        }

        asort($fileTimes);
        $sortedFiles = array_keys($fileTimes);
        return array_slice($sortedFiles, 0, $quantity);
      }

      $recentPlots = getRecentFiles($plotDirectory, $plotQuantity);
      foreach ($recentPlots as $plotFile) {
        print '<h3>' . date('F d Y', filemtime($plotFile)) . '</h3>';
        print '<a href="' . $plotFile . '"><img src="' . $plotFile . '" class="plot"></a>';
      }

      print '<ul>';
      $recentData = getRecentFiles($dataDirectory, $dataQuantity);
      foreach ($recentData as $dataFile) {
        print '<li><a href="' . $dataFile . '">' . date('F d Y', filemtime($dataFile)) . '</a></li>';
      }
      print '</ul>';
    ?>
    </div>
  </body>
</html>
