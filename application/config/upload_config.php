<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Upload settings of selling book boxart
|--------------------------------------------------------------------------
| 
| max resolution, etc
*/

$config['upload_path'] = './resource/uploads/';
$config['allowed_types'] = 'gif|jpg|png|jpeg';
$config['max_size'] = '2048';
// TODO: put a proper size here.
// $config['max_width']  = '720';
// $config['max_height']  = '1080';
$config['encrypt_name']  = TRUE;



/* End of file upload_config.php */
/* Location: ./application/config/upload_config.php */
