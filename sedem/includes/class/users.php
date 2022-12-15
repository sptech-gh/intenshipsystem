<?php

class Users{
    
    var $id;
    var $username;
    var $pin;
    var $access_level;
    
    function __construct(){

		}

		public static function find_by_id($id){
			global $database;
			$result = $database->query_db("SELECT * FROM users WHERE post_id = '".$id."' ");
			return $result;
		}
    
    public static function find_by_level(){
			global $database;
			$result = $database->query_db("SELECT * FROM users WHERE access_level = '".COMPANY."' ");
			return $result;
		}
    
    public static function approved_company(){
			global $database;
			$result = $database->query_db("SELECT * FROM users WHERE app_status = 4 ");
			return $result;
		}
        
        public static function find_all(){
			global $database;
			$result = $database->query_db("SELECT * FROM users ");
			return $result;
		}
    
    public static function find_username($username){
			global $database;
			$result = $database->query_db("SELECT * FROM users WHERE username='".$username."'");
			return $result;
		}
        
        function create_user(){
            global $database;
            $result = $database->query_db("INSERT INTO users(username,pin,access_level) VALUES('".$this->username."','".$this->pin."','".$this->access_level."')");
            return $result;
        }
    
        function update_user($id){
            global $database;
            $result = $database->query_db("UPDATE users SET username='".$this->username."',pin='".$this->pin."',access_level='".$this->access_level."' WHERE id='".$id."'");
            return $result;
        }
    
//    function approve_user($id){
//            global $database;
//            $result = $database->query_db("UPDATE users SET access_level='".COMPANY."', WHERE username='".$username."'");
//            return $result;
//        }
    
    function approve_company($username){
            global $database;
            $result = $database->query_db("UPDATE users SET app_status='".APPROVE."' WHERE username='".$username."' ");
            return $result;
        }
    function reject_company($username){
            global $database;
            $result = $database->query_db("UPDATE users SET app_status='".REJECT."' WHERE username='".$username."' ");
            return $result;
        }
    
        function delete_post_advert($id){
            global $database;
            $result = $database->query_db("DELETE FROM users WHERE id='".$id."'");
            return $result;
        }
    
}

?>