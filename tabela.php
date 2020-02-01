<?php
include("init.php");
$idGrada = $_GET['id'];

$sql= "select d.nazivTima as domacin ,g.nazivTima as gost,m.golovaDomacin,m.golovaGost,m.mecID,gr.naziv as grad from mec m join tim d on m.domacinID=d.timID join tim g on m.gostID=g.timID join grad gr on d.gradID=gr.id where gr.id=".$idGrada;

$mecevi = $db->rawQuery($sql);

echo(json_encode($mecevi));
 ?>
