<?php
class CollageModel extends CI_Model {

    var $data;

    function __construct()
    {
        parent::__construct();
    }
	
	function allCollage(&$data)
	{
		$sql = "SELECT * FROM `bk_collages` WHERE `collage_id` != 1 ORDER BY `collage_id`";
		$query = $this->db->query($sql);
		$i = 0;
		if ($query->num_rows() > 0)
			{
			   foreach ($query->result() as $row)
			   {
				  $data['collages'][$i]['subjects'] = $this->allSubject($row->collage_id);
				  $data['collages'][$i]['name'] = $row->collage_name;
				  $data['collages'][$i]['id'] = $row->collage_id;
				  $i++;
			   }
			}
	}
	
	function allSubject($id)
	{
		$sql = "SELECT * FROM `bk_subjects` WHERE `collage_id` = ? ORDER BY `subject_id`";
		$query = $this->db->query($sql,array($id));
		return $query->result_array();
	}
	
	function subjectToCollage($id)
	{
		$sql = "SELECT * FROM `bk_subjects` WHERE `subject_id` = ? LIMIT 1";
		$query = $this->db->query($sql,array($id));
		return $query->row()->collage_id;
	}
	
	function subjectName($id)
	{
		$sql = "SELECT * FROM `bk_subjects` WHERE `subject_id` = ? LIMIT 1";
		$query = $this->db->query($sql,array($id));
		return $query->row()->subject_name;
	}
	
	function collageName($id)
	{
		$sql = "SELECT * FROM `bk_collages` WHERE `collage_id` = ? LIMIT 1";
		$query = $this->db->query($sql,array($id));
		return $query->row()->collage_name;
	}
	
}
?>