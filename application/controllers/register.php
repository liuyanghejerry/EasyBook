<?php
class Register extends CI_Controller{
    
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
		$data['javascript'] = array($baser.'resource/register/validation.js');
		$data['css'] = array($baser.'resource/common.css',$baser.'resource/register/register.css',
							$baser.'resource/footer/footer.css');
		$data['username'] = $this->session->userdata('username');
		$data['login'] = $this->session->userdata('login');
    }
    
     function index()
    {
		$this->form_validation->set_error_delimiters('<div class="warning"><p>', '</p></div>');
		$baser = base_url();
		srand((double)microtime()*1000000);
		$randval = rand(10000,99999);
		$vals = array(
			'img_path' => './resource/capcha/',
			'img_url' => $baser.'resource/capcha/',
			'img_width' => '115',
			'img_height' => '30',
			'word' => $randval		
			);

		$cap = create_captcha($vals);

		$data1 = array(
			'captcha_time' => $cap['time'],
			'ip_address' => $this->input->ip_address(),
			'word' => $cap['word']
			);

		$query = $this->db->insert_string('bk_captcha', $data1);
		$this->db->query($query);
		$data = array();
         $this -> _makeHeader($data);
		 $data['warning'] = 'none';
		 $data['capTime']=$cap['time'];
         $this -> load -> view('header', $data);
         $this -> load -> view('register');
		 $this -> load -> view('footer');
    }
	
	function validate()
	{
		 
		 $rules = array(
               array(
                     'field'   => 'name', 
                     'label'   => '用户名', 
                     'rules'   => 'trim|required|min_length[4]|max_length[20]|xss_clean|alpha_dash|callback__checkUsername'
                  ),
               array(
                     'field'   => 'pass1', 
                     'label'   => '密码', 
                     'rules'   => 'required|min_length[6]|max_length[20]|md5'
                  ),
               array(
                     'field'   => 'pass2', 
                     'label'   => '密码确认', 
                     'rules'   => 'required|matches[pass1]|md5'
                  ),   
               array(
                     'field'   => 'email', 
                     'label'   => '电子邮件', 
                     'rules'   => 'trim|required|valid_email|callback__checkUserEmail'
                  ),
			   array(
                     'field'   => 'capcha', 
                     'label'   => '验证码', 
                     'rules'   => 'trim|required|callback__capchaValidate'
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
		   $data = array();
		   $data['msgtitle'] = '注册成功';
		   $data['msgcontent'] = '恭喜您，您的注册已经完成，请点击<a href="'.base_url().'">返回首页</a>。';
           $this ->_makeHeader($data);
           $this ->load ->view('header', $data);
           $this->load->view('message-template');
		   $this ->load ->view('footer');
		   $this->_register();
		  }
    }
	
	function _capchaValidate($cc)
	 {
		$this->form_validation->set_message('_capchaValidate', '您输入的%s有误，请重新输入。');
		$expiration = time()-600; // 10分钟限制
		$this->db->query("DELETE FROM `bk_captcha` WHERE `captcha_time` < ".$expiration); 

		// 然后再看是否有验证码存在:
		$sql = "SELECT COUNT(*) AS count FROM `bk_captcha` WHERE `word` = ? AND `ip_address` = ? AND `captcha_time` > ?";
		$binds = array($cc, $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();

		if ($row->count == 0)
		{
			return FALSE;
		}else
			return TRUE;
	 }
	 
	 function _checkUsername($name)
	 {
		$this->form_validation->set_message('_capchaValidate', '您的用户名%s已被注册，请换一个试试。');
		$sql = "SELECT COUNT(*) AS count FROM `bk_users` WHERE `user_name` = ?";
		$binds = array($name);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		if ($row->count != 0)
		{
			return FALSE;
		}else{
			return TRUE;
		}
	 }
	 
	 function _checkUserEmail($email)
	 {
		$this->form_validation->set_message('_checkUserEmail', '您的电子电子邮箱%s已被注册，请换一个试试。');
		$sql = "SELECT COUNT(*) AS count FROM `bk_users` WHERE `user_email` = ?";
		$binds = array($email);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		if ($row->count != 0)
		{
			return FALSE;
		}else{
			return TRUE;
		}
	 }
	 
	 function _register()
	 {
		$name = $this->input->post('name');
		$md5passwd = md5($this->input->post('pass1'));//Notice, this is a double md5 encode. The first encode is when validate.
		$email = $this->input->post('email');
		if($name && $md5passwd && $email) {
			$data = array(
						'user_name' => $name,
						'user_passhash' => $md5passwd,
						'user_email' => $email
					);
			$query = $this->db->insert_string('bk_users', $data);
			$this->db->query($query);
		}
	 }
	}
?>