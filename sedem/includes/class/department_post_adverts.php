<?php

class Department_Post_Adverts{
    
    var $id;
    var $department_id;
    var $job_title;
    var $job_details;
    var $deadline;
    var $company_name;
    var $company_email;
    var $company_address;
    var $company_tel;
    var $company_website;
    
    function __construct(){

		}

		public static function find_by_id($department_id,$id){
			global $database;
			$result = $database->query_db("SELECT * FROM department_post_adverts WHERE department_id = '".$department_id."' ");
			return $result;
		}
    
    public static function find_by_dep_id($id){
			global $database;
			$result = $database->query_db("SELECT * FROM department_post_adverts WHERE id = '".$id."' ");
			return $result;
		}
    
        public static function find_ads_by_id($id){
			global $database;
			$result = $database->query_db("SELECT * FROM department_post_adverts WHERE id = '".$id."' ");
			return $result;
		}
    
    public static function find_ads_by_department_id($department_id,$id){
			global $database;
			$result = $database->query_db("SELECT * FROM department_post_adverts WHERE department_id = '".$department_id."' AND id='".$id."' ");
			return $result;
		}
    
        public static function find_by_join2(){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_department_advert  JOIN department_post_adverts ON   apply_department_advert.department_post_adverts_id= department_post_adverts.id ");
			return $result;
		}
        
        public static function fetch_all(){
			global $database;
			$result = $database->query_db("SELECT * FROM department_post_adverts ORDER BY id DESC");
			return $result;
		}
    
        public static function find_all(){
			global $database;
			$result = $database->query_db("SELECT * FROM department_post_adverts WHERE deadline >= CURDATE() ORDER BY id DESC");
			return $result;
		}
    
        public static function find_all_limit(){
			global $database;
			$result = $database->query_db("SELECT * FROM department_post_adverts WHERE deadline >= CURDATE() ORDER BY id DESC LIMIT 5");
			return $result;
		}
        
        function create_department_post_advert(){
            global $database;
            $result = $database->query_db("INSERT INTO department_post_adverts(department_id,job_title,job_details,deadline,company_name,company_email,company_address,company_tel,company_website) VALUES('".$this->department_id."','".$this->job_title."','".$this->job_details."','".$this->deadline."','".$this->company_name."','".$this->company_email."','".$this->company_address."','".$this->company_tel."','".$this->company_website."')");
            return $result;
        }
    
        function update_department_post_advert($id){
            global $database;
            $result = $database->query_db("UPDATE department_post_adverts SET job_title='".$this->job_title."',job_details='".$this->job_details."',deadline='".$this->deadline."',company_name='".$this->company_name."',company_email='".$this->company_email."',company_address='".$this->company_address."',company_tel='".$this->company_tel."',company_website='".$this->company_website."' WHERE id='".$id."'");
            return $result;
        }
    
        function delete_department_post_advert($id){
            global $database;
            $result = $database->query_db("DELETE FROM department_post_adverts WHERE id='".$id."'");
            return $result;
        }
    
}

?>