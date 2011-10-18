<?php
class Database_init extends CI_Controller{
    
     function __construct()
    {
         parent :: __construct();
         $this -> load -> helper('html');
		 $this->load->helper('url');
		 $this->load->dbforge();
		 //$this->load->database();
		 
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
		$data['javascript'] = array();
		$data['css'] = array($baser.'resource/common.css',
							$baser.'resource/footer/footer.css');
    }
    
     function index()
    {
         $data = array();
         $this -> _makeHeader($data);
         $this -> load -> view('header', $data);
         echo 'let\'s roll it up!';
		 $this -> load -> view('footer');
		 $this->_createTable();
    }
	 
	 function _createTable()
	{
		 
		 $fields = array(
                        'user_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5, 
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'user_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '20',
                                          ),
                        'user_passhash' => array(
                                                 'type' =>'VARCHAR',
                                                 'constraint' => '32',
                                          ),
                        'user_email' => array(
                                                 'type' => 'TEXT',
												 'constraint' => '100',
                                          ),
         );
		 $this->dbforge->add_field($fields);
		 $this->dbforge->add_key('user_id', TRUE);
		 $this->dbforge->add_key('user_name');
		 $this->dbforge->create_table('bk_users',TRUE);
	}
	
    }
?>