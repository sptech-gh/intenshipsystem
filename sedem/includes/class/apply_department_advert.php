<?php

class Apply_Department_Advert{
    
   // var $id;
    var $student_id;
    var $dept_id;
    var $student_email;
    var $student_telephone;
    var $department_post_adverts_id;
    var $image;
    var $docx;
    var $pdf;
    var $ad_status;
    
    function __construct(){

		}

		public static function find_by_id($student_id,$department_post_adverts_id){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_department_advert WHERE student_id = '".$student_id."' AND department_post_adverts_id='".$department_post_adverts_id."' ");
			return $result;
		}
    
    
    public static function find_approve(){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_department_advert WHERE ad_status = '".APPROVE."' ");
			return $result;
		}
    
    public static function find_reject(){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_department_advert WHERE ad_status = '".REJECT."' ");
			return $result;
		}
    
    public static function find_pending(){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_department_advert WHERE ad_status != '".APPROVE."' && ad_status != '".REJECT."' ");
			return $result;
		}
    
        
        public static function find_all(){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_department_advert ");
			return $result;
		}
    
    public static function find_by_join(){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_department_advert INNER JOIN department_post_adverts ON department_post_adverts.id = apply_department_advert.department_post_adverts_id WHERE apply_department_advert.dept_id='".$_SESSION['username']."' ");
			return $result;
		}

        function approve_apply_advert($student_id,$department_post_adverts_id){
            global $database;
            $result = $database->query_db("UPDATE apply_department_advert SET ad_status='".$this->ad_status."' WHERE student_id='".$student_id."' AND department_post_adverts_id='".$department_post_adverts_id."' ");
            return $result;
        }
    
        function reject_apply_advert($student_id,$department_post_adverts_id){
            global $database;
            $result = $database->query_db("UPDATE apply_department_advert SET ad_status='".$this->ad_status."' WHERE student_id='".$student_id."' AND department_post_adverts_id='".$department_post_adverts_id."' ");
            return $result;
        }
    
        function create_apply_department_advert(){
            global $database;
            $result = $database->query_db("INSERT INTO apply_department_advert(student_id,dept_id,student_email,student_telephone,department_post_adverts_id,image,docx,pdf) VALUES('".$this->student_id."','".$this->dept_id."','".$this->student_email."','".$this->student_telephone."','".$this->department_post_adverts_id."','".$this->image."','".$this->docx."','".$this->pdf."')");
            return $result;
        }
    
        function update_apply_department_advert($id){
            global $database;
            $result = $database->query_db("UPDATE apply_department_advert SET student_id='".$this->student_id."',student_email='".$this->student_email."',student_telephone='".$this->student_telephone."',department_post_adverts_id='".$this->department_post_adverts_id."',internship_letter='".$this->internship_letter."',status='".$this->status."' WHERE id='".$id."'");
            return $result;
        }
    
        function delete_apply_department_advert($id){
            global $database;
            $result = $database->query_db("DELETE FROM apply_department_advert WHERE id='".$id."'");
            return $result;
        }
    
}

?>