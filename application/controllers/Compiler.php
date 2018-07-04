<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compiler extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('java_compiler');
	}
	function index(){
		$this->load->view('compiler');
	}
	function execute(){
		$code=$this->input->post('code');
		$input=$this->input->post('input');
		echo $this->java_compiler->compile($code, $input);
	}
}
?>