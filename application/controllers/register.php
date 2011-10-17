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
	
    }
?>