<?php
class Config extends AppModel {
	public $name = 'Config';
    public $primaryKey = 'id';

	/*public function beforeValidate(){
		debug($this->data);
		die();
	}*/

	/*
	public function beforeSave($options = Array()){

		if(strpos($this->data['Concurso']['data_nascimento'], '/')){
			$data_nascimento = explode('/', $this->data['Concurso']['data_nascimento']);

			if (strlen($data_nascimento[2]) == 2 && $data_nascimento[2] < 15 ) {
				$data_nascimento[2] = "20".$data_nascimento[2];
			}elseif(strlen($data_nascimento[2]) == 2 && $data_nascimento[2] > 15 && $data_nascimento[2] < 100){
				$data_nascimento[2] = "19".$data_nascimento[2];
			}

			$data_nascimento = $data_nascimento[2].'-'.$data_nascimento[1].'-'.$data_nascimento[0];

			$this->data['Concurso']['data_nascimento'] = $data_nascimento;

			if (strtotime($data_nascimento) <= strtotime((date('Y') - 3).date('-m-d')) &&
				strtotime($data_nascimento) > strtotime((date('Y') - 6).date('-m-d'))) {

					$this->data['Concurso']['classe'] = 0;

			} elseif (strtotime($data_nascimento) <= strtotime((date('Y') - 6).date('-m-d')) &&
					 strtotime($data_nascimento) > strtotime((date('Y') - 11).date('-m-d'))) {

					$this->data['Concurso']['classe'] = 1;

			} elseif (strtotime($data_nascimento) <= strtotime((date('Y') - 11).date('-m-d')) &&
					 strtotime($data_nascimento) > strtotime((date('Y') - 15).date('-m-d'))) {

					$this->data['Concurso']['classe'] = 2;
			}
		}

		$palavras = explode(' ', $this->data['Concurso']['frase']);
		if(count($palavras) <= 3){
			$this->data['Concurso']['frase'] = '';
			foreach ($palavras as $key => $value) {
				if(strlen($value) > 80){
					$value = substr($value, 0,80);
			    }
				$this->data['Concurso']['frase'] .= $value." ";
			}
		}


		$this->data['Concurso']['frase'] 				= utf8_decode($this->data['Concurso']['frase']);
		$this->data['Concurso']['nome'] 				= utf8_decode($this->data['Concurso']['nome']);
		$this->data['Concurso']['nome_responsavel'] 	= utf8_decode($this->data['Concurso']['nome_responsavel']);
		$this->data['Concurso']['endereco_responsavel'] = utf8_decode($this->data['Concurso']['endereco_responsavel']);
		$this->data['Concurso']['bairro_responsavel'] 	= utf8_decode($this->data['Concurso']['bairro_responsavel']);
		$this->data['Concurso']['cidade_responsavel'] 	= utf8_decode($this->data['Concurso']['cidade_responsavel']);
		$this->data['Concurso']['cidade'] 				= utf8_decode($this->data['Concurso']['cidade']);
		$this->data['Concurso']['orientador'] 			= utf8_decode($this->data['Concurso']['orientador']);
		$this->data['Concurso']['unidade'] 				= utf8_decode($this->data['Concurso']['unidade']);
		$this->data['Concurso']['cidade'] 				= utf8_decode($this->data['Concurso']['cidade']);



	}*/

}
