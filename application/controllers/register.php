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
    }
    
     function index()
    {
		$this->form_validation->set_error_delimiters('<div class="warning"><p>', '</p></div>');
		$baser = base_url();
		$vals = array(
			'img_path' => './resource/capcha/',
			'img_url' => $baser.'resource/capcha/',
			'img_width' => '115',
			'img_height' => '30'
			);

		$cap = create_captcha($vals);

		$data1 = array(
			'captcha_time' => $cap['time'],
			'ip_address' => $this->input->ip_address(),
			'word' => $cap['word']
			);

		$query = $this->db->insert_string('captcha', $data1);
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
                     'rules'   => 'trim|required|min_length[4]|max_length[20]|xss_clean|alpha_dash'
                  ),
               array(
                     'field'   => 'pass1', 
                     'label'   => '密码', 
                     'rules'   => 'required|min_length[6]|max_length[20]'
                  ),
               array(
                     'field'   => 'pass2', 
                     'label'   => '密码确认', 
                     'rules'   => 'required|matches[pass1]'
                  ),   
               array(
                     'field'   => 'email', 
                     'label'   => '电子邮件', 
                     'rules'   => 'trim|required|valid_email'
                  ),
			   array(
                     'field'   => 'capcha', 
                     'label'   => '验证码', 
                     'rules'   => 'trim|required|callback__capchaValidate'
                  )
            );

		 $this->form_validation->set_rules($rules);
		 
		 if (!$this->form_validation->run())
		  {
		   $this->index();
		  }
		  else
		  {
		   $data = array();
           $this -> _makeHeader($data);
           $this -> load -> view('header', $data);
           $this->load->view('register-success');
		   $this -> load -> view('footer');
		  }
    }
	function _capchaValidate($cc)
	 {
		$this->form_validation->set_message('_capchaValidate', '您输入的%s有误，请重新输入。');
		$expiration = time()-7200; // 2小时限制
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration); 

		// 然后再看是否有验证码存在:
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($cc, $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();

		if ($row->count == 0)
		{
			return FALSE;
		}else
		return TRUE;
	 }
	}
?>