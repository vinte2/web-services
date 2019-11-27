<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['viewName'] = 'relatorioCadastrados';
		$this->load->view('template', $data);
	}

	public function viewAlterar($idaluno) {
		$data['idaluno'] = $idaluno;
		$data['viewName'] = 'viewAlterar';
		$this->load->view('template', $data);
	}

	public function cadastro() {
		$data['viewName'] = 'FormCadastroAlunos';
		$this->load->view('template', $data);
	}
}
