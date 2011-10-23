<?php
class Sellingmodel extends CI_Model {

    var $data;

    function __construct()
    {
        parent::__construct();
    }
	
	function queryData(&$data, $page,$collageNum, $subjectNum)
	 {
		if(!$collageNum || !$subjectNum){
			$sql = "SELECT * FROM bk_selling ORDER BY selling_start LIMIT ?,?";
			$query = $this->db->query($sql,array($page+0, $page+10));
		}else{
			$sql = "SELECT * FROM bk_selling WHERE `book_collage` = ? AND `book_subject` = ? ORDER BY selling_start LIMIT ?,?";
			$query = $this->db->query($sql,array($collageNum, $subjectNum, $page+0, $page+10));
		}
		$i = 0;
		$data['selling'][0] = 0;
		foreach ($query->result_array() as $row)
		{
		   $data['selling'][$i] = $row;
		   $data['selling'][$i]['book_owner'] = $this->queryOwner($data['selling'][$i]['book_ownerid']);
		   $data['selling'][$i]['book_collage'] = $this->queryCollage($data['selling'][$i]['book_collage']);
		   $data['selling'][$i]['book_subject'] = $this->querySubject($data['selling'][$i]['book_subject']);
		   $i++;
		}
	 }
	 
	 function queryNum()
	 {
		$sql = "SELECT COUNT(*) AS count FROM `bk_selling` WHERE `book_status` = 0";
		$query = $this->db->query($sql);
		return $query->row()->count;
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
		$sql = "SELECT * FROM `bk_subjects` WHERE `subject_id` = ? LIMIT 1";
		$query = $this->db->query($sql,array($id));
		return $query->row()->subject_name;
	 }
	 
	 function otherCollage($id)
	 {
		$sql = "SELECT * FROM `bk_collages` WHERE `collage_id` != ?";
		$query = $this->db->query($sql,array($id));
		return $query->result_array();
	 }
	 
	 function otherSubject($id)
	 {
		$sql = "SELECT * FROM `bk_subjects` WHERE `subject_id` = ? LIMIT 1";
		$query = $this->db->query($sql,array($id));
		$collage = $query->row()->collage_id;
		$sql = "SELECT * FROM `bk_subjects` WHERE `collage_id` = ? AND `subject_id` != ?";
		$query = $this->db->query($sql,array($collage,$id));
		return $query->result_array();
	 }
	 
	 // function firstSubject($id)
	 // {
		// $sql = "SELECT * FROM `bk_subjects` WHERE `collage_id` = ? ORDER BY `subject_id`";
		// $query = $this->db->query($sql,array($collage,$id));
		// return $query->row();
	 // }
}
?>