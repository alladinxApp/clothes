<?
	class DBConfig Extends Database{
		function __construct(){}
		
		// CLOTHES DB
		public function setClothesDB(){
			$this->DBHost = '(local)';
			$this->DBUser = 'sa';
			$this->DBPass = 'efastsa';
			$this->DBName = 'CLOTHESDB';
			$this->sqltype = 'mssql';
			
			$db = new Database;
			$db->setCon($this->DBHost,$this->DBUser,$this->DBPass,$this->DBName);
			$db->setSQLType($this->sqltype);
			$db->connect();
			$this->cn = $db->getInstance();
		}
		
		public function getInstance(){
			return $this->cn;
		}
		public function getSQLType(){
			return $this->sqltype;
		}
		public function DBClose(){
			mssql_close();
			$this->cn = null;
		}
	}
?>