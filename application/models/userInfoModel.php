<?php
class UserInfoModel extends CI_Model {

    var $data;

    function __construct()
    {
        parent::__construct();
    }
	
	function allInfo(&$data,$id)
	{
		$sql = "SELECT * FROM `bk_users` WHERE `user_id` =?";
		$query = $this->db->query($sql,array($id));
		$data['userinfo'] = $query->row_array();
	}
	
	function nameToId($name)
	{
		$sql = "SELECT * FROM `bk_users` WHERE `user_name` =?";
		$query = $this->db->query($sql,array($name));
		return $query->row()->user_id;
	}
	
}
?>