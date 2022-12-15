<?php
//This is the connection class to database
	class Database
	{
		private $connection;

		function __construct()
		{
			$this->open_connection();
		}

		//open connection
		public function open_connection()
		{
			$this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(mysqli_error($this->connection));
		}

		//close connection
		public function close_connection()
		{
			mysqli_close($this->connection);
		}

		//query database
		public function query_db($sql)
		{
			$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
			return $result;
		}

		//get result set
		public function fetch_array($result)
		{
			return mysqli_fetch_array($result);
		}

		//get number of rows
		public function num_rows($result)
		{
			return mysqli_num_rows($result);
		}

		//prepare values for database entry
		public function prep($value)
		{
			return mysqli_real_escape_string($this->connection, $value);
		}
        
        //function to encrypt the string
        function encode5t($str){
            for($i=0;$i<5;$i++){
                $str = strrev(base64_encode($str));// apply base64 first and then reverse the string
            }
            return $str;
        }

        //function to decrypt the string
        function decode5t($str){
            for($i=0;$i<5;$i++){
                $str = base64_decode(strrev($str));// apply base64 first and then reverse the string
            }
            return $str;
        }
        
        
	//end of class
	}


	$database = new Database;
	$db =& $database;

?>