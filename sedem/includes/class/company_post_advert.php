<?php

class Company_Post_Adverts{
    
    var $id;
    var $company_id;
    var $job_title;
    var $job_details;
    var $deadline;
    
    function __construct(){

		}

		public static function find_by_id($id){
			global $database;
			$result = $database->query_db("SELECT * FROM company_post_adverts WHERE id = '".$id."' ");
			return $result;
		}
    
    public static function find_by_company_id($company_id, $id){
			global $database;
			$result = $database->query_db("SELECT * FROM company_post_adverts WHERE company_id = '".$company_id."' AND id='".$id."' ");
			return $result;
		}
    public static function find_by_company_id_session($company_id){
			global $database;
			$result = $database->query_db("SELECT * FROM company_post_adverts WHERE company_id = '".$company_id."' ");
			return $result;
		}
    
        public static function fetch_all(){
			global $database;
			$result = $database->query_db("SELECT * FROM company_post_adverts ");
			return $result;
		}
        
        public static function find_all(){
			global $database;
			$result = $database->query_db("SELECT * FROM company_post_adverts WHERE deadline >= CURDATE() ORDER BY id DESC");
			return $result;
		}
        
        public static function find_all_limit(){
			global $database;
			$result = $database->query_db("SELECT * FROM company_post_adverts WHERE deadline >= CURDATE() ORDER BY id DESC LIMIT 5");
			return $result;
		}
        
        function create_company_post_advert(){
            global $database;
            $result = $database->query_db("INSERT INTO company_post_adverts(company_id,job_title,job_details,deadline) VALUES('".$this->company_id."','".$this->job_title."','".$this->job_details."','".$this->deadline."')");
            return $result;
        }
    
        function update_company_post_advert($id){
            global $database;
            $result = $database->query_db("UPDATE company_post_adverts SET company_id='".$this->company_id."',job_title='".$this->job_title."',job_details='".$this->job_details."',deadline='".$this->deadline."' WHERE id='".$id."'");
            return $result;
        }
    
        function delete_company_post_advert($id){
            global $database;
            $result = $database->query_db("DELETE FROM company_post_adverts WHERE id='".$id."'");
            return $result;
        }
    
}

?>