<?
	class DBConfig Extends Database{
		function __construct(){}
		
		// WEB PORTAL DB
		public function setClothesDB(){
			$this->DBHost = 'RPC\MEILENE2X';
			$this->DBUser = 'sa';
			$this->DBPass = 'efastsa';
			$this->DBName = 'clothes';
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
			switch($this->sqltype){
				case 'mysql':
					mysql_close();
					break;
				case 'mssql':
					mssql_close();
					break;
				default:
					break;
			}
			$this->cn = null;
		}
	}
?>