<?php
class Main extends CI_Controller{
    
     function __construct()
    {
         parent :: __construct();
         $this -> load -> helper('html');
		 $this->load->library('javascript');
		 $this->load->library('jquery');
         }
    
     function _makeHeader($data)
    {
         echo doctype('html5');
        $data['keywords'] = 'This, is, keywords';
        $data['description'] = 'This is description';
        $data['robots'] = 'This is robots part';
        return $data;
         }
    
     function index()
    {
         $data = array(
            'hello' => 'My Title'
            );
         $data = $this -> _makeHeader($data);
         $this -> load -> view('header', $data);
		 //$this -> load -> view('resource/header.css', $data);
         $this -> load -> view('main');
        
         // echo 'Hello, world';
    }
    
    }
?>