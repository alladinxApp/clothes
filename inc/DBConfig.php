<?
	class DBConfig Extends Database{
		function __construct(){}
		
		// CLOTHES DB
		public function setClothesDB(){
			$this->DBHost = 'localhost';
			$this->DBUser = 'root';
			$this->DBPass = '';
			$this->DBName = 'clothes';
			$this->sqltype = 'mysql';
			
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
			mysql_close();
			$this->cn = null;
		}
	}
?>