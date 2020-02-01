<?php
include('init.php');
$id = $_GET['id'];
$db-> where("mecID",$id);
$obrisaniMec = $db -> getOne('mec');
var_dump($obrisaniMec);

if($obrisaniMec['golovaDomacin'] > $obrisaniMec['golovaGost']){
  $db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica -1,pobeda = pobeda - 1,golovaDatih = golovaDatih-".$obrisaniMec['golovaDomacin'].",golovaPrimljenih = golovaPrimljenih - ".$obrisaniMec['golovaGost'].", brojPoena = brojPoena -3 where timID=".$obrisaniMec['domacinID']);
  $db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica -1,poraza = poraza - 1,golovaDatih = golovaDatih-".$obrisaniMec['golovaGost'].",golovaPrimljenih = golovaPrimljenih - ".$obrisaniMec['golovaDomacin']." where timID=".$obrisaniMec['gostID']);

}else{
  if($obrisaniMec['golovaDomacin'] == $obrisaniMec['golovaGost']){
    $db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica -1,nereseno = nereseno - 1,golovaDatih = golovaDatih-".$obrisaniMec['golovaDomacin'].",golovaPrimljenih = golovaPrimljenih - ".$obrisaniMec['golovaGost'].", brojPoena = brojPoena -1 where timID=".$obrisaniMec['domacinID']);
    $db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica -1,nereseno = nereseno - 1,golovaDatih = golovaDatih-".$obrisaniMec['golovaGost'].",golovaPrimljenih = golovaPrimljenih - ".$obrisaniMec['golovaDomacin']." , brojPoena = brojPoena -1 where timID=".$obrisaniMec['gostID']);

  }else{

    $db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica -1,poraza = poraza - 1,golovaDatih = golovaDatih -".$obrisaniMec['golovaDomacin'].",golovaPrimljenih = golovaPrimljenih - ".$obrisaniMec['golovaGost']." where timID=".$obrisaniMec['domacinID']);
    $db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica -1,pobeda = pobeda - 1,golovaDatih = golovaDatih -".$obrisaniMec['golovaGost'].",golovaPrimljenih = golovaPrimljenih - ".$obrisaniMec['golovaDomacin'].", brojPoena = brojPoena -3 where timID=".$obrisaniMec['gostID']);

  }
}
$db-> where("mecID",$id);
$db -> delete('mec');
header("Location: tabelaTimovi.php");
 ?>
