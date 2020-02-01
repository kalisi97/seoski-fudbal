<?php

class Mec {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function unesiMec() {
		if(!isset($_POST['domacin']) || !isset($_POST['gost']) || !isset($_POST['golDom']) || !isset($_POST['golGost'])){
			return false;

		}
		if($_POST['domacin']=='' || $_POST['gost']=='' || $_POST['golDom']=='' || $_POST['golGost']==''){
			return false;

		}
		$data = Array (
				"domacinID" => trim($_POST['domacin']),
				"gostID" => trim($_POST['gost']),
				"golovaDomacin" => trim($_POST['golDom']),
				"golovaGost" => trim($_POST['golGost'])
		);

		$parameters = json_encode($data);
			$curl_zahtev = curl_init("http://localhost/betonliga/projekat/flightApi/noviMec.json");
			curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
			curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
			$curl_odgovor = curl_exec($curl_zahtev);
			$json_objekat=json_decode($curl_odgovor, true);
			curl_close($curl_zahtev);


			if($json_objekat == "Uspesno ste uneli mec!") {
				$sacuvano = true;
			}
			else {
				$sacuvano = false;
			}


			if($sacuvano) {
				if($_POST['golDom'] > $_POST['golGost']){
					$this->db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica +1,pobeda = pobeda + 1,golovaDatih = golovaDatih+".$_POST['golDom'].",golovaPrimljenih = golovaPrimljenih + ".$_POST['golGost'].", brojPoena = brojPoena +3 where timID=".$_POST['domacin']);
					$this->db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica +1,poraza = poraza + 1,golovaDatih = golovaDatih+".$_POST['golGost'].",golovaPrimljenih = golovaPrimljenih + ".$_POST['golDom']." where timID=".$_POST['gost']);

				}else{
					if($_POST['golDom'] == $_POST['golGost']){
						$this->db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica +1,nereseno = nereseno + 1,golovaDatih = golovaDatih+".$_POST['golDom'].",golovaPrimljenih = golovaPrimljenih + ".$_POST['golGost'].", brojPoena = brojPoena +1 where timID=".$_POST['domacin']);
						$this->db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica +1,nereseno = nereseno + 1,golovaDatih = golovaDatih+".$_POST['golGost'].",golovaPrimljenih = golovaPrimljenih + ".$_POST['golDom']." , brojPoena = brojPoena +1 where timID=".$_POST['gost']);

					}else{

						$this->db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica +1,poraza = poraza + 1,golovaDatih = golovaDatih +".$_POST['golDom'].",golovaPrimljenih = golovaPrimljenih + ".$_POST['golGost']." where timID=".$_POST['domacin']);
						$this->db->rawQuery("update tabela set ukupnoUtakmica=ukupnoUtakmica +1,pobeda = pobeda + 1,golovaDatih = golovaDatih +".$_POST['golGost'].",golovaPrimljenih = golovaPrimljenih + ".$_POST['golDom'].", brojPoena = brojPoena +3 where timID=".$_POST['gost']);

					}
				}

			return true;

			}
			else {
				return false;
			}
	}

	public function izmeniNaziv() {
		if(!isset($_POST['tim']) || !isset($_POST['naziv'])){
			return false;

		}
		if($_POST['tim']=='' || $_POST['naziv']=='' ){
			return false;

		}

		$data = Array (
				trim($_POST['naziv']),
				 trim($_POST['tim'])

		);
		$sacuvano = $this->db->rawQuery("Update tim set nazivTima =? where timID=?",$data);

			return true;

	}


}

?>
