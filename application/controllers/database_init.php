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
         $this -> load -> view('missingheader', $data);
		 $this -> load -> view('database_init',$data);
		 $this -> load -> view('footer');
		 $this->_createTable();
    }
	 
	 function _createTable()
	{
		 //user info
		 $fields = array(
                        'user_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5, 
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'user_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '20'
                                          ),
                        'user_passhash' => array(
                                                 'type' =>'VARCHAR',
                                                 'constraint' => '32'
                                          ),
                        'user_email' => array(
                                                 'type' => 'TEXT',
												 'constraint' => '100'
                                          ),
						'user_studentid' => array(
                                                 'type' => 'VARCHAR',
												 'constraint' => '15',
                                          ),
						'user_cellphone' => array(
                                                 'type' => 'VARCHAR',
												 'constraint' => '15',
                                          ),
						'user_gender' => array(
                                                 'type' => 'INT',
												 'constraint' => '1',
												 'unsigned' => TRUE,
												 'default' => '1'
                                          ),
						'user_collage' => array(
                                                 'type' => 'INT',
												 'constraint' => '5',
												 'unsigned' => TRUE
                                          ),
						'user_subject' => array(
                                                 'type' => 'INT',
												 'constraint' => '5',
												 'unsigned' => TRUE
                                          ),
						'user_qq' => array(
                                                 'type' => 'VARCHAR',
												 'constraint' => '20',
												 'null' => TRUE
                                          )
         );
		 $this->dbforge->add_field($fields);
		 $this->dbforge->add_key('user_id', TRUE);
		 $this->dbforge->add_key('user_name');
		 $this->dbforge->create_table('bk_users',TRUE);
		 
		 //CAPCHA
		 $fields = array(
                        'captcha_id' => array(
                                                 'type' => 'BIGINT',
                                                 'constraint' => 13, 
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'captcha_time' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 10,
												 'unsigned' => TRUE
                                          ),
                        'ip_address' => array(
                                                 'type' =>'VARCHAR',
                                                 'constraint' => '16',
												 'default' => '0'
                                          ),
                        'word' => array(
                                                 'type' => 'VARCHAR',
												 'constraint' => '20',
                                          ),
         );
		 $this->dbforge->add_field($fields);
		 $this->dbforge->add_key('captcha_id', TRUE);
		 $this->dbforge->add_key('word');
		 $this->dbforge->create_table('bk_captcha',TRUE);
		 
		 //sessions
		 $fields = array(
                        'session_id' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => 40, 
												 'default' => '0'
                                          ),
                        'ip_address' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '16',
												 'default' => '0'
                                          ),
                        'user_agent' => array(
                                                 'type' =>'VARCHAR',
                                                 'constraint' => '50',
                                          ),
                        'last_activity' => array(
                                                 'type' => 'INT',
												 'constraint' => '10',
												 'unsigned' => TRUE,
												 'default' => '0'
                                          ),
						'user_data' => array(
                                                 'type' => 'TEXT',
												 'default' => ''
                                          ),
         );
		 $this->dbforge->add_field($fields);
		 $this->dbforge->add_key('session_id', TRUE);
		 $this->dbforge->create_table('bk_sessions',TRUE);
		 
		 //collage category
		 $fields = array(
                        'collage_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5, 
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'collage_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '30'
                                          ),
						'collage_firstsub' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5, 
                                                 'unsigned' => TRUE
                                          ),
         );
		 $this->dbforge->add_field($fields);
		 $this->dbforge->add_key('collage_id', TRUE);
		 $this->dbforge->add_key('collage_name');
		 $this->dbforge->create_table('bk_collages',TRUE);
		 
		 //subject category
		 $fields = array(
                        'subject_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5, 
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'subject_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '30'
                                          ),
						'collage_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5,
												 'unsigned' => TRUE,
												 'default' => 0
                                          ),
         );
		 $this->dbforge->add_field($fields);
		 $this->dbforge->add_key('subject_id', TRUE);
		 $this->dbforge->add_key('subject_name');
		 $this->dbforge->create_table('bk_subjects',TRUE);
		 
		 //selling books
		 $fields = array(
                        'selling_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 9, 
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'book_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '30'
                                          ),
						'book_publisher' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '30'
                                          ),
						'book_author' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '30'
                                          ),
						'book_isbn' => array(
                                                 'type' => 'BIGINT',
                                                 'constraint' => 20,
												 'unsigned' => TRUE
                                          ),
						'book_collage' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5,
												 'unsigned' => TRUE
                                          ),
						'book_subject' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5,
												 'unsigned' => TRUE
                                          ),
						'book_ownerid' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5,
												 'unsigned' => TRUE
                                          ),
						'book_status' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5
                                          ),
						'book_boxart' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => 20
                                          ),
						'book_contact' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => 20
                                          ),
						'book_note' => array(
                                                 'type' => 'TEXT'
                                          ),
						'book_oprice' => array(
                                                 'type' => 'VARCHAR',
												 'constraint' => 10
                                          ),
						'book_nprice' => array(
                                                 'type' => 'VARCHAR',
												 'constraint' => 10
                                          ),
						'book_suggest' => array(
                                                 'type' => 'INT',
												 'constraint' => 5
                                          ),
						'selling_start' => array(
                                                 'type' => 'DATE'
                                          ),
						'selling_end' => array(
                                                 'type' => 'DATE'
                                          ),
         );
		 $this->dbforge->add_field($fields);
		 $this->dbforge->add_key('selling_id', TRUE);
		 $this->dbforge->add_key('book_name');
		 $this->dbforge->add_key('book_collage');
		 $this->dbforge->add_key('book_subject');
		 $this->dbforge->add_key('book_isbn');
		 $this->dbforge->add_key('book_ownerid');
		 $this->dbforge->add_key('book_status');
		 $this->dbforge->add_key('selling_start');
		 $this->dbforge->create_table('bk_selling',TRUE);
		 
		 //requesting books
		 $fields = array(
                        'requesting_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 9, 
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'book_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '30'
                                          ),
						'book_publisher' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '30',
												 'null' => TRUE
                                          ),
						'book_author' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '30',
												 'null' => TRUE
                                          ),
						'book_isbn' => array(
                                                 'type' => 'BIGINT',
                                                 'constraint' => 20,
												 'unsigned' => TRUE,
												 'null' => TRUE
                                          ),
						'book_ownerid' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5,
												 'unsigned' => TRUE
                                          ),
						'book_collage' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5,
												 'unsigned' => TRUE
                                          ),
						'book_subject' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5,
												 'unsigned' => TRUE
                                          ),
						'book_status' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5
                                          ),
						'book_contact' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => 20
                                          ),
						'book_note' => array(
                                                 'type' => 'TEXT'
                                          ),
						'requesting_start' => array(
                                                 'type' => 'DATE'
                                          ),
						'requesting_end' => array(
                                                 'type' => 'DATE'
                                          ),
         );
		 $this->dbforge->add_field($fields);
		 $this->dbforge->add_key('requesting_id', TRUE);
		 $this->dbforge->add_key('book_name');
		 $this->dbforge->add_key('book_isbn');
		 $this->dbforge->add_key('book_collage');
		 $this->dbforge->add_key('book_subject');
		 $this->dbforge->add_key('book_ownerid');
		 $this->dbforge->add_key('book_status');
		 $this->dbforge->add_key('requesting_start');
		 $this->dbforge->create_table('bk_requesting',TRUE);
	}
	
    }
?>