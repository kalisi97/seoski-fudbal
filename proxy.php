
<?php

  $url = 'http://api.football-data.org/v1/soccerseasons';

  echo json_encode(file_get_contents($url));

 ?>
