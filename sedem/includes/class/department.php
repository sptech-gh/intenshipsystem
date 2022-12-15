<?php

class Department{
    
    var $id;
    var $department_id;
    var $dept_name;
    
    function __construct(){

		}

		public static function find_by_id($com_id){
			global $database;
			$result = $database->query_db("SELECT * FROM department WHERE department_id = '".$department_id."' ");
			return $result;
		}
    
//        public static function find_by_join($id){
//			global $database;
//			$result = $database->query_db("SELECT * FROM company NATURAL JOIN company_post_adverts ");
//			return $result;
//		}
//        
        public static function find_all(){
			global $database;
			$result = $database->query_db("SELECT * FROM department ");
			return $result;
		}
        
        function create_department(){
            global $database;
            $result = $database->query_db("INSERT INTO department(department_id,dept_name) VALUES('".$this->department_id."','".$this->dept_name."')");
            return $result;
        }
    
//        function update_company($id){
//            global $database;
//            $result = $database->query_db("UPDATE company SET company_name='".$this->company_name."',region='".$this->region."',work_phone='".$this->work_phone."',email='".$this->email."',website='".$this->website."',about='".$this->about."',reg_ref_number='".$this->reg_ref_number."' WHERE id='".$id."'");
//            return $result;
//        }
    
        function delete_department($department_id){
            global $database;
            $result = $database->query_db("DELETE FROM department WHERE department_id='".$department_id."'");
            return $result;
        }
    
}

?>