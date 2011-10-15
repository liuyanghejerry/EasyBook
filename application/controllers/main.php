<?php
class Main extends CI_Controller{
    
     function __construct()
    {
         parent :: __construct();
         $this -> load -> helper('html');
		 //$this->load->library('javascript');
         }
    
     function _makeHeader($data)
    {
         echo doctype('html5');
        $data['keywords'] = 'This, is, keywords';
        $data['description'] = 'This is description';
        $data['robots'] = 'This is robots part';
		$data['javascript'] = array('resource/main/slideshow.js');
		$data['css'] = array('resource/common.css','resource/main/main.css','resource/main/slideshow.css');
        return $data;
    }
    
     function index()
    {
         $data = array();
         $data = $this -> _makeHeader($data);
         $this -> load -> view('header', $data);
         $this -> load -> view('main');
    }
    
    }
?>