<?php

require "init.php";
header("Content-type: application/json");

$array['cols'][] = array('label' => 'Tim','type' => 'string');
$array['cols'][] = array('label' => 'Procenat pobeda', 'type' => 'number');

$sql="SELECT tm.nazivTima,t.pobeda as procenat FROM  tabela t join tim tm on t.timID=tm.timID";
$podaci = $db->rawQuery($sql);
foreach($podaci as $pod):

 $array['rows'][] = array('c' => array( array('v'=>$pod["nazivTima"]),array('v'=>(double)$pod["procenat"])) );

endforeach;


$niz_json = json_encode ($array);
print ($niz_json);

?>
