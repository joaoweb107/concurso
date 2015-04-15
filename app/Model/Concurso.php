<?php
class Concurso extends AppModel {
	public $belongsTo = array("Orientador" => array(
            'className' => 'Orientador',
            'foreignKey' => 'orientador_id',
            'associationForeignKey' => 'id'
        ));
	public $validate = array(
		"nome" => array(
				"rule" => 'notEmpty',
				'required' => true,
				"message" => array("O nome de aluno deve ser preenchido.")
			),
		"data_nascimento" => array(
			"notEmpty" => array(
				"rule" => 'notEmpty',
				'required' => true,
				"message" => array("A data de nascimento deve ser preenchido.")
				),
			'date' => array(
		        'rule' => array('date','dmy'),
		        'message' => 'Insira uma data válida no formato AA-MM-DD.',
		        'allowEmpty' => true
		    )
		),
		"email" => array(
			"notEmpty" => array(
				"rule" => 'notEmpty',
				'required' => true,
				"message" => array("O email do aluno deve ser preenchido.")
			),
			'email' => array(
			    'rule' => array('email', true),
			    'message' => 'Insira um email válido.'
			),
		),
		"nome_responsavel" => array(
			"rule" => 'notEmpty',
			'required' => true,
			"message" => array("Esse campo não pode ser vazio.")
		),
		"data_nascimento_responsavel" => array(
			"notEmpty" => array(
				"rule" => 'notEmpty',
				'required' => true,
				"message" => array("A data de nascimento deve ser preenchido.")
				),
			'date' => array(
		        'rule' => array('date','dmy'),
		        'message' => 'Insira uma data válida no formato AA-MM-DD.',
		        'allowEmpty' => true
		    )
		),
		"cpf_responsavel" => array(
			"rule" => 'notEmpty',
			'required' => true,
			"message" => array("Esse campo não pode ser vazio.")
		),
		"telefone_responsavel" => array(
			"rule" => 'notEmpty',
			'required' => true,
			"message" => array("Esse campo não pode ser vazio.")
		),
		"email_responsavel" => array(
			"notEmpty" => array(
				"rule" => 'notEmpty',
				'required' => true,
				"message" => array("O email do responsável deve ser preenchido.")
			),
			'email' => array(
		        'rule' => array('email', true),
		        'message' => 'Insira um email válido.'
		    )
		),
		"endereco_responsavel" => array(
			"rule" => 'notEmpty',
			'required' => true,
			"message" => array("O endereço do responsavel deve ser preenchido.")
		),
		"numero_responsavel" => array(
			"rule" => 'notEmpty',
			'required' => true,
			"message" => array("O número do endereço do responsavel deve ser preenchido.")
		),
		"bairro_responsavel" => array(
			"rule" => 'notEmpty',
			'required' => true,
			"message" => array("O bairro do endereço do responsavel deve ser preenchido.")
		),
		"cidade_responsavel" => array(
			"rule" => 'notEmpty',
			'required' => true,
			"message" => array("A Cidade do endereço do responsavel deve ser preenchido.")
		),
		"estado_responsavel" => array(
			"rule" => 'notEmpty',
			'required' => true,
			"message" => array("O estado do endereço do responsavel deve ser preenchido.")
		),
		"cep_responsavel" => array(
			"rule" => 'notEmpty',
			'required' => true,
			"message" => array("O CEP do endereço do responsavel deve ser preenchido.")
		),
		"orientador_id" => array(
			"rule" => 'notEmpty',
			'required' => true,
			"message" => array("Esse campo não pode ser vazio."),
			'allowEmpty' => false
		),
		"frase" => array(
			"campoVazio" => array(
				"rule" => 'notEmpty',
				'required' => true,
				"message" => array("Esse campo não pode ser vazio.")
			),
			'between' => array(
			    'rule' => array('between', 5, 340),
			    'message' => 'Frase de 5 a 340 caracteres'
			),
			'rule2isUnique' => array(
			    'rule' => 'isUnique',
			    'message' => 'Esta frase já foi cadastrada anteriormente.'
			)
		),
		"termos" => array(
			"rule" => 'notEmpty',
			'required' => true,
			"message" => array("Aceite o regulamento."),
			'allowEmpty' => false
		)
	);


/*	public function beforeValidate(){
		debug($this->data);
		die();
	}
**/
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


		$this->data['Concurso']['frase'] 					= utf8_decode($this->data['Concurso']['frase']);
		$this->data['Concurso']['nome'] 					= utf8_decode($this->data['Concurso']['nome']);
		$this->data['Concurso']['nome_responsavel'] 		= utf8_decode($this->data['Concurso']['nome_responsavel']);
		$this->data['Concurso']['endereco_responsavel'] 	= utf8_decode($this->data['Concurso']['endereco_responsavel']);
		$this->data['Concurso']['bairro_responsavel'] 		= utf8_decode($this->data['Concurso']['bairro_responsavel']);
		$this->data['Concurso']['cidade_responsavel'] 		= utf8_decode($this->data['Concurso']['cidade_responsavel']);
		$this->data['Concurso']['complemento_responsavel'] 	= utf8_decode($this->data['Concurso']['complemento_responsavel']);
		$this->data['Concurso']['orientador_id'] 			= utf8_decode($this->data['Concurso']['orientador_id']);
	}

}
