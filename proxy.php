
<?php

  $url = 'http://api.football-data.org/v2/competitions';

  echo json_encode(file_get_contents($url));

 ?>
