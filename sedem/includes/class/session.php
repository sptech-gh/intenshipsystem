<?php
	class Session{

		function __construct()
		{
			
		}

		public static function logout(){
			$result = session_destroy();
			return $result;
		}

		public static function is_authenticated(){
			if(isset($_SESSION['username'])){
				return true;
			}
			return false;
		}

	}

?>