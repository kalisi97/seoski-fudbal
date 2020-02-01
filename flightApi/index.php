<?php
require 'flight/Flight.php';
require 'jsonindent.php';


Flight::route('/', function(){

	die("");
});

Flight::register('db', 'Database', array('flightNiz'));

Flight::route('GET /timoviPoGradovima.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->timovi();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo json_encode($niz);
});
Flight::route('GET /verifikovaniKorisnici.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiNeVerifikovaneKorisnike();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo json_encode($niz);
});

Flight::route('POST /noviMec.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->noviMec($json_data);
	if($db->getResult())
	{
		$response = "Uspesno ste uneli mec!";
	}
	else
	{
		$response = "Neuspesno ste uneli mec!";

	}

	echo indent(json_encode($response));

});

Flight::route('POST /unesiKorisnika.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);


	$db->unesiKorisnika($json_data);
	if($db->getResult())
	{
		$response = "OK";
	}
	else
	{
		$response = "Desila se greska";

	}

	echo indent(json_encode($response));

});

Flight::start();
?>
