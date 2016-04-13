<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('form');
	}

	public function data()
	{   $email=json_decode(file_get_contents('php://input'));
             $num  =  count($email);
             foreach ($email as $key => $value) {
             //	print_r($value->email);
             	$this->db->insert('user',array('email'=>$value->email));
             	echo "ok";
             }
	//print_r($email['0']->email);
	     //echo json_encode($email);
		//$this->load->view('form');

	}
}
