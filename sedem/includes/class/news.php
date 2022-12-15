<?php

class News{
    
    var $id;
    var $news_title;
    var $news_details;
    var $posted_by;
    var $start_date;
    var $end_date;
    var $image;
    
    function __construct(){

		}

		public static function find_by_id($id){
			global $database;
			$result = $database->query_db("SELECT * FROM news WHERE id = '".$id."' ");
			return $result;
		}
        
        public static function fetch_all(){
			global $database;
			$result = $database->query_db("SELECT * FROM news ORDER BY id DESC");
			return $result;
		}
        public static function find_all(){
			global $database;
			$result = $database->query_db("SELECT * FROM news WHERE end_date >= CURDATE() ORDER BY id DESC");
			return $result;
		}
    
        public static function find_all_limit(){
			global $database;
			$result = $database->query_db("SELECT * FROM news WHERE end_date >= CURDATE() ORDER BY id DESC LIMIT 5");
			return $result;
		}
        
        function create_news(){
            global $database;
            $result = $database->query_db("INSERT INTO news(news_title,news_details,posted_by,start_date,end_date,image) VALUES('".$this->news_title."','".$this->news_details."','".$this->posted_by."','".$this->start_date."','".$this->end_date."','".$this->image."')");
            return $result;
        }
    
        function update_news($id){
            global $database;
            $result = $database->query_db("UPDATE users SET username='".$this->username."',pin='".$this->pin."',access_level='".$this->access_level."' WHERE id='".$id."'");
            return $result;
        }
    
        function delete_news($id){
            global $database;
            $result = $database->query_db("DELETE FROM users WHERE id='".$id."'");
            return $result;
        }
    
}

?>