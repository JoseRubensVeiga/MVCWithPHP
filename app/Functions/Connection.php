<?php 

namespace App\Functions;


class Connection{
	private $host;
	private $user;
	private $pass;
	private $db;
	private $conn;

	public function __construct(){
		$this->host     = env('host');
		$this->user     = env('user');
		$this->password = env('password');
		$this->db       = env('database');

		$this->make();

	}

	public function make(){
		try {
		  $this->conn = new \PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
		    $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		    echo 'Erro na conexão: ' . $e->getMessage();
		}
	}

	public function getAll($table){
		$table .= 's';
		$sql = "SELECT * FROM $table";
		$resultado = $this->conn->query($sql);
	    $dados = [];
	    while($row = $resultado->fetch(\PDO::FETCH_ASSOC)) {
	        $dados[] = $row;
	    }
	    return $dados;
	}

}