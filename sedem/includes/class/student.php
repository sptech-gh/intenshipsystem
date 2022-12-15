<?php

class Student{
    
    var $sid;
    var $student_id;
    var $student_name;
    var $student_department;
    var $student_program;
    var $student_email;
    var $pin;
    var $status;
    
    function __construct(){

		}

		public static function find_by_id($student_id){
			global $database;
			$result = $database->query_db("SELECT * FROM student WHERE student_id = '".$student_id."' ");
			return $result;
		}
    
        public static function find_by_join($id){
			global $database;
			$result = $database->query_db("SELECT * FROM student NATURAL JOIN company_post_adverts ");
			return $result;
		}
        
        public static function find_all(){
			global $database;
			$result = $database->query_db("SELECT * FROM student ");
			return $result;
		}
        
        function create_student(){
            global $database;
            $result = $database->query_db("INSERT INTO student(student_id,student_name,student_department,student_program,student_email,pin,status) VALUES('".$this->student_id."','".$this->student_name."','".$this->student_department."','".$this->student_program."','".$this->student_email."','".$this->pin."','".STUDENT."')");
            return $result;
        }
    
        function update_student($id){
            global $database;
            $result = $database->query_db("UPDATE student SET student_id='".$this->student_id."',student_name='".$this->student_name."',student_department='".$this->student_department."',student_program='".$this->student_program."',student_email='".$this->student_email."',pin='".$this->pin."' WHERE sid='".$sid."'");
            return $result;
        }
    
        function delete_student($id){
            global $database;
            $result = $database->query_db("DELETE FROM student WHERE id='".$id."'");
            return $result;
        }
    
}

?>