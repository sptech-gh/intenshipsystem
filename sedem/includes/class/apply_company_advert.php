<?php

class Apply_Company_Advert{
    
    //var $id;
    var $company_id;
    var $student_id;
    var $student_email;
    var $student_telephone;
    var $company_post_adverts_id;
    var $image;
    var $docx;
    var $pdf;
    var $ac_status;
    
    function __construct(){

		}

		public static function find_by_id($id){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_company_advert WHERE id = '".$id."' ");
			return $result;
		}
    
    public static function find_by_company_id($company_id){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_company_advert WHERE company_id = '".$company_id."' ");
			return $result;
		}
    public static function find_by_id_student($student_id,$id){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_company_advert WHERE id = '".$id."' AND student_id='".$student_id."' ");
			return $result;
		}
    
    public static function find_approve(){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_company_advert WHERE ac_status = '".APPROVE."' ");
			return $result;
		}
    
    public static function find_reject(){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_company_advert WHERE ac_status = '".REJECT."' ");
			return $result;
		}
    
    public static function find_pending(){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_company_advert WHERE ac_status = '' ");
			return $result;
		}
    
    public static function find_approve_session(){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_company_advert WHERE ac_status = '".APPROVE."' AND company_id='".$_SESSION['username']."' ");
			return $result;
		}
    
    public static function find_reject_session(){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_company_advert WHERE ac_status = '".REJECT."' AND company_id='".$_SESSION['username']."' ");
			return $result;
		}
    
    public static function find_pending_session(){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_company_advert WHERE ac_status = '' AND company_id='".$_SESSION['username']."' ");
			return $result;
		}
    
        public static function find_all(){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_company_advert ");
			return $result;
		}
    
        public static function find_by_join($id){
			global $database;
			$result = $database->query_db("SELECT * FROM apply_company_advert JOIN student ON apply_company_advert.student_id = student.student_id WHERE apply_company_advert.company_id='".$_SESSION['username']."'");
			return $result;
		}
        
        function create_apply_advert(){
            global $database;
            $result = $database->query_db("INSERT INTO apply_company_advert(company_id,student_id,student_email,student_telephone,company_post_adverts_id,c_image,c_docx,c_pdf) VALUES('".$this->company_id."','".$this->student_id."','".$this->student_email."','".$this->student_telephone."','".$this->company_post_adverts_id."','".$this->image."','".$this->docx."','".$this->pdf."')");
            return $result;
        }
    
        function update_apply_advert($id){
            global $database;
            $result = $database->query_db("UPDATE apply_company_advert SET company_id='".$this->company_id."',student_id='".$this->student_id."',student_email='".$this->student_email."',student_telephone='".$this->student_telephone."',company_post_adverts_id='".$this->company_post_adverts_id."',internship_letter='".$this->internship_letter."',ac_status='".$this->ac_status."'WHERE id='".$id."'");
            return $result;
        }
    
        function approve_apply_advert($id){
            global $database;
            $result = $database->query_db("UPDATE apply_company_advert SET ac_status='".$this->ac_status."'WHERE id='".$id."'");
            return $result;
        }
    
        function reject_apply_advert($id){
            global $database;
            $result = $database->query_db("UPDATE apply_company_advert SET ac_status='".$this->ac_status."'WHERE id='".$id."'");
            return $result;
        }
    
        function delete_apply_advert($id){
            global $database;
            $result = $database->query_db("DELETE FROM apply_company_advert WHERE id='".$id."'");
            return $result;
        }
    
}

?>