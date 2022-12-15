<?php

class Company{
    
    var $com_id;
    var $company_name;
    var $region;
    var $work_phone;
    var $email;
    var $website;
    var $about;
    var $reg_ref_number;
    var $pin;
    var $image;
    
    function __construct(){

		}

		public static function find_by_id($com_id){
			global $database;
			$result = $database->query_db("SELECT * FROM company WHERE com_id = '".$com_id."' ");
			return $result;
		}
    
        public static function find_by_join($id){
			global $database;
			$result = $database->query_db("SELECT * FROM company NATURAL JOIN company_post_adverts ");
			return $result;
		}
        
        public static function chk($email,$work_phone){
			global $database;
			$result = $database->query_db("SELECT * FROM company WHERE email='".$email."' && work_phone='".$work_phone."' ");
			return $result;
		}
        
        public static function find_all(){
			global $database;
			$result = $database->query_db("SELECT * FROM company ");
			return $result;
		}
        
        function create_company(){
            global $database;
            $result = $database->query_db("INSERT INTO company(com_id,company_name,region,work_phone,email,website,about,reg_ref_number,pin,status,image) VALUES('".$this->com_id."','".$this->company_name."','".$this->region."','".$this->work_phone."','".$this->email."','".$this->website."','".$this->about."','".$this->reg_ref_number."','".$this->pin."','".COMPANY."','$this->image')");
            return $result;
        }
    
        function update_company($id){
            global $database;
            $result = $database->query_db("UPDATE company SET company_name='".$this->company_name."',region='".$this->region."',work_phone='".$this->work_phone."',email='".$this->email."',website='".$this->website."',about='".$this->about."',reg_ref_number='".$this->reg_ref_number."' WHERE id='".$id."'");
            return $result;
        }
    
    function approve_company($com_id){
            global $database;
            $result = $database->query_db("UPDATE company SET app_status='".APPROVE."' WHERE com_id='".$com_id."'");
            return $result;
        }
    function reject_company($com_id){
            global $database;
            $result = $database->query_db("UPDATE company SET app_status='".REJECT."' WHERE com_id='".$com_id."'");
            return $result;
        }
    
    function fetch_com_app(){
            global $database;
            $result = $database->query_db("SELECT * FROM company WHERE app_status!='".APPROVE."' ");
            return $result;
        }
    
    
    
    public static function find_rej(){
			global $database;
			$result = $database->query_db("SELECT * FROM company WHERE app_status ='".REJECT."' ");
			return $result;
		}
    
        function delete_company($id){
            global $database;
            $result = $database->query_db("DELETE FROM company WHERE com_id='".$id."'");
            return $result;
        }
    
}

?>