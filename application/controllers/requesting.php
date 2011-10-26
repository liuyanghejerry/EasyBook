<?php
class Requesting extends CI_Controller{
    
     function __construct()
    {
         parent :: __construct();
         $this -> load -> helper('html');
		 $this->load->helper('url');
		 $this->load->database();
		 $this->load->library('pagination');
		 $this->load->model('requestingModel');
    }
    
     function _makeHeader(&$data)
    {
         echo doctype('html5');
        $data['keywords'] = 'This, is, keywords';
        $data['description'] = 'This is description';
        $data['robots'] = 'This is robots part';
		$data['javascript'] = array(base_url().'resource/requesting/jquery.easing.1.3.js',base_url().'resource/requesting/jquery.accordion.js');
		$data['css'] = array(base_url().'resource/common.css',base_url().'resource/footer/footer.css',base_url().'resource/requesting/requesting.css');
		$data['username'] = $this->session->userdata('username');
		$data['login'] = $this->session->userdata('login');
    }
    
     function index()
    {
          $this->page(0,0,0);
		  //print_r($data['selling']);	
    }
	
	function page($collageNum=0, $subjectNum=0, $pageNum = 0)
	{
		 $data = array();
         $this -> _makeHeader($data);
		 
		 $this ->requestingModel-> queryData($data,$collageNum,$subjectNum,$pageNum);
		 $config['base_url'] = site_url().'/requesting/page';
		 $config['total_rows'] = $data['pages'];
		 $config['per_page'] = '10'; 
		 $this->pagination->initialize($config);
		 $data['pages'] = $this->pagination->create_links();
		 
		 $data['subjects'] = $this ->requestingModel-> otherSubject($subjectNum, $collageNum);
		 $data['collages'] = $this ->requestingModel-> otherCollage($collageNum);
		 
         $this -> load -> view('header', $data);
         $this -> load -> view('requesting');
		 $this -> load -> view('footer');
	} 
	
	function single($id=1)
	{
		 $data = array();
         $this -> _makeHeader($data);		 
		 $hasData = $this ->requestingModel-> queryRequesting($data, $id);
		 if(!$hasData){
			redirect('missing');  
			return;
		 }
		 $data['subjects'] = $this ->requestingModel-> sameSubjectBook($id);
		 $data['collages'] = $this ->requestingModel-> sameCollageBook($id);
         $this -> load -> view('header', $data);
         $this -> load -> view('requesting_single');
		 $this -> load -> view('footer');
	} 
}
?>