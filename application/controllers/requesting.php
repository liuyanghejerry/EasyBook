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
		 $this->load->model('collageModel');
		 $this->load->library('form_validation');
		 $this->load->helper('date');
		 $this->lang->load('form_validation', 'chinese');
    }
    
     function _makeHeader(&$data)
    {
		echo doctype('html5');
        $data['keywords'] = 'This, is, keywords';
        $data['description'] = 'This is description';
        $data['robots'] = 'This is robots part';
		$data['javascript'] = array(base_url().'resource/requesting/jquery.easing.1.3.js',
									base_url().'resource/requesting/jquery.accordion.js',
									base_url().'resource/jquery-ui-1.9.1.custom.min.js',
									base_url().'resource/selling/jquery.jqzoom-core-pack.js',
									base_url().'resource/datepicker/js/datepicker.js'
									);
		$data['css'] = array(base_url().'resource/common.css',
							base_url().'resource/footer/footer.css',
							base_url().'resource/requesting/requesting.css',
							base_url().'resource/datepicker/css/datepicker.css',
							base_url().'resource/jquery-ui-1.9.1.custom.min.css'
							);
		$data['username'] = $this->session->userdata('username');
		$data['login'] = $this->session->userdata('login');
    }
    
     function index()
    {
		$this->page(0,0,0);
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
	
	function single($id)
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
		return;
	}
	
	function close()
	{
		$book_owner = $this ->requestingModel->whosBook($id);
		if($book_owner == $this->session->userdata('userid')){
			$this ->requestingModel->closeBook($id);
			$data['msgtitle'] = '图书已成功关闭';
			$data['msgcontent'] = '图书已成功关闭，将不会再出现在求购栏目当中。';
			$this -> load -> view('header', $data);
			$this -> load -> view('message-template');
			$this -> load -> view('footer');
		}
	}
	
	function category()
	{
		$k = $this->collageModel->subject();
		$p = array();
		for($i=0;$i<count($k);$i++){
			$p[$i] = $k[$i]['subject_name'];
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($p));
	}
	
	function create()
	{
		$this->form_validation->set_error_delimiters('<div class="warning"><p>', '</p></div>');
		$data = array();
		$this->_makeHeader($data);
		$this->load->view('header', $data);
		$this->load->view('requesting_create');
		$this->load->view('footer');
	}
	
	function validate()
	{
		$rules = array(
		   array(
				 'field'   => 'name', 
				 'label'   => '书名', 
				 'rules'   => 'trim|required|max_length[200]|xss_clean'
			  ),
		   array(
				 'field'   => 'author', 
				 'label'   => '作者', 
				 'rules'   => 'required|trim|xss_clean'
			  ),   
		   array(
				 'field'   => 'isbn', 
				 'label'   => 'ISBN', 
				 'rules'   => 'trim|xss_clean'
			  ),
		   array(
				 'field'   => 'category', 
				 'label'   => 'ISBN', 
				 'rules'   => 'trim|required|xss_clean|callback_category_check'
			  ),
		   array(
				 'field'   => 'publisher', 
				 'label'   => '出版社', 
				 'rules'   => 'trim|xss_clean'
			  ),
		   array(
				 'field'   => 'contact', 
				 'label'   => '联系电话', 
				 'rules'   => 'required|trim|numeric|xss_clean'
			  ),
		   array(
				 'field'   => 'endtime', 
				 'label'   => '截止时间', 
				 'rules'   => 'trim|required|xss_clean'
			  ),
		   array(
				 'field'   => 'notes', 
				 'label'   => '备注', 
				 'rules'   => 'trim|xss_clean'
			  )
		);

		$this->form_validation->set_rules($rules);
		
		if( !$this->form_validation->run() ){
			$this->create();
		}else{
			$this->_publish();
			$data = array();
			$data['msgtitle'] = '发布成功';
			$data['msgcontent'] = '恭喜您，您的求购信息已经发布，请点击<a href="'.base_url().'">返回首页</a>。';
			$this ->_makeHeader($data);
			$this ->load ->view('header', $data);
			$this->load->view('message-template');
			$this->load->view('footer');
		}
    }
	
	function category_check($str)
	{
		$this->form_validation->set_message('category_check', 
				'您的书籍专业选择有误，您可以尝试填写全称。<br/>如果确实缺少该专业，请与管理员联系。');
		$arr = $this->collageModel->subject();
		$narr = array();
		foreach ($arr as &$value) {
			$narr[] = $value["subject_name"];
		}
		
		return in_array($str, $narr);
	}
	
	function _publish()
	{	
		$subject = $this->input->post('subject', TRUE);
		$subject = $this->collageModel->subjectId($subject);
		
		if(!$subject) return;
		$collage =$this->collageModel->subjectToCollage($subject);
		
		$data = array(
					'book_name' => $this->input->post('name', TRUE),
					'book_ownerid' => $this->session->userdata('userid'),
					'book_publisher' => $this->input->post('publisher', TRUE),
					'book_author' => $this->input->post('author', TRUE),
					'book_isbn' => $this->input->post('isbn', TRUE),
					'book_contact' => $this->input->post('contact', TRUE),
					'book_subject' => $subject,
					'book_collage' => $collage,
					'requesting_start' => mdate("%Y-%m-%d", time()),
					'requesting_end' => $this->input->post('endtime', TRUE),
					'book_note' => $this->input->post('notes', TRUE),
					'book_status' => 1
		);
		
		$query = $this->db->insert_string('bk_requesting', $data);
		$this->db->query($query);
	}
}
?>