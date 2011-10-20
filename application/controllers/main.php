<?php
class Main extends CI_Controller{
    
     function __construct()
    {
         parent :: __construct();
         $this -> load -> helper('html');
		 $this->load->helper('url');
		 //$this->load->library('javascript');
		 //$this->output->cache(5);
         }
    
     function _makeHeader(&$data)
    {
         echo doctype('html5');
        $data['keywords'] = 'This, is, keywords';
        $data['description'] = 'This is description';
        $data['robots'] = 'This is robots part';
		$data['javascript'] = array(base_url().'resource/main/slideshow.js',base_url().'resource/main/jquery.hoverIntent.min.js',
								base_url().'resource/main/jquery.mb.flipText.js',base_url().'resource/main/jquery.metadata.js',
								base_url().'resource/main/mbExtruder.js');
		$data['css'] = array(base_url().'resource/common.css',base_url().'resource/main/main.css',base_url().'resource/main/slideshow.css',
							base_url().'resource/footer/footer.css',base_url().'resource/main/mbExtruder.css');
		$data['username'] = $this->session->userdata('username');
		$data['login'] = $this->session->userdata('login');
    }
    
     function index()
    {
         $data = array();
         $this -> _makeHeader($data);
         $this -> load -> view('header', $data);
         $this -> load -> view('main');
		 $this -> load -> view('footer');
    }
    }
?>