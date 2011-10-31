<?php
class RequestingModel extends CI_Model {

    var $data;

    function __construct()
    {
        parent::__construct();
    }
	
	function queryData(&$data,$collageNum,$subjectNum,$page)
	 {
		if(!$collageNum){
			$sql = "SELECT * FROM bk_requesting WHERE `book_status` = 1 ORDER BY requesting_start LIMIT ?,?";
			$query = $this->db->query($sql,array($page+0, $page+10));
		}else{
			if(!$subjectNum) {
			$sql = "SELECT * FROM bk_requesting WHERE `book_collage` = ? AND `book_status` = 1 ORDER BY requesting_start LIMIT ?,?";
			$query = $this->db->query($sql,array($collageNum,$page+0, $page+10));
			}else{
			$sql = "SELECT * FROM bk_requesting WHERE `book_collage` = ? AND `book_subject` = ? AND `book_status` = 1 ORDER BY requesting_start LIMIT ?,?";
			$query = $this->db->query($sql,array($collageNum, $subjectNum, $page+0, $page+10));
			}
		}
		$i = 0;
		$data['requesting'][0] = 0;
		$data['pages'] = $query->num_rows();
		foreach ($query->result_array() as $row)
		{
		   $data['requesting'][$i] = $row;
		   $data['requesting'][$i]['book_owner'] = $this->queryOwner($data['requesting'][$i]['book_ownerid']);
		   $data['requesting'][$i]['book_collage'] = $this->queryCollage($data['requesting'][$i]['book_collage']);
		   $data['requesting'][$i]['book_subject'] = $this->querySubject($data['requesting'][$i]['book_subject']);
		   $i++;
		}
	 }
	 	 
	 function queryOwner($id)
	 {
		$sql = "SELECT * FROM `bk_users` WHERE `user_id` = ? LIMIT 1";
		$query = $this->db->query($sql,array($id));
		return $query->row()->user_name;
	 }
	 
	 function queryCollage($id)
	 {
		$sql = "SELECT * FROM `bk_collages` WHERE `collage_id` = ? LIMIT 1";
		$query = $this->db->query($sql,array($id));
		return $query->row()->collage_name;
	 }
	 
	 function querySubject($id)
	 {
		if($id){
			$sql = "SELECT * FROM `bk_subjects` WHERE `subject_id` = ? LIMIT 1";
			$query = $this->db->query($sql,array($id));
			return $query->row()->subject_name;
		}else{
		}
	 }
	 
	 function queryRequesting(&$data,$id)
	 {
		if($id){
			$sql = "SELECT * FROM `bk_requesting` WHERE `requesting_id` = ? LIMIT 1";
			$query = $this->db->query($sql,array($id));
			if(!$query -> num_rows())return false;
			$data['item'] = $query->row_array();
		    $data['item']['book_collage'] = $this->queryCollage($data['item']['book_collage'] );
		    $data['item']['book_subject'] = $this->querySubject($data['item']['book_subject']);
			$data['item']['book_owner'] = $this->queryOwner($data['item']['book_ownerid']);
			return true;
		}else{
		}
	 }
	 
	 function otherCollage($id)
	 {
		if($id){
			$sql = "SELECT * FROM `bk_collages` WHERE `collage_id` != ?";
			$query = $this->db->query($sql,array($id));
			return $query->result_array();
		}else{
			$sql = "SELECT * FROM `bk_collages` ORDER BY `collage_id`";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	 }
	 
	 function otherSubject($id, $collageid=2)
	 {
		if($id){
			$sql = "SELECT * FROM `bk_subjects` WHERE `subject_id` = ? LIMIT 1";
			$query = $this->db->query($sql,array($id));
			$collage = $query->row()->collage_id;
			$sql = "SELECT * FROM `bk_subjects` WHERE `collage_id` = ? AND `subject_id` != ?";
			$query = $this->db->query($sql,array($collage,$id));
			return $query->result_array();
		}else{
			if($collageid){
				$sql = "SELECT * FROM `bk_subjects` WHERE `collage_id` = ? ORDER BY `subject_id`";
				$query = $this->db->query($sql,array($collageid));
				return $query->result_array();
			}
		}
	 }
	 
	 function sameSubjectBook($id)
	 {
		if($id){
			$sql = "SELECT * FROM `bk_requesting` WHERE `requesting_id` = ? LIMIT 1";
			$query = $this->db->query($sql,array($id));
			$subject = $query->row()->book_subject;
			$sql = "SELECT * FROM `bk_requesting` WHERE `book_subject` = ? AND `requesting_id` != ?";
			$query = $this->db->query($sql,array($subject,$id));
			return $query->result_array();
		}else{
			//
		}
	 }
	 
	 function sameCollageBook($id)
	 {
		if($id){
			$sql = "SELECT * FROM `bk_requesting` WHERE `requesting_id` = ? LIMIT 1";
			$query = $this->db->query($sql,array($id));
			$collage = $query->row()->book_collage;
			$sql = "SELECT * FROM `bk_requesting` WHERE `book_collage` = ? AND `requesting_id` != ?";
			$query = $this->db->query($sql,array($collage,$id));
			return $query->result_array();
		}else{
			//
		}
	 }
	 
	 function whatsMyBook($id)
	 {
		if($id){
			$sql = "SELECT * FROM `bk_requesting` WHERE `book_ownerid` = ?";
			$query = $this->db->query($sql,array($id));
			return $query->result_array();
		}else{
			//
		}
	 }
	 
	 function closeBook($id)
	 {
		if($id){
			$sql = "UPDATE `bk_requesting` SET `book_status` = ? WHERE `requesting_id` = ?";
			$query = $this->db->query($sql,array(0,$id));
			return $query;
		}else{
			//
		}
	 }
	 
	 function whosBook($id)
	 {
		$sql = "SELECT * FROM `bk_requesting` WHERE `requesting_id` = ? LIMIT 1";
		$query = $this->db->query($sql,array($id));
		return $query->row()->book_ownerid;
	 }
}
?>