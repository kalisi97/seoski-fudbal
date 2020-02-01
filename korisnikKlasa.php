<?php

class Korisnik {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function registrujKorisnika() {
		if(!isset($_POST['ime']) || !isset($_POST['prezime']) || !isset($_POST['username']) || !isset($_POST['password'])){
			return false;

		}
		if($_POST['ime']=='' || $_POST['prezime']=='' || $_POST['username']=='' || $_POST['password']==''){
			return false;

		}
		$data = Array (
				"ime" => trim($_POST['ime']),
				"prezime" => trim($_POST['prezime']),
				"username" => trim($_POST['username']),
				"password" => trim($_POST['password']),
				"admin" => false,
				"verifikovano" => false
		);

		$parameters = json_encode($data);

		
			$curl_zahtev = curl_init("http://localhost/seoski-fudbal/flightApi/unesiKorisnika.json");
			curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
			curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
			$curl_odgovor = curl_exec($curl_zahtev);
			$json_objekat=json_decode($curl_odgovor, true);
			curl_close($curl_zahtev);


			if($json_objekat == "OK") {
				$sacuvano = true;
			}
			else {
				$sacuvano = false;
			}


			return $sacuvano;
	}

	public function uloguj() {
		if(!isset($_POST['username']) || !isset($_POST['password'])){
			return false;

		}
		if( $_POST['username']=='' || $_POST['password']==''){
			return false;

		}
		$data = array(trim($_POST['username']),trim($_POST['password']));
		$sql = "select * from user where username=? and password = ? limit 1";


		$user = $this->db->rawQuery($sql,$data);

		if(count($user)>0){

			$_SESSION['user'] = $user[0];
			return true;
		}


			return false;
	}




}

?>
