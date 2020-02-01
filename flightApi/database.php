<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "fuca";
	private $dblink;
	private $result = true;
	private $records;
	private $affectedRows;


	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}

	public function getResult()
	{
		return $this->result;
	}

	function __destruct()
	{
		$this->dblink->close();
	}


	function Connect()
	{
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno)
		{
			printf("Konekcija neuspesna: %s\n",  $mysqli->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8");
	}

	function noviMec($data) {
		$mysqli = new mysqli("localhost", "root", "", "fuca");
		$cols = '(domacinID, gostID, golovaDomacin,golovaGost)';

		$values = "(".$data['domacinID'].",".$data['gostID'].",".$data['golovaDomacin'].",".$data['golovaGost'].")";

		$query = 'INSERT into mec '.$cols. ' VALUES '.$values;

		if($mysqli->query($query))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}


		function unesiKorisnika($data) {
			$mysqli = new mysqli("localhost", "root", "", "fuca");
			$cols = '(ime, prezime, username,password,admin,verifikovano)';

			$ime = mysqli_real_escape_string($mysqli,$data['ime']);
			$prezime = mysqli_real_escape_string($mysqli,$data['prezime']);
			$username = mysqli_real_escape_string($mysqli,$data['username']);
			$password = mysqli_real_escape_string($mysqli,$data['password']);
			$admin=0;
			$verifikovano = 0;


			$values = "('".$ime."','".$prezime."','".$username."','".$password."',".$admin.",".$verifikovano.")";

			$query = 'INSERT into user '.$cols. ' VALUES '.$values;

			if($mysqli->query($query))
			{
				$this ->result = true;
			}
			else
			{
				$this->result = false;
			}
			$mysqli->close();
		}

	function timovi() {
		$mysqli = new mysqli("localhost", "root", "", "fuca");
		$q = 'SELECT g.naziv,count(t.timID) as brojTimova FROM tim t join grad g on t.gradID=g.id group by g.id ';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}


function vratiNeVerifikovaneKorisnike() {
	$mysqli = new mysqli("localhost", "root", "", "fuca");
	$q = 'SELECT * FROM user where verifikovano=false ';
	$this ->result = $mysqli->query($q);
	$mysqli->close();
}

	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected        = $this->dblink->affected_rows;
					return true;
		}
		else{
			return false;
		}
	}
}
?>
