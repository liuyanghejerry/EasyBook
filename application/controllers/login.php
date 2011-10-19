<?php
class Login extends CI_Controller{
    
     function __construct()
    {
         parent :: __construct();
		 $this->load->helper(array('html','form', 'url','captcha'));
		 $this->load->library('form_validation');
		 $this->load->database();
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
		 $this->form_validation->set_message('required', '您的%s没有填写，请补充该内容。');
		$this->form_validation->set_message('min_length', '您的%s长度太小。');
		$this->form_validation->set_message('max_length', '您的%s长度太大。');
		$this->form_validation->set_message('valid_email', '您的%s不上一个合法的电子邮件地址。');
		$this->form_validation->set_message('alpha_dash', '%s当中仅允许英文字母、数字、下划线、英文破折号。');
		$this->form_validation->set_message('matches', '您的%s填写与密码并不一致。');
		$this->form_validation->set_message('min_length', '您的%s长度太小。');
		$this->form_validation->set_message('min_length', '您的%s长度太小。');
		 
		 if (!$this->form_validation->run())
		  {
		   $this->index();
		  }
		  else
		  {
		   $this->_login();
		   $data = array();
		   $this ->_makeHeader($data);
		   $this ->load ->view('header', $data);
		   $this->load->view('login-success');
		   $this ->load ->view('footer');
		  }
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
			   $append = array('login'=>TRUE, 'username'  => $name, 'userpasshash' => $md5passwd);
			   $this->session->set_userdata($append);
		}
	 }
	}
?>