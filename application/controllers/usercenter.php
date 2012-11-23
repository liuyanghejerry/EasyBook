<?php
class Usercenter extends CI_Controller{
    
     function __construct()
    {
         parent :: __construct();
		 $this->load->helper(array('html','form', 'url','captcha'));
		 $this->load->library('form_validation');
		 $this->load->model('sellingModel');
		 $this->load->model('requestingModel');
		 $this->load->model('userInfoModel');
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
		$data['javascript'] = array($baser.'resource/usercenter/jquery.idTabs.min.js',$baser.'resource/common.js');
		$data['css'] = array($baser.'resource/common.css',$baser.'resource/usercenter/usercenter.css',
							$baser.'resource/footer/footer.css');
		$data['username'] = $this->session->userdata('username');
		$data['login'] = $this->session->userdata('login');
    }
    
     function index()
    {
		if(!$this->session->userdata('login')||!$this->session->userdata('username')||!$this->session->userdata('userid')){
			redirect('login');  
		}
		 $userid = $this->session->userdata('userid');
		 $data = array();
         $this -> _makeHeader($data);
		 $data['selling'] = $this -> sellingModel-> whatsMyBook($userid);
		 $data['requesting'] = $this -> requestingModel-> whatsMyBook($userid);
		 $this -> userInfoModel ->allInfo($data,$userid);
         $this -> load -> view('header', $data);
         $this -> load -> view('usercenter');
		 $this -> load -> view('footer');
    }
}
?>