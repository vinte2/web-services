<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

class API extends CI_Controller {

	 public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'Main');
	}

	public function index()
	{
		$alunos = $this->Main->getAlunos();
		echo json_encode(['response' => 200, 'data' => $alunos]);
	}

	public function getAlunos() {
		$alunos = $this->Main->getAlunos();
		echo json_encode(['response' => 200, 'data' => $alunos]);
	}

	public function cadastrar() {
		$RETORNO = ['response' => '404'];
		$data['nomealuno'] = $_POST['nomealuno'];
		$data['cpfaluno'] = $_POST['cpfaluno'];
		$data['paialuno'] = $_POST['nomepai'];
		$data['cpfpai'] = $_POST['cpfpai'];

		$response = $this->Main->cadastrar($data);
		IF($response) {
			$RETORNO  =  ['response' => '200'];
		}
		echo json_encode($RETORNO);
	}

	public function deletar() {
		$idaluno = $_POST['idaluno'];

        if(!empty($idaluno)) {
            
			$query = $this->Main->deletar($idaluno); 
			if($query) {
				$response = ['response' => 200];
			}
        }else{
            $response = ['response' => 404];
		}
		
		echo json_encode($response);
	}

	public function viewAlterar() {
		$idaluno = !empty($_GET['idaluno']) ? $_GET['idaluno'] : '';
		$aluno = $this->Main->getAlunosId($idaluno);
		echo json_encode(['response' => 200, 'data' => $aluno]);
	}

	public function alterar() {
		$data['idaluno'] = $_POST['idaluno'];
		$data['nomealuno'] = $_POST['nomealuno'];
		$data['cpfaluno'] = $_POST['cpfaluno'];
		$data['paialuno'] = $_POST['nomepai'];
		$data['cpfpai'] = $_POST['cpfpai'];

		$query = $this->Main->alterar($data);
		
		if($query) {
			$response = ['response' => 200];
		}else{
			$response = ['response' => 404];
		}
	
		echo json_encode($response);
	}
}
