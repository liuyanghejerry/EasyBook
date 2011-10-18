<?php
class Register extends CI_Controller{
    
     function __construct()
    {
         parent :: __construct();
         $this -> load -> helper('html');
		 //$this->load->helper('url');
		 $this->load->helper(array('form', 'url'));
		 $this->load->library('form_validation');
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
         $data = array();
         $this -> _makeHeader($data);
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
                     'rules'   => 'required'
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
                  )
            );

		 $this->form_validation->set_rules($rules);
		 
		 if (!$this->form_validation->run())
		  {
		   $this->load->view('register');
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
}
?>