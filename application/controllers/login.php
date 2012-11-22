<?php
class Login extends CI_Controller{
    
     function __construct()
    {
		parent :: __construct();
		$this->load->helper(array('html','form', 'url','captcha'));
		$this->load->library('form_validation');
		$this->load->database();
		$this->lang->load('form_validation', 'chinese');
		//$this->load->library('javascript');
		//$this->output->cache(5);
	}
    
     function _makeHeader(&$data)
    {
		echo doctype('html5');
        $data['keywords'] = 'This, is, keywords';
        $data['description'] = 'This is description';
        $data['robots'] = 'This is robots part';
		$baser = base_url();
		$data['javascript'] = array();
		$data['css'] = array($baser.'resource/common.css',$baser.'resource/login/login.css',
							$baser.'resource/footer/footer.css');
		$data['username'] = $this->session->userdata('username');
		$data['login'] = $this->session->userdata('login');
    }
    
     function index()
    {
		$this->form_validation->set_error_delimiters('<div class="warning"><p>', '</p></div>');
		$data = array();
		$this -> _makeHeader($data);
		$this -> load -> view('header', $data);
		$this -> load -> view('login');
		$this -> load -> view('footer');
    }
	
	function validate()
	{
		 
		$rules = array(
		   array(
				 'field'   => 'name', 
				 'label'   => '用户名', 
				 'rules'   => 'trim|required|min_length[4]|max_length[20]|xss_clean|alpha_dash|callback__check'
			  ),
		   array(
				 'field'   => 'pass', 
				 'label'   => '密码', 
				 'rules'   => 'required|min_length[6]|max_length[20]|md5'
			  )
		);

		$this->form_validation->set_rules($rules);

		if (!$this->form_validation->run()){
			$this->index();
		}else{
			$this->_login();
			$data = array();
			$data['msgtitle'] = '登录成功';
			$data['msgcontent'] = '恭喜您，您已顺利登录，请点击<a href="'.base_url().'">返回首页</a>。';
			$this ->_makeHeader($data);
			$this ->load ->view('header', $data);
			$this->load->view('message-template');
			$this ->load ->view('footer');
		}
    }
	
	function logout()
	 {
		$this->session->sess_destroy();
		$data = array();
		$this ->_makeHeader($data);
		$data['msgtitle'] = '注销成功';
		$data['msgcontent'] = '您已成功注销，请点击<a href="'.base_url().'">返回首页</a>。';
		$this ->load ->view('header', $data);
		$this->load->view('message-template');
		$this ->load ->view('footer');
	 }
	
	 function _check($ss)
	 {
		$this->form_validation->set_message('_check', '您输入的用户名或密码有误，请重新输入。');
		$name = $ss;//$this->input->post('name');
		$md5passwd = md5(md5($this->input->post('pass')));//Notice, this is a double md5 encode.
		if($name && $md5passwd) {
			$data = array(
						'user_name' => $name,
						'user_passhash' => $md5passwd
					);
			$sql = "SELECT COUNT(*) AS count FROM `bk_users` WHERE `user_name` = ? AND `user_passhash` = ?";
			$binds = array($name, $md5passwd);
			$query = $this->db->query($sql, $binds);
			$row = $query->row();
			if(!$row->count){
			   return FALSE;
			}else{
			   return TRUE;
			}
		}
	 }
	 
	 function _login()
	 {
		$name = $this->input->post('name');
		$md5passwd = md5($this->input->post('pass'));//Notice, this is a double md5 encode. The first encode is when validate.
		if($name && $md5passwd) { 
				$sql = "SELECT * FROM `bk_users` WHERE `user_name` = ?";
				$query = $this->db->query($sql,array($name));
				$userid = $query -> row() -> user_id;
				$append = array('login'=>TRUE, 'username'  => $name, 'userid' => $userid);
				$this->session->set_userdata($append);
		}
	 }
	}
?>