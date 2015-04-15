<?php

class ConcursosController extends AppController {

    var $helpers = array('Html', 'Ajax', 'Javascript');
    var $components = array('RequestHandler');
    var $paginate = array(
	'limit' => 10
    );

//--------------------------------------------------------------------------------------------------------------------
    public function sucesso() {
	// pagina de sucesso quando é cadastrada uma frase
    }
//--------------------------------------------------------------------------------------------------------------------

    public function modelarOrientador() {
    	/*$result_orientadores = $this->Concurso->query("SELECT * FROM orientadores GROUP BY orientador");

    	foreach ($result_orientadores as $key => $orientador) {
    		$this->Concurso->query("UPDATE usuarios SET cpf = '".$orientador['orientadores']['cpf']."', password = '".AuthComponent::password($orientador['orientadores']['cpf'])."' WHERE nome = '".$orientador['orientadores']['orientador']."'");
    	}*/


    	/*$result_testes = $this->Concurso->query("SELECT * FROM teste GROUP BY coordenador");
    	foreach ($result_testes as $key => $teste) {
    		echo "Coordenador: ".$teste['teste']['coordenador']."; Regional: ".$teste['teste']['regional']."<br />";
    		$cpf = (!empty(trim($teste['teste']['cpf_coordenador']))) ? preg_replace("/[^0-9]/", "", $teste['teste']['cpf_coordenador']) : abs(rand(10000000000, 99999999999));
			$this->Concurso->query("INSERT INTO usuarios(nome, password, ativo, tipo, cpf) VALUES('".$teste['teste']['coordenador']."', '".AuthComponent::password($cpf)."', '1', 'coordenador', '".$cpf."')");

    		$result_orientadores = $this->Concurso->query("SELECT * FROM orientadores WHERE regional = '".$teste['teste']['regional']."'");
    		foreach ($result_orientadores as $key => $orientador) {
    			echo "&nbsp;&nbsp;&nbsp;&nbsp;Orientador: ".$orientador['orientadores']['orientador']."; Coordenador: ".$orientador['orientadores']['coordenador']."; Regional: ".$orientador['orientadores']['regional']."<br />";
    			$this->Concurso->query("UPDATE orientadores SET cpf_coordenador = '".$cpf."' WHERE id = '".$orientador['orientadores']['id']."'");
    		}
    	}*/

    	//$result_lideres = $this->Concurso->query("SELECT * FROM lideres");
    	/*
    	[lideres] => Array (
            [Id] => 462
            [Nome] => BRUNA DE REZENDE OLIVEIRA
            [Email] => BRUNA.OLIVEIRA@KUMON.COM.BR
            [CPF] => 945.554.351-68
            [Filial] => CAMPO GRANDE
            [Cargo] => GERENTE FILIAL
        )
        */
    	/*foreach ($result_lideres as $key => $lider) {
    		$cpf = preg_replace("/[^0-9]/", "", $lider['lideres']['CPF']);
			//$this->Concurso->query("INSERT INTO usuarios(nome, password, ativo, tipo, cpf) VALUES('".$lider['lideres']['Nome']."', '".AuthComponent::password($cpf)."', '1', 'lider', '".$cpf."')");

    		$result_orientadores = $this->Concurso->query("SELECT * FROM orientadores WHERE filial = '".$lider['lideres']['Filial']."'");
    		foreach ($result_orientadores as $key => $orientador) {
    			$this->Concurso->query("UPDATE orientadores SET cpf_lider = '".$cpf."', lider='".$lider['lideres']['Nome']."' WHERE id = '".$orientador['orientadores']['id']."'");
    		}
			echo "<pre>";
    			print_r($result_orientadores);
    		echo "</pre>";
    	}*/
    }

    public function comoFunciona() {
    	$this->set('paralax', true);
    	$this->set('menu_active', 'comofunciona');
    }

    public function premios() {
    	$this->set('paralax', true);
    	$this->set('menu_active', 'premios');
    }
    public function oQueE() {
    	$this->set('paralax', true);
    	$this->set('menu_active', 'oquee');
    }

    public function regulamento() {
    	$this->set('paralax', true);
    	$this->set('menu_active', 'regulamento');
    }
    public function participe() {
    	$this->set('paralax', true);
    	$this->set('menu_active', 'participe');
    	if ($this->request->is('post')) {
		    if ($this->Concurso->save($this->data)) {

				// envia email de confirmaçao de participaçao
				App::uses('CakeEmail', 'Network/Email');
				$Email = new CakeEmail();
				$Email->emailFormat('html');
				$Email->from(array('kumon@kumon.com.br' => 'Concurso Cultural Kumon'));
				$Email->to($this->data['Concurso']['email']);
				$Email->subject('Confirmação – Participação do Concurso Cultural Kumon');
				$Email->send('
					<center>
						<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
							<tr>
								<td>
									<img alt="Concurso cultural" style="border:0 !important; display:block" src="'.Router::url('/', true).'/img/index/email_01.jpg" /> 
								</td>
							</tr>
							<tr>
								<td>
									<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
										<tr>
											<td width="375px">
												<img alt="Concurso cultural" style="border:0 !important; display:block" src="'.Router::url('/', true).'/img/index/email_02.jpg" /> 
											</td>
											<td rowspan="3" width="375px">
												<p style="color:#000000;padding: 0 0 0 35px;font-family: arial;font-size:16px;">
													<i><strong>Olá '.$this->data['Concurso']['nome'].'</strong>,<br /><br />
													Você está participando do Concurso Cultural Kumon.<br />
													O resultado final será publicado  dia 27/04/2015 a partir das 18h.<br /><br />
													<strong>Boa Sorte!</strong><br />
													<strong>Kumon Instituto de Educação</strong><br />
													</i>
												</p>
											</td>
										</tr>
										<tr>
											<td width="375px">
												<img alt="Concurso cultural" style="border:0 !important; display:block" src="'.Router::url('/', true).'/img/index/email_03.jpg" /> 
											</td>
										</tr>
										<tr>
											<td width="375px">
												<img alt="Concurso cultural" style="border:0 !important; display:block" src="'.Router::url('/', true).'/img/index/email_04.jpg" /> 
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<img alt="Concurso cultural" style="border:0 !important; display:block" src="'.Router::url('/', true).'/img/index/email_05.jpg" /> 
								</td>
							</tr>	
						</table>
					</center>
				');


				$Email2 = new CakeEmail();
				$Email2->emailFormat('html');
				$Email2->from(array('kumon@kumon.com.br' => 'Concurso Cultural Kumon'));
				$Email2->to($this->data['Concurso']['email_responsavel']);
				$Email2->subject('Confirmação – Participação do Concurso Cultural Kumon');
				$Email2->send('
					<center>
						<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
							<tr>
								<td>
									<img alt="Concurso cultural" style="border:0 !important; display:block" src="'.Router::url('/', true).'img/index/email_01.jpg" /> 
								</td>
							</tr>
							<tr>
								<td>
									<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
										<tr>
											<td width="375px">
												<img alt="Concurso cultural" style="border:0 !important; display:block" src="'.Router::url('/', true).'img/index/email_02.jpg" /> 
											</td>
											<td rowspan="3" width="375px">
												<p style="color:#000000;padding: 0 0 0 35px;font-family: arial;font-size:16px;">
													<i>
														<strong>Olá '.$this->data['Concurso']['nome_responsavel'].',</strong><br /><br />
														O aluno '.$this->data['Concurso']['nome'].' está participando do Concurso Cultural Kumon.<br /><br />
														O resultado final será publicado  dia 27/04/2015 a partir das 18h.<br /><br />
														<strong>Boa Sorte!</strong><br />
														<strong>Kumon Instituto de Educação</strong><br />
													</i>
												</p>
											</td>
										</tr>
										<tr>
											<td width="375px">
												<img alt="Concurso cultural" style="border:0 !important; display:block" src="'.Router::url('/', true).'img/index/email_03.jpg" /> 
											</td>
										</tr>
										<tr>
											<td width="375px">
												<img alt="Concurso cultural" style="border:0 !important; display:block" src="'.Router::url('/', true).'img/index/email_04.jpg" /> 
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<img alt="Concurso cultural" style="border:0 !important; display:block" src="'.Router::url('/', true).'img/index/email_05.jpg" /> 
								</td>
							</tr>	
						</table>
					</center>
					');
					$this->set('form_send', '1');
		    } else {
				$this->Session->setFlash('Frase não Cadastrada !!!<br />Verifique se todos os campos foram <br />preenchidos corretamente.');
		    }
		}
    }
//--------------------------------------------------------------------------------------------------------------------
    public function relatorio() {
		if ($this->Auth->user('tipo') != 'administrador')
		    $this->redirect(array('controller' => 'concursos', 'action' => 'home'));
		$this->loadModel('Qtde_aluno');
		// busca um aray com todas as unidades
		$coordenadores = $this->Qtde_aluno->find("all", array(
		    'fields' => array(
			'Qtde_aluno.coordenador',
			'Qtde_aluno.filial',
		    ),
		    //"order"=>"coordenador ASC",
		    'group' => 'coordenador',
			)
		);

		$total = array();
		$i = 0;
		foreach ($coordenadores as $coordenador) {
		    $i++;
		    // busca o total de alundo do coordenador OK
		    $total_alunos = $this->Qtde_aluno->find('all', array(
				'fields' => array(
			    	'SUM(Qtde_aluno.alunos) as valor'
				),
				'conditions' => array(
			    	'Qtde_aluno.coordenador' => $coordenador['Qtde_aluno']['coordenador']
				),
			));
		    $total_alunos = $total_alunos[0][0]['valor'];

		    // busca todas as unidades do coordenador OK
		    $unidades = $this->Qtde_aluno->find("all", array(
				'fields' => array(
			    	'Qtde_aluno.center'
				),
				'conditions' => array(
			    	'Qtde_aluno.coordenador' => $coordenador['Qtde_aluno']['coordenador']
				),
				'group' => 'center'
			));

		    // conta todas as frases, não duplicadas, cadastradas na unidade que pertence ao coordenador
		    $count_frases = 0;
		    foreach ($unidades as $unidade) {
			$count_frases += $this->Concurso->find("count", array(
				'joins' => array(
			        array(
			            'table' => 'orientadores',
			            'alias' => 'Ori',
			            'type' => 'INNER',
			            'conditions' => array(
			                'Ori.id = Concurso.orientador_id',
			                'Ori.filial' =>  $coordenador['Qtde_aluno']['filial'],
			            )
			        )
				),
			    'conditions' => array(
				'Ori.center' => $unidade['Qtde_aluno']['center'],
				'OR' => array(
				    array('Concurso.classe' => 0),
				    array('Concurso.classe' => 1),
				    array('Concurso.classe' => 2)
				)
			    ),
			    'group' => 'Concurso.frase,Concurso.nome'
				)
			);
		    }

		    $total[$i]['nome'] = $coordenador['Qtde_aluno']['coordenador'];
		    $total[$i]['frases'] = $count_frases;
		    $total[$i]['alunos'] = $total_alunos;
		    $total[$i]['porcento'] = $count_frases * 100;
		    if($total[$i]['porcento'] != 0) {
				$total[$i]['porcento'] = $total[$i]['porcento'] / $total_alunos;
		    }
		}
		$this->set(compact("total"));
    }

//--------------------------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------------------------
    public function relatorioFilial() {
		if ($this->Auth->user('tipo') != 'administrador')
		    $this->redirect(array('controller' => 'concursos', 'action' => 'home'));
		$this->loadModel('Qtde_aluno');
		// busca um aray com todas as unidades
		$filiais = $this->Qtde_aluno->find("all", array(
		    'fields' => array(
			'Qtde_aluno.filial'
		    ),
		    //"order"=>"coordenador ASC",
		    'group' => 'filial'
			)
		);

		$total = array();
		$i = 0;
		foreach ($filiais as $filial) {
		    $i++;
		    // busca o total de alundo do coordenador OK
		    $total_alunos = $this->Qtde_aluno->find('all', array(
				'fields' => array(
			    	'SUM(Qtde_aluno.alunos) as valor'
				),
				'conditions' => array(
			    	'Qtde_aluno.filial' => $filial['Qtde_aluno']['filial']
				),
			));

		    $total_alunos = $total_alunos[0][0]['valor'];

		    // busca todas as unidades do coordenador OK
		    $unidades = $this->Qtde_aluno->find("all", array(
				'fields' => array(
			    	'Qtde_aluno.center'
				),
				'conditions' => array(
			    	'Qtde_aluno.filial' => $filial['Qtde_aluno']['filial']
				),
				'group' => 'center'
			));

					    // conta todas as frases, não duplicadas, cadastradas na unidade que pertence ao coordenador
		    $count_frases = 0;
		    foreach ($unidades as $unidade) {
			$count_frases += $this->Concurso->find("count", array(
				'joins' => array(
			        array(
			            'table' => 'orientadores',
			            'alias' => 'Ori',
			            'type' => 'INNER',
			            'conditions' => array(
			                'Ori.id = Concurso.orientador_id',
			                'Ori.filial' =>  $filial['Qtde_aluno']['filial'],
			            )
			        )
				),
			    'conditions' => array(
				'Ori.center' => $unidade['Qtde_aluno']['center'],
				'OR' => array(
				    array('Concurso.classe' => 0),
				    array('Concurso.classe' => 1),
				    array('Concurso.classe' => 2)
				)
			    ),
			    'group' => 'Concurso.frase,Concurso.nome'
				)
			);
		    }

		    $total[$i]['nome'] = $filial['Qtde_aluno']['filial'];
		    $total[$i]['frases'] = $count_frases;
		    $total[$i]['alunos'] = $total_alunos;
		    $total[$i]['porcento'] = $count_frases * 100;
		    if($total[$i]['porcento'] != 0) {
				$total[$i]['porcento'] = $total[$i]['porcento'] / $total_alunos;
		    }
		}
		$this->set(compact("total"));
    }

//--------------------------------------------------------------------------------------------------------------------
/*    public function atualizandoOrientador() {
	//busco todos que tem unidade em branco
	$nomes = $this->Concurso->find("all", array(
	    'conditions' => array(
		'Concurso.unidade' => "",
	    ),
	    'order' => 'Concurso.nome',
	    'group' => 'Concurso.nome'
		)
	);

	for ($i = 1; $i < 5; $i++) {

	    $params = 'params' . $i;

	    foreach ($nomes as $key => $value) {
		$params1 = array('Concurso.nome' => $value['Concurso']['nome']);
		$params2 = array('Concurso.email' => $value['Concurso']['email']);
		$params3 = array('Concurso.email_responsavel' => $value['Concurso']['email_responsavel']);
		$params4 = array('Concurso.nome_responsavel' => $value['Concurso']['nome_responsavel']);

		$tudo = $this->Concurso->find("all", array(
		    'conditions' => $$params
			)
		);
		foreach ($tudo as $key => $value2) {
		    if (!empty($value2['Concurso']['unidade'])) {
			echo '<br /><br /><br />Salvei: <br /> '; //.$value2['Concurso']['nome'];
			echo "<pre>";
			print_r($$params);
			echo "</pre>";
			$salvar = $this->Concurso->updateAll(
				array('Concurso.estado' => "'" . $value2['Concurso']['estado'] . "'",
			    'Concurso.cidade' => "'" . $value2['Concurso']['cidade'] . "'",
			    'Concurso.unidade' => "'" . $value2['Concurso']['unidade'] . "'",
			    'Concurso.orientador' => "'" . $value2['Concurso']['orientador'] . "'"), $$params
			);

			if ('Rua Macario Ferreira' == $value2['Concurso']['endereco_responsavel']) {
			    echo '<br />Salvei Rua Macario Ferreira';
			    $salvar = $this->Concurso->updateAll(
				    array('Concurso.estado' => "'" . $value2['Concurso']['estado'] . "'",
				'Concurso.cidade' => "'" . $value2['Concurso']['cidade'] . "'",
				'Concurso.unidade' => "'" . $value2['Concurso']['unidade'] . "'",
				'Concurso.orientador' => "'" . $value2['Concurso']['orientador'] . "'"), array('Concurso.endereco_responsavel' => $value2['Concurso']['endereco_responsavel'])
			    );
			}
		    }
		}
	    }
	}
    }
*/
//--------------------------------------------------------------------------------------------------------------------
    public function logout() {

	$this->redirect(array('controller' => 'usuarios', 'action' => 'logout'));
    }

//--------------------------------------------------------------------------------------------------------------------
    public function contaFrases($classe = null, $filial = null) {

		$count_frases = 0;
		$params_unidade = array();
		$params_classe = array();

		$this->loadModel('Orientador');
		// busca um aray com todas as unidades
		$unidades = $this->Orientador->find(
			"list", array(
		    	"fields" => array(
					"id",
					"center"
		    	),
		    	'conditions' => $filial,
		    	"order" => "center ASC",
		    	'group' => 'center'
			)
		);

		// monta um parametro para consulta a banco com todas as unidades da filial desejada
		foreach ($unidades as $key => $value) {
		    $params_unidade = array_merge(
				$params_unidade, array(
				    array('Ori.center' => $value)
				)
		    );
		}

		// alterado o metodo para que efetue menos consulta ao BD
		// o if abaixo é so pra garantir que continue funcionando as chamadas a funçao antes da correçao
		if ($classe !== 0 && $classe !== 1 && $classe !== 2) {
		    $params_classe = array(
				array(
				    'OR' => array(
					array('Concurso.classe' => 0),
					array('Concurso.classe' => 1),
					array('Concurso.classe' => 2)
				    ),
				    'Concurso.melhor_lider' => '1'
				)
		    );
		} else {
		    $params_classe = array(
				array('Concurso.classe' => $classe,'Concurso.melhor_lider' => '1')
		    );
		}

		$todasFrases = array(
			'joins' => array(
		        array(
		            'table' => 'orientadores',
		            'alias' => 'Ori',
		            'type' => 'INNER',
		            'conditions' => array(
		                'Ori.id = Concurso.orientador_id'
		            )
		        )
			),
		    'conditions' => array(
				'OR' => $params_unidade,
				'AND' => $params_classe
		    ),
		    'group' => 'Concurso.frase, Concurso.nome'
		);
		$count_frases = $this->Concurso->find("count", $todasFrases);

		return $count_frases;
    }

//------------------------------------------------------------------------------------------------------------------------------
    public function home() {
		// verifica o tipo de usuario
		if ($this->Auth->user('tipo') == 'orientador') {

		    // busca o nome da unidade do usuario orientador
		    $this->loadModel('Orientador');
		    $dados = $this->Orientador->find("all",
		    	array(
					'fields' => array( 'center' ),
					'conditions' => array(
			    		'Orientador.cpf' => $this->Auth->user('cpf'),
					),
					'group' => 'center'
			    )
		    );
		    $this->set('unidade', $dados['0']['Orientador']['center']);

		    // verifica se ele selecionou alguma frase como a melhor
		    $dados1 = $this->Concurso->find("count",
		    	array(
		    		'joins' => array(
				        array(
				            'table' => 'orientadores',
				            'alias' => 'Ori',
				            'type' => 'INNER',
				            'conditions' => array(
				                'Ori.id = Concurso.orientador_id'
				            )
				        )
	    			),
					'conditions' => array(
			    		'Ori.orientador' => $this->Auth->user('nome'),
			    		'Concurso.melhor' => 1
					),
			    )
		    );

		    ($dados1 > 0 ) ? $this->set('selecionou', TRUE) : $this->set('selecionou', FALSE);

		    // verifica se ele ja aceito os termos do regulamento
		    $this->loadModel('Usuario');
		    $usuario = $this->Usuario->find("all",
		    	array(
					'fields' => array(
			    		'usuario_id',
			    		'termos'
					),
					'conditions' => array(
			    		'Usuario.nome' => $this->Auth->user('nome')
					)
			    )
		    );
		    $this->set('termos', $usuario[0]['Usuario']['termos']);

		    //verifica quantas frases estao cadastradas na unidade do orientador
		    $numero_frases = $this->Concurso->find("count",
		    	array(
		    		'joins' => array(
				        array(
				            'table' => 'orientadores',
				            'alias' => 'Ori',
				            'type' => 'INNER',
				            'conditions' => array(
				                'Ori.id = Concurso.orientador_id'
				            )
				        )
	    			),
					'conditions' => array(
			    		'Ori.cpf' => $this->Auth->user('cpf')
					),
					'group' => 'Concurso.frase,Concurso.nome'
			    )
		    );
		    $this->set('numero_frases', $numero_frases);

		    // busca um aray com todas as unidades que o orientador tem permissao pra escolher
			$unidade = $this->Orientador->find("list",
				array(
			    	"fields" => array(
						"Orientador.id",
						"Orientador.center"
				    ),
				    'conditions' => array(
						'Orientador.orientador' => $this->Auth->user('nome'),
			    	),
				    "order" => "center ASC",
				    "group" => "center"
				)
			);

			$this->set(compact("unidade"));
			

		} else if($this->Auth->user('tipo') == 'coordenador') {
			$this->loadModel('Orientador');
			$this->loadModel('Usuario');
			
			// Seleciona os orientadores daquele coordenador
		    $orientadores = $this->Orientador->find("all",
		    	array(
					'conditions' => array(
			    		'Orientador.cpf_coordenador' => $this->Auth->user('cpf'),
					),
			    )
		    );
			$orientadoresFind = array();
			foreach ($orientadores as $key => $orientador) {
				$orientadoresFind[] = array(
		    		'Concurso.orientador_id' => $orientador['Orientador']['id']
				);
			}
			$concursos = $this->Concurso->find("count",
		    	array(
					'conditions' => array(
			    		'OR' => $orientadoresFind,
			    		'AND' => array('Concurso.melhor' => '1')
					),
			    )
		    );

			$this->set('numero_melhores_orientadores', $concursos);
			// verifica se ele ja aceito os termos do regulamento
		    $usuario = $this->Usuario->find("all",
		    	array(
					'fields' => array(
			    		'usuario_id',
			    		'termos'
					),
					'conditions' => array(
			    		'Usuario.usuario_id' => $this->Auth->user('usuario_id')
					)
			    )
		    );
		    $this->set('termos', $usuario[0]['Usuario']['termos']);

		    //seleciona a frases do coordenador para fazer a contagem na tela inicial

			$orientadoresFind = array();
			foreach ($orientadores as $key => $orientador) {
				$orientadoresFind[] = array(
		    		'Concurso.orientador_id' => $orientador['Orientador']['id']
				);

				$orientadoresFilhos[$orientador['Orientador']['id']] = $orientador['Orientador'];
			}

			//seleciona somente as frases cujo o orientador setou como melhor
			$concursos = $this->Concurso->find("all",
		    	array(
					'conditions' => array(
			    		'OR' => $orientadoresFind,
					),
					'group' => 'frase'
			    )
		    );
			$dados = array();
			foreach ($concursos as $key => $concurso) {
				$dados[] = array(
					'regional' => $orientadoresFilhos[$concurso['Concurso']['orientador_id']]['regional'],
					'frase' => $concurso['Concurso']['frase'],
					'id' => $concurso['Concurso']['id'],
					'melhor_coordenador' => (($concurso['Concurso']['melhor_coordenador'] == "1") ? true : false)
				);
			}
		
			
			$this->set(compact("dados"));

			//fim seleciona frases

			$this->loadModel('Qtde_aluno');

			/// busca um aray com todas as unidades que o orientador tem permissao pra escolher
			$regional = $this->Qtde_aluno->find("list",
				array(
			    	"fields" => array(
						"Qtde_aluno.regional"
				    ),
				    'conditions' => array(
						'Qtde_aluno.coordenador' => $this->Auth->user('nome'),
			    	),
				    "order" => "regional ASC",
				    "group" => "regional"
				)
			);

			$this->set(compact("regional"));
			
		} else if($this->Auth->user('tipo') == 'lider') {
			$this->loadModel('Orientador');
			$this->loadModel('Usuario');
			
			//Seleciona os coordenadores deste lider
		    $coordenadores = $this->Orientador->find("all",
		    	array(
					'conditions' => array(
			    		'Orientador.cpf_lider' => $this->Auth->user('cpf')
					),
			    )
		    );

			$orientadoresFind = array();
			foreach ($coordenadores as $key => $coordenador) {
				$orientadoresFind[] = array(
		    		'Concurso.orientador_id' => $coordenador['Orientador']['id']
				);
			}
			$concursos = $this->Concurso->find("count",
		    	array(
					'conditions' => array(
			    		'OR' => $orientadoresFind,
			    		'AND' => array('melhor_coordenador' => '1')
					),
			    )
		    );
			$this->set('numero_melhores_orientadores', $concursos);
			// verifica se ele ja aceito os termos do regulamento
		    $usuario = $this->Usuario->find("all",
		    	array(
					'fields' => array(
			    		'usuario_id',
			    		'termos'
					),
					'conditions' => array(
			    		'Usuario.usuario_id' => $this->Auth->user('usuario_id')
					)
			    )
		    );
		    $this->set('termos', $usuario[0]['Usuario']['termos']);


		    //seleciona as frases da filial deste lider

		    //Seleciona os coordenadores deste lider
		    $coordenadores = $this->Orientador->find("all",
		    	array(
					'conditions' => array(
			    		'Orientador.cpf_lider' => $this->Auth->user('cpf')
					),
			    )
		    );

			$orientadoresFind = array();
			foreach ($coordenadores as $key => $coordenador) {
				$orientadoresFind[] = array(
		    		'Concurso.orientador_id' => $coordenador['Orientador']['id']
				);
				$orientadoresFilhos[$coordenador['Orientador']['id']] = $coordenador['Orientador'];
			}

			$this->set(compact("orientadoresFind"));

			$dados = $this->Concurso->find("all",
		    	array(
					'conditions' => array(
			    		'OR' => $orientadoresFind
					),
					'group' => 'frase'
			    )
		    );
			
			$this->set(compact("dados"));

		} else {
		    // se o usuario for administradar
		    $this->set('termos', 1); // termos sao somente para orientadores
		    $filiais = $this->getAcesso(); // busca um array com as filiais que ele tem permissao

		    if (empty($filiais)) { // se o array for vazio é porque o usuario tem acesso total
				//$frases = $this->contaFrases(0) + $this->contaFrases(1) + $this->contaFrases(2);//conta as frases da classe 0 1 2
				$frases = $this->contaFrases(); //conta as frases da classe 0 1 2
				$this->set('total_frases', $frases);
		    } else {

				$frases_filiais = array();
				// busca as filiais que o user tem acesso e faz a contagem de frases
				foreach ($filiais['OR'] as $key => $value) {
				    //$ar = array($value['Orientador.filial'] => $this->contaFrases(0, $value) + $this->contaFrases(1, $value) + $this->contaFrases(2, $value));
				    $ar = array($value['Orientador.filial'] => $this->contaFrases(null, $value));
				    $frases_filiais = array_merge($frases_filiais, $ar);
				}

				$this->set('total_frases_filiais', $frases_filiais);
		    }

		    // verifica se é o marcio
		    if ($this->Auth->user('username') == 'marcio.santos@kumon.com.br') {
				//consulta quantas orientadores selecionaram frases
				/*$numero_orientadores = $this->Concurso->find("count", array(
				    'conditions' => array(
						'Concurso.melhor' => "1"
				    	),
				    'group' => 'Concurso.orientador_id'
					)
				);

				if (empty($numero_orientadores) || $numero_orientadores == '') {
				    $numero_orientadores = 0;
				} else {
				    //consulta quantas frases foram as melhores dos orientadores
				    $numero_melhores_orientadores = $this->Concurso->find("count",
				    	array(
							'conditions' => array(
							    'Concurso.melhor_lider' => "1"
							)
					    )
				    );
				}
				$this->set('numero_orientadores', $numero_orientadores);
				$this->set('numero_melhores_orientadores', $numero_melhores_orientadores);*/

				// consulta quantas frases foram encaminhadas no total
				$frases = $this->contaFrases(); //conta as frases da classe 0 1 2
				//$frases = $this->contaFrases(0) + $this->contaFrases(1) + $this->contaFrases(2);//conta as frases da classe 0 1 2
				$this->set('total_frases', $frases);
		    }


		    $this->loadModel('Concurso');

			/// busca um aray com todas as historias
			$total_cadastradas = $this->Concurso->find("all", array(
			    'fields' => array(
				'Concurso.id'
			    ),
			    //"order"=>"coordenador ASC",
			    'group' => 'frase'
				)
			);

			$this->set(compact("total_cadastradas"));


		}


		$this->set('nome_usuario', $this->Auth->user('nome'));
		$this->set('email_usuario', $this->Auth->user('username'));
		$this->set('tipo_usuario', $this->Auth->user('tipo'));
    }

//--------------------------------------------------------------------------------------------------------------------
    public function index() {
    	$this->set('paralax', true);
    	$this->set('menu_active', 'home');
		
    }

//----------------------------------------------------------------------------------------------------------
    public function ajaxValidaEmailCpfCadastrado() {

	switch ($_GET) {
	    case isset($_GET['email']):
		$busca = $this->Concurso->find("all",
			array(
			    "conditions" => array(
					'Concurso.email' => $_GET['email']
			    ),
			    "group" => "Concurso.email"
			)
		  );
		break;

	    case isset($_GET['email_responsavel']):
		$busca = $this->Concurso->find("all",
			array(
		    	"conditions" => array(
					'Concurso.email_responsavel' => $_GET['email_responsavel']
		    	)
			)
		);
		break;

	    case isset($_GET['cpf_responsavel']):
		$busca = $this->Concurso->find("all",
			array(
		    	"conditions" => array(
					'Concurso.cpf_responsavel' => $_GET['cpf_responsavel']
		    	)
			)
		);
		break;

	    case isset($_GET['frase']):
		$busca = $this->Concurso->find("all",
			array(
		    	"conditions" => array(
					'Concurso.frase' => $_GET['frase']
		    	)
			)
		);
		break;
	}

	// Este atributo armazena o nome do template a ser usado quando a requisicao for feita pelo ajax
	$this->layout = 'ajax';

	// Setando a variavel para ser impressa na view
	$existe[1] = (empty($busca) ? false : true);
	$existe[2] = (empty($busca) ? '' : $busca[0]['Concurso']['email']);
	$this->set(compact("existe"));

    }

//----------------------------------------------------------------------------------------------------------

    public function listar() {
	$dados = $this->Concurso->find("all",
		array(
			'joins' => array(
		        array(
		            'table' => 'orientadores',
		            'alias' => 'Ori',
		            'type' => 'INNER',
		            'conditions' => array(
		                'Ori.id = Concurso.orientador_id'
		            )
		        )
			),
	    	'conditions' => array(
				'Ori.orientador' => $this->Auth->user('nome'),
				'Concurso.classe' => (int) $_GET['classe']
	    	),
	    	'order' => 'nome ASC',
	    	'group' => 'Concurso.frase, Ori.orientador'
		)
	);
	$this->set(compact("dados"));

	switch ($_GET['classe']) {
	    case 0:
		$this->set('classificacao', 'Pré-Escolar');
		break;
	    case 1:
		$this->set('classificacao', 'Fundamental 1');
		break;
	    case 2:
		$this->set('classificacao', 'Fundamental 2');
		break;
	    default:
		$this->set('classificacao', '');
		break;
	}

	$this->set('classe', $_GET['classe']);
	$this->set('nome_usuario', $this->Auth->user('nome'));
	$this->set('tipo_usuario', $this->Auth->user('tipo'));


	//alterações joão 26-01-2015
	$this->loadModel('Orientador');

	// recupera as unidades que o usuario tera acesso
	$params = $this->getAcesso();

	/// busca um aray com todas as unidades que o orientador tem permissao pra escolher
	$unidade = $this->Orientador->find("list",
		array(
	    	"fields" => array(
				"Orientador.id",
				"Orientador.center"
		    ),
		    'conditions' => array(
				'Orientador.orientador' => $this->Auth->user('nome'),
	    	),
		    "order" => "center ASC",
		    "group" => "center"
		)
	);

	$this->set(compact("unidade"));


    }

//-----------------------------------------------------------------------------------------------------------
    // verifica qual é o usuario para limitar o acesso as unidades unidades,
    // @return array com as filiasi que o user tem acesso
    public function getAcesso() {
	$this->loadModel('Acesso');

	//para habilitar o acesso de listar filias para somente alguns usuários, descomente o código e cadastre mais acessos na tabela.
	/*$filiais = $this->Acesso->find("all",
		array(
	    	'conditions' => array(
				'Acesso.usuario_id' => $this->Auth->user('username')
	    	)
		)
	);*/

	$params = array();

	if (!empty($filiais)) {
	    $params = array(
		'OR' => array()
	    );

	    foreach ($filiais as $key => $value) {
			$params['OR'][] = array('Orientador.filial' => $value["Acesso"]["filial_id"]);
	    }
	}
	return $params;

// abaixo o codigo da primeira versao
	/* 		$params = array();

	  if($this->Auth->user('username') == 'diogoc@studiovisual.com.br'){
	  $params =
	  array(
	  'OR' => array(
	    array('Orientador.filial'=> 'CAMPINAS'),
    	    array('Orientador.filial'=> 'CAMPO GRANDE'),
	    array('Orientador.filial'=> 'SALVADOR'),
	    array('Orientador.filial'=> 'BELEM')
	  )
	  );
	  }

*/  }

//----------------------------------------------------------------------------------------------------------
    // funçao que listar para administradores as frases cadastradas
    public function listarAdmin() {
		if ($this->Auth->user('tipo') != 'administrador') {
		    $this->redirect(array('controller' => 'concursos', 'action' => 'home'));
		}

		$dados = array();
		$params = array();
		$this->loadModel('Orientador');

		// verifica qual é a classificaçao a ser listada
		switch ($_GET['classe']) {
		    case 0:
			$this->set('classificacao', 'Pré-Escolar');
			break;
		    case 1:
			$this->set('classificacao', 'Fundamental 1');
			break;
		    case 2:
			$this->set('classificacao', 'Fundamental 2');
			break;
		    default:
			$this->set('classificacao', '');
			break;
		}


		// recupera as filiais que o usuario tera acesso
		$params = $this->getAcesso();


		/// busca um aray com todas as filiais que o admin tem permissao pra ver
		$filiais = $this->Orientador->find("list",
			array(
		    	"fields" => array(
					"Orientador.id",
					"Orientador.filial"
			    ),
			    'conditions' => $params,
			    "order" => "filial ASC",
			    "group" => "filial"
			)
		);

		$this->set(compact("filiais"));

		// busca um aray com todas as unidades	das filiais que o admin tem permissao pra ver
		$unidades = $this->Orientador->find("list",
		    array(
				"fields" => array(
				    "id",
				    "center"
				),
			    'conditions' => $params,
			    "order" => "center ASC",
			    'group' => 'center'
		    )
		);

		foreach ($unidades as $key => $value) {
		    $melhoresFrases = array(
		    	'joins' => array(
			        array(
			            'table' => 'orientadores',
			            'alias' => 'Ori',
			            'type' => 'INNER',
			            'conditions' => array(
			                'Ori.id = Concurso.orientador_id'
			            )
			        )
    			),
				'conditions' => array(
				    'Concurso.melhor_lider' => "1",
				    'Ori.center' => $value,
				    'Concurso.classe' => $_GET['classe']
				),
				'group' => 'Concurso.frase, Concurso.nome',
				'fields' => array('Ori.*', 'Concurso.*')
		    );

		    // verifica se foram escolhidas frases como melhores, se sim adicionas as melhoress, se nao adiciona todas
		    $consulta = $this->Concurso->find("all", $melhoresFrases);
		    if (!empty($consulta)) {
				$dados = array_merge($dados, $consulta);
		    }
		}

		$this->loadModel("Nota");
		$avaliadas = $this->Nota->find("all", array(
		    'conditions' => array(
				'Nota.username' => $this->Auth->user('username'),
		    )
		));
		$this->set(compact("avaliadas"));


		$this->set(compact("dados"));
		$this->set('classe', $_GET['classe']);
		$this->set('nome_usuario', $this->Auth->user('nome'));
		$this->set('tipo_usuario', $this->Auth->user('tipo'));
    }

    //----------------------------------------------------------------------------------------------------------
    // funçao que listar para COORDENADORES as frases cadastradas
    public function listarCoordenador() {
		if ($this->Auth->user('tipo') != 'coordenador') {
		    $this->redirect(array('controller' => 'concursos', 'action' => 'home'));
		}
	
		$dados = array();
		$params = array();
		$this->loadModel('Orientador');
	
		// verifica qual é a classificaçao a ser listada
		switch ($_GET['classe']) {
		    case 0:
				$this->set('classificacao', 'Pré-Escolar');
			break;
		    case 1:
				$this->set('classificacao', 'Fundamental 1');
			break;
		    case 2:
				$this->set('classificacao', 'Fundamental 2');
			break;
		    default:
				$this->set('classificacao', '');
			break;
		}
		
		$this->loadModel('Orientador');
		$this->loadModel('Usuario');
		/*Array (
		    [id] => 4764
		    [filial] => BELEM
		    [center] => ALTAMIRA MARINGA/PA
		    [cpf] => 42787993818
		    [orientador] => LUCAS RAMOS DE OLVIEIRA
		    [cidade] => ALTAMIRA
		    [estado] => PA
		    [coordenador] => 
		    [regional] => INTERIOR DO PARA
		    [total_alunos] => 
		    [usuario_id] => 3087
		    [lider] => 4764
		)*/
		
		// Seleciona os orientadores daquele coordenador
	    $orientadores = $this->Orientador->find("all",
	    	array(
				'conditions' => array(
		    		'Orientador.cpf_coordenador' => $this->Auth->user('cpf'),
				),
		    )
	    );
		/*Array (
		    [0] => Array (
				[Orientador] => Array(
                    [id] => 1
                    [filial] => BELEM
                    [center] => ALTAMIRA MARINGA/PA
                    [cpf] => 33344370278
                    [orientador] => JUDIT AMORIM DA SILVA
                    [cidade] => ALTAMIRA
                    [estado] => PA
                    [coordenador] => 4764
                    [regional] => INTERIOR DO PARA
                    [total_alunos] => 425
                    [usuario_id] => 1593
                    [lider] => 
				)
			)
		)*/
		$orientadoresFind = array();
		foreach ($orientadores as $key => $orientador) {
			$orientadoresFind[] = array(
	    		'Concurso.orientador_id' => $orientador['Orientador']['id']
			);

			$orientadoresFilhos[$orientador['Orientador']['id']] = $orientador['Orientador'];
		}
		$concursos = $this->Concurso->find("all",
	    	array(
				'conditions' => array(
		    		'OR' => $orientadoresFind,
		    		'AND' => array('Concurso.melhor' => "1",'Concurso.classe' => $_GET['classe'])
				),
		    )
	    );
		$dados = array();
		foreach ($concursos as $key => $concurso) {
			$dados[] = array(
				'regional' => $orientadoresFilhos[$concurso['Concurso']['orientador_id']]['regional'],
				'frase' => $concurso['Concurso']['frase'],
				'id' => $concurso['Concurso']['id'],
				'melhor_coordenador' => (($concurso['Concurso']['melhor_coordenador'] == "1") ? true : false)
			);
		}
	
		
		$this->set(compact("dados"));
		$this->set('classe', $_GET['classe']);


		//alterações joão 26-01-2015
		$this->loadModel('Qtde_aluno');

		/// busca um aray com todas as unidades que o coordenador tem permissao pra escolher
		$regional = $this->Qtde_aluno->find("list",
			array(
		    	"fields" => array(
					"Qtde_aluno.regional"
			    ),
			    'conditions' => array(
					'Qtde_aluno.coordenador' => $this->Auth->user('nome'),
		    	),
			    "order" => "regional ASC",
			    "group" => "regional"
			)
		);

		$this->set(compact("regional"));

    }

    public function listarLider() {
		if ($this->Auth->user('tipo') != 'lider') {
		    $this->redirect(array('controller' => 'concursos', 'action' => 'home'));
		}
	
		$dados = array();
		$params = array();
		$this->loadModel('Orientador');
	
		// verifica qual é a classificaçao a ser listada
		switch ($_GET['classe']) {
		    case 0:
				$this->set('classificacao', 'Pré-Escolar');
			break;
		    case 1:
				$this->set('classificacao', 'Fundamental 1');
			break;
		    case 2:
				$this->set('classificacao', 'Fundamental 2');
			break;
		    default:
				$this->set('classificacao', '');
			break;
		}
		
		$this->loadModel('Orientador');
		$this->loadModel('Usuario');
		
		//Seleciona os coordenadores deste lider
	    $coordenadores = $this->Orientador->find("all",
	    	array(
				'conditions' => array(
		    		'Orientador.cpf_lider' => $this->Auth->user('cpf')
				),
		    )
	    );

		$orientadoresFind = array();
		foreach ($coordenadores as $key => $coordenador) {
			$orientadoresFind[] = array(
	    		'Concurso.orientador_id' => $coordenador['Orientador']['id']
			);
			$orientadoresFilhos[$coordenador['Orientador']['id']] = $coordenador['Orientador'];
		}
		$concursos = $this->Concurso->find("all",
	    	array(
				'conditions' => array(
		    		'OR' => $orientadoresFind,
		    		'AND' => array('melhor_coordenador' => '1','classe' => $_GET['classe'])
				),
		    )
	    );
		
		$dados = array();
		foreach ($concursos as $key => $concurso) {
			$dados[] = array(
				'regional' => $orientadoresFilhos[$concurso['Concurso']['orientador_id']]['regional'],
				'frase' => $concurso['Concurso']['frase'],
				'id' => $concurso['Concurso']['id'],
				'melhor_lider' => (($concurso['Concurso']['melhor_lider'] == "1") ? true : false)
			);
		}
		
		$this->set(compact("dados"));
		$this->set('classe', $_GET['classe']);
    }

//----------------------------------------------------------------------------------------------------------
    // funçao que listar para administradores as frases cadastradas
    public function listarAdminSelecionadas() {
	$dados0 = array();
	$dados1 = array();
	$dados2 = array();
	$params = array();
	$this->loadModel('Orientador');

	if ($this->Auth->user('tipo') != 'administrador')
	    $this->redirect(array('controller' => 'concursos', 'action' => 'home'));


	// define qual é a classificaçao a ser listada
	$this->set('classificacao0', 'Pré-Escolares');
	$this->set('classificacao1', 'Fundamental 1');
	$this->set('classificacao2', 'Fundamental 2');


	// verifica qual é o usuario para limitar unidades
	$params = $this->getAcesso();


	$dados0 = array_merge($dados0, $this->Concurso->find("all",
		array(
			'joins' => array(
		        array(
		            'table' => 'orientadores',
		            'alias' => 'Ori',
		            'type' => 'INNER',
		            'conditions' => array(
		                'Ori.id = Concurso.orientador_id'
		            )
		        )
			),
		    'conditions' => array_merge($params, array(
				'Concurso.melhor_admin' => 1,
				'Concurso.classe' => 0
		  	)),
		    'order' => 'Ori.center ASC',
		    'group' => 'Concurso.nome, Concurso.frase'
			)
		)
	);

	$dados1 = array_merge($dados1, $this->Concurso->find("all", array(
		    'joins' => array(
		        array(
		            'table' => 'orientadores',
		            'alias' => 'Ori',
		            'type' => 'INNER',
		            'conditions' => array(
		                'Ori.id = Concurso.orientador_id'
		            )
		        )
			),
		    'conditions' => array_merge($params, array(
				'Concurso.melhor_admin' => 1,
				'Concurso.classe' => 1
		    )),
		    'order' => 'Ori.center ASC',
		    'group' => 'Concurso.nome, Concurso.frase'
			)
		)
	);

	$dados2 = array_merge($dados2, $this->Concurso->find("all", array(
			'joins' => array(
		        array(
		            'table' => 'orientadores',
		            'alias' => 'Ori',
		            'type' => 'INNER',
		            'conditions' => array(
		                'Ori.id = Concurso.orientador_id'
		            )
		        )
			),
		    'conditions' => array_merge($params, array(
				'Concurso.melhor_admin' => 1,
				'Concurso.classe' => 2
		    )),
		    'order' => 'Ori.center ASC',
		    'group' => 'Concurso.nome, Concurso.frase'
			)
		)
	);

	$this->set(compact("dados0"));
	$this->set(compact("dados1"));
	$this->set(compact("dados2"));

	$this->set('nome_usuario', $this->Auth->user('nome'));
	$this->set('tipo_usuario', $this->Auth->user('tipo'));
    }

//----------------------------------------------------------------------------------------------------------
    // funçao que lista para administradores as frases selecionadas como melhores para que os mesmos atribuam notas.
    public function listarAdminParaNota() {
		if ($this->Auth->user('tipo') != 'administrador' ||
			(strtotime(date("y-m-d")) < strtotime(Configure::read('DATA_INICIO_ADMINISTRADOR_NOTA')) ||
			strtotime(date("y-m-d")) > strtotime(Configure::read('DATA_FIM_ADMINISTRADOR_NOTA')))
		)
		
		$this->redirect(array('controller' => 'concursos', 'action' => 'home'));

		$dados0 = array();
		$dados1 = array();
		$dados2 = array();

		$this->loadModel('Orientador');

		// define qual é a classificaçao a ser listada
		$this->set('classificacao0', 'Pré-Escolares');
		$this->set('classificacao1', 'Fundamental 1');
		$this->set('classificacao2', 'Fundamental 2');

		$dados0 = array_merge($dados0, $this->Concurso->find("all", array(
				'joins' => array(
			        array(
			            'table' => 'orientadores',
			            'alias' => 'Ori',
			            'type' => 'INNER',
			            'conditions' => array(
			                'Ori.id = Concurso.orientador_id'
			            )
			        )
				),
			    'conditions' => array(
					'Concurso.melhor_admin' => 1,
					'Concurso.classe' => 0
			    ),
			    'order' => 'Concurso.nome ASC',
			    'group' => 'Concurso.nome, Concurso.frase'
				)
			)
		);



		$dados1 = array_merge($dados1, $this->Concurso->find("all", array(
				'joins' => array(
			        array(
			            'table' => 'orientadores',
			            'alias' => 'Ori',
			            'type' => 'INNER',
			            'conditions' => array(
			                'Ori.id = Concurso.orientador_id'
			            )
			        )
				),
			    'conditions' => array(
					'Concurso.melhor_admin' => 1,
					'Concurso.classe' => 1
			    ),
			    'order' => 'Concurso.nome ASC',
			    'group' => 'Concurso.nome, Concurso.frase'
				)
			)
		);


		$dados2 = array_merge($dados2, $this->Concurso->find("all", array(
				'joins' => array(
			        array(
			            'table' => 'orientadores',
			            'alias' => 'Ori',
			            'type' => 'INNER',
			            'conditions' => array(
			                'Ori.id = Concurso.orientador_id'
			            )
			        )
				),
			    'conditions' => array(
					'Concurso.melhor_admin' => 1,
					'Concurso.classe' => 2
			    ),
			    'order' => 'Concurso.nome ASC',
			    'group' => 'Concurso.nome, Concurso.frase'
				)
			)
		);

		//$this->set('classificacao', $classificacao);
		$this->set(compact("dados0"));
		$this->set(compact("dados1"));
		$this->set(compact("dados2"));

		$this->loadModel("Nota");
		$avaliadas = $this->Nota->find("all", array(
		    'conditions' => array(
				'Nota.username' => $this->Auth->user('username'),
		    )
		));
		$this->set(compact("avaliadas"));


		$this->set('nome_usuario', $this->Auth->user('nome'));
		$this->set('tipo_usuario', $this->Auth->user('tipo'));
    }

//----------------------------------------------------------------------------------------------------------
    // funçao que lista para administradores as frases com a média das notas.
    public function listarAdminNotas0() {
	if ($this->Auth->user('tipo') != 'administrador' ||
		(strtotime(date("y-m-d")) < strtotime(Configure::read('DATA_INICIO_ADMINISTRADOR_VER_NOTA')) ||
		strtotime(date("y-m-d")) > strtotime(Configure::read('DATA_FIM_ADMINISTRADOR_VER_NOTA')))
	)
	    $this->redirect(array('controller' => 'concursos', 'action' => 'home'));

	$dados0 = array();
	$dados1 = array();
	$dados2 = array();
	$params = array();

	$this->loadModel('Orientador');

	// verifica qual é a classificaçao a ser listada
	$this->set('classificacao0', 'Pré-Escolares');
	$this->set('classificacao1', 'Fundamental 1');
	$this->set('classificacao2', 'Fundamental 2');


	$dados0 = array_merge($dados0, $this->Concurso->find("all", array(
			'joins' => array(
		        array(
		            'table' => 'orientadores',
		            'alias' => 'Ori',
		            'type' => 'INNER',
		            'conditions' => array(
		                'Ori.id = Concurso.orientador_id'
		            )
		        )
			),
		    'conditions' => array(
				'Concurso.melhor_lider' => 1,
				'Concurso.classe' => 0
		    ),
		    'order' => 'Concurso.nome ASC',
		    'group' => 'Concurso.nome, Concurso.frase'
			)
		)
	);

	$dados1 = array_merge($dados1, $this->Concurso->find("all", array(
		    'conditions' => array(
			'Concurso.melhor_lider' => 1,
			'Concurso.classe' => 1
		    ),
		    'order' => 'Concurso.nome ASC',
		    'group' => 'Concurso.nome, Concurso.frase'
			)
		)
	);

	$dados2 = array_merge($dados2, $this->Concurso->find("all", array(
		    'conditions' => array(
			'Concurso.melhor_lider' => 1,
			'Concurso.classe' => 2
		    ),
		    'order' => 'Concurso.nome ASC',
		    'group' => 'Concurso.nome, Concurso.frase'
			)
		)
	);


	$this->set(compact("dados0"));
	$this->set(compact("dados1"));
	$this->set(compact("dados2"));

	$this->loadModel("Nota");
	$avaliadas = $this->Nota->find("all", array(
	    "fields" => array(
		"Nota.frase_id",
		"AVG(Nota.nota)"
	    ),
	    'order' => "AVG(Nota.nota) DESC",
	    'group' => 'Nota.frase_id'
		)
	);
	$this->set(compact("avaliadas"));


	$this->set('nome_usuario', $this->Auth->user('nome'));
	$this->set('tipo_usuario', $this->Auth->user('tipo'));
    }

//----------------------------------------------------------------------------------------------------------

    // funçao que lista para administradores as frases com a média das notas.
    public function listarAdminNotas1() {
	if ($this->Auth->user('tipo') != 'administrador' ||
		(strtotime(date("y-m-d")) < strtotime(Configure::read('DATA_INICIO_ADMINISTRADOR_VER_NOTA')) ||
		strtotime(date("y-m-d")) > strtotime(Configure::read('DATA_FIM_ADMINISTRADOR_VER_NOTA')))
	)
	    $this->redirect(array('controller' => 'concursos', 'action' => 'home'));

	$dados1 = array();
	$params = array();

	$this->loadModel('Orientador');

	// verifica qual é a classificaçao a ser listada
	$this->set('classificacao0', 'Pré-Escolares');
	$this->set('classificacao1', 'Fundamental 1');
	$this->set('classificacao2', 'Fundamental 2');

	$dados1 = array_merge($dados1, $this->Concurso->find("all", array(
		    'conditions' => array(
			'Concurso.melhor_lider' => 1,
			'Concurso.classe' => 1
		    ),
		    'order' => 'Concurso.nome ASC',
		    'group' => 'Concurso.nome, Concurso.frase'
			)
		)
	);

	$this->set(compact("dados1"));

	$this->loadModel("Nota");
	$avaliadas = $this->Nota->find("all", array(
	    "fields" => array(
		"Nota.frase_id",
		"AVG(Nota.nota)"
	    ),
	    'order' => "AVG(Nota.nota) DESC",
	    'group' => 'Nota.frase_id'
		)
	);
	$this->set(compact("avaliadas"));


	$this->set('nome_usuario', $this->Auth->user('nome'));
	$this->set('tipo_usuario', $this->Auth->user('tipo'));
    }

//----------------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------------

    // funçao que lista para administradores as frases com a média das notas.
    public function listarAdminNotas2() {
	if ($this->Auth->user('tipo') != 'administrador' ||
		(strtotime(date("y-m-d")) < strtotime(Configure::read('DATA_INICIO_ADMINISTRADOR_VER_NOTA')) ||
		strtotime(date("y-m-d")) > strtotime(Configure::read('DATA_FIM_ADMINISTRADOR_VER_NOTA')))
	)
	    $this->redirect(array('controller' => 'concursos', 'action' => 'home'));

	$dados2 = array();
	$params = array();

	$this->loadModel('Orientador');

	$this->set('classificacao2', 'Fundamental 2');


	$dados2 = array_merge($dados2, $this->Concurso->find("all", array(
		    'conditions' => array(
			'Concurso.melhor_lider' => 1,
			'Concurso.classe' => 2
		    ),
		    'order' => 'Concurso.nome ASC',
		    'group' => 'Concurso.nome, Concurso.frase'
			)
		)
	);

	$this->set(compact("dados2"));

	$this->loadModel("Nota");
	$avaliadas = $this->Nota->find("all", array(
	    "fields" => array(
		"Nota.frase_id",
		"AVG(Nota.nota)"
	    ),
	    'order' => "AVG(Nota.nota) DESC",
	    'group' => 'Nota.frase_id'
		)
	);
	$this->set(compact("avaliadas"));


	$this->set('nome_usuario', $this->Auth->user('nome'));
	$this->set('tipo_usuario', $this->Auth->user('tipo'));
    }

//----------------------------------------------------------------------------------------------------------    

    public function getDadosAdmin() {
		//funçao ajax que cria a tabela conforme o admin seleciona filtros
		// verifica se o periodo de seleçao da melhor frase esta ativo
		if (strtotime(date("y-m-d")) >= strtotime(Configure::read('DATA_INICIO_ADMINISTRADOR')) &&
			strtotime(date("y-m-d")) <= strtotime(Configure::read('DATA_FIM_ADMINISTRADOR'))) {
		    $disabled = 0;
		} else {
		    $disabled = 1;
		}

		// cria a clausula WHERE dependendo das variaveis que vem pelo GET
		$params = array();
		if ($_GET['unidade'] != '')
		    $params = array_merge($params, array('Orientador.center' => $_GET['unidade']));
		if ($_GET['classe'] != '')
		    $params = array_merge($params, array('Concurso.classe' => (int) $_GET['classe']));

		if (isset($_GET['filial']) && $_GET['filial'] != "" && $_GET['unidade'] == '') {
		    // busca um array com todas as unidades caso a unidade nao seja especificada via GET
		    $this->loadModel('Orientador');
		    $unidades = $this->Orientador->find(
			    "list", array(
			"fields" => array(
			    "id",
			    "center"
			),
			'conditions' => array('Orientador.filial' => $_GET['filial']),
			"order" => "center ASC",
			'group' => 'center'
			    )
		    );
		} else {

		    // busca um array com todas as unidades
		  /*  $unidades = $this->Concurso->find(
			    "list", array(
			"fields" => array(
			    "id",
			   // "unidade"
			),
			//'conditions' => $params,
			"order" => "id ASC",
			'group' => 'id'
			    )
		    );*/

		    // busca um array com todas as unidades caso a unidade nao seja especificada via GET
		    $this->loadModel('Orientador');
		    $unidades = $this->Orientador->find(
			    "list", array(
				"fields" => array(
			    "id",
			    "center"
			),
			'conditions' => array('Orientador.center' => $_GET['unidade']),
			"order" => "center ASC",
			'group' => 'center'
			    )
		    );
		}

		$dados = array();
		$quant = 0;
		foreach ($unidades as $key => $value) {
		    // select para as melhres frases
		    $melhoresFrases = array(
			'conditions' => array_merge($params, array(
			    'Orientador.center' => $value,
			    'Concurso.melhor_lider' => 1,
				)
			),
			'order' => 'Concurso.nome ASC',
			'group' => 'Concurso.frase, Concurso.nome'
		    );

			// verifica se foram escolhidas frases como melhores, se sim adicionas as melhoress se nao adiciona todas
		    $numrows = $this->Concurso->find("count", $melhoresFrases);


		    // select para todas as frases
		    $todasFrases = array(
			'conditions' => array_merge($params, array(
			    'Orientador.center' => $value,
			    'Concurso.melhor_lider' => 1,
				)
			),
			'order' => 'Concurso.nome ASC',
			'group' => 'Concurso.frase, Concurso.nome'
		    );

		    if ($numrows >= 1) {
			$dados = array_merge($dados, $this->Concurso->find("all", $melhoresFrases));
			$quant += $this->Concurso->find("count", $melhoresFrases);
		    } else {
			$dados = array_merge($dados, $this->Concurso->find("all", $todasFrases));
			$quant += $this->Concurso->find("count", $todasFrases);
		    }
		}

		$this->loadModel("Nota");
		$username = $this->Auth->user('username');
		// Este atributo armazena o nome do template a ser usado quando a requisicao for feita pelo ajax
		$this->layout = 'ajax';

		$select = '';
		foreach ($dados as $key => $value) {

			$exibir = 0 ;

			$avaliadas = $this->Nota->find("all", array(
			    "fields" =>  array("Nota.nota", "Nota.frase_id" ),
			    'conditions' => array('Nota.frase_id' => $value["Concurso"]["id"], 'Nota.username' => $username ),
			    'order' => "AVG(Nota.nota) DESC",
			    'group' => 'Nota.frase_id'
				)
			);


			foreach ($avaliadas as $key2 => $value2) { 
				($value["Concurso"]["id"] == $value2["Nota"]["frase_id"])? $exibir = $value2["Nota"]["nota"] : '' ;
			}

		    $select .='
				<tr>
				    <td>' . utf8_encode($value["Concurso"]["nome"]) . '</td>
				    <td>' . utf8_encode($value["Orientador"]["filial"]) . '</td>
				    <td>' . utf8_encode($value["Orientador"]["center"]) . '</td>
				    <td>' . utf8_encode($value["Concurso"]["frase"]) . '</td>
				    <td>
						<div class="classificacao_estrela" data-average="5" data-id="'.$value["Concurso"]["id"].'">
							<input id="'.$value["Concurso"]["id"].'" class="hidden_nota" type="hidden" value="'.$exibir.'"/>
						</div>
					</td>
				</tr>
				';
	}


	// Setando a variavel para ser impressa na view get_orientador.ctp
	$this->set('tbody', $select);
	$texto = ($quant == 0) ? 'Nenhum registro encontrado.' : 'Mostrando 1 /' . $quant . ' de ' . $quant . ' história(s)';
	$this->set('quant', $texto);
    }

//----------------------------------------------------------------------------------------------------------

    public function setMelhorFrase() {
		$this->Concurso->id = $_GET['id'];

		if (isset($_GET['melhor_admin'])) {
    		$this->Concurso->saveField('melhor_admin', $_GET['melhor_admin'], array('callbacks' => false, 'validate' => false));
		} elseif (isset($_GET['melhor_coordenador'])) {
    		$this->Concurso->saveField('melhor_coordenador', $_GET['melhor_coordenador']);
		} elseif (isset($_GET['melhor_lider'])) {
    		$this->Concurso->saveField('melhor_lider', $_GET['melhor_lider']);
		} elseif (isset($_GET['melhor'])) {
    		$this->Concurso->saveField('melhor', $_GET['melhor']);
		}
    }

//----------------------------------------------------------------------------------------------------------
/*
	public function index() {

		$data = $this->Concurso->id->find(‘all’);

		$this->set(‘categorias’, $data);

	}  
*/
//----------------------------------------------------------------------------------------------------------

    public function setNota() {

		if (isset($_POST['action'])) {
		    if (htmlentities($_POST['action'], ENT_QUOTES, 'UTF-8') == 'rating') {
				/*
				 * vars
				 */
				$frase_id = intval($_POST['idBox']);
				$nota = floatval($_POST['rate']);
				$username = $this->Auth->user('username');

				// YOUR MYSQL REQUEST HERE or other thing :)
				$this->loadModel("Nota");
				$busca_nota = $this->Nota->find(
					"all", array(
				    'conditions' => array(
					'Nota.username' => $username,
					'Nota.frase_id' => $frase_id
				    ),
					)
				);

				if (empty($busca_nota)) {
				    $this->Nota->create();
				    $data['Nota']['username'] = $username;
				    $data['Nota']['frase_id'] = $frase_id;
				    $data['Nota']['nota'] = $nota;
				} else {
				    $this->Nota->id = $busca_nota[0]['Nota']['id'];
				    $data['Nota']['nota'] = $nota;
				}


				echo $data['Nota']['nota'];
				$rate = $nota;
				$id = $frase_id;
				// json datas send to the js file
				if ($this->Nota->save($data)) {
				    $aResponse['message'] = 'Your rate has been successfuly recorded. Thanks for your rate :)';

				    /* / ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
				      $aResponse['server'] = '<strong>Success answer :</strong> Success : Your rate has been recorded. Thanks for your rate :)<br />';
				      $aResponse['server'] .= '<strong>Rate received :</strong> '.$rate.'<br />';
				      $aResponse['server'] .= '<strong>ID to update :</strong> '.$id;
				      // END ONLY FOR DEMO */

				    echo json_encode($aResponse);
				} else {
				    $aResponse['error'] = true;
				    $aResponse['message'] = 'An error occured during the request. Please retry';

				    // ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
				    $aResponse['server'] = '<strong>ERROR :</strong> Your error if the request crash !';
				    // END ONLY FOR DEMO


				    echo json_encode($aResponse);
				}
		    } else {
				$aResponse['error'] = true;
				$aResponse['message'] = '"action" post data not equal to \'rating\'';

				// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
				$aResponse['server'] = '<strong>ERROR :</strong> "action" post data not equal to \'rating\'';
				// END ONLY FOR DEMO


				echo json_encode($aResponse);
		    }

		} else {
		    $aResponse['error'] = true;
		    $aResponse['message'] = '$_POST[\'action\'] not found';

		    // ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
		    $aResponse['server'] = '<strong>ERROR :</strong> $_POST[\'action\'] not found';
		    // END ONLY FOR DEMO


		    echo json_encode($aResponse);
		}
    }

//----------------------------------------------------------------------------------------------------------

    public function setTermos() {
		$this->loadModel('Usuario');
		$usuario = $this->Usuario->find("all", array(
	    	'fields' => array(
				'usuario_id',
				'termos'
	    	),
	    	'conditions' => array(
				'Usuario.cpf' => $_GET['cpf'],
	    	)
		));

		$this->Usuario->id = $usuario[0]['Usuario']['usuario_id'];
		$this->Usuario->saveField('termos', '1');

		if (isset($_GET['classe'])) {
		    $url = 'listar?classe=' . $_GET['classe'];
		    $this->redirect(array('controller' => 'concursos', 'action' => $url));
		} else {
		    $this->redirect(array('controller' => 'concursos', 'action' => 'home'));
		}
    }

//----------------------------------------------------------------------------------------------------------

    public function getQtdeMelhoresAdmin() {
		$numrows = 0;
		$dados = array();
		$params = $this->getAcesso();
		$this->loadModel('Orientador');
		$unidades = $this->Orientador->find(
			"list", array(
		    "fields" => array(
			"id",
			"center"
		    ),
		    'conditions' => $params,
		    "order" => "center ASC",
		    'group' => 'center'
			)
		);

		foreach ($unidades as $key => $value) {
		    // select para as melhres frases
		    $melhoresFrases = array(
			'conditions' => array(
			    'Concurso.melhor_admin' => 1,
			    'Concurso.classe' => $_GET['classe'],
			    'Concurso.unidade' => $value,
			)
		    );

		    // verifica se foram escolhidas tres frases como melhores, se sim adicionas as melhoress se nao adiciona todas
		    $numrows += $this->Concurso->find("count", $melhoresFrases);
		}
		// Este atributo armazena o nome do template a ser usado quando a requisicao for feita pelo ajax
		$this->layout = 'ajax';

		// Setando a variavel para ser impressa na view get_orientador.ctp
		$this->set('num_checados', $numrows);
    }

//--------------------------------------------------------------------------------------------------------------------
    public function getCidades() {
		$this->loadModel('Orientador');
		$cidades = $this->Orientador->find(
			"list", array(
		    "fields" => array(
			"id",
			"cidade"
		    ),
		    "conditions" => array('Orientador.estado' => $_GET['estado']),
		    "order" => "cidade ASC",
		    'group' => 'cidade'
			)
		);
		$this->set(compact("cidades"));

		// Este atributo armazena o nome do template a ser usado quando a requisicao for feita pelo ajax
		$this->layout = 'ajax';

		$select = '<option value ="">Selecione</option>';
		foreach ($cidades as $key => $value) {
		    $select .='<option value="' . utf8_encode($value) . '">' . utf8_encode($value) . '</option>';
		}

		// Setando a variavel para ser impressa na view get_cidades
		$this->set('cidades', $select);
    }

//--------------------------------------------------------------------------------------------------------------------
    public function getUnidades() {
		$this->loadModel('Orientador');

		//se get[estado] existe é porque a solicitaçao vem do formulario, else vem da listagem do admin
		if (isset($_GET['estado']) && $_GET['estado'] != "")
		    $params = array('Orientador.estado' => $_GET['estado'], 'Orientador.cidade' => $_GET['cidade']);
		elseif (isset($_GET['filial']) && $_GET['filial'] != "")
		    $params = array('Orientador.filial' => $_GET['filial']);

		$unidades = $this->Orientador->find(
			"list", array(
		    "fields" => array(
			"id",
			"center"
		    ),
		    "conditions" => $params,
		    "order" => "center ASC",
		    'group' => 'center'
			)
		);
		$this->set(compact("unidades"));

		// Este atributo armazena o nome do template a ser usado quando a requisicao for feita pelo ajax
		$this->layout = 'ajax';

		$select = '<option value ="">Selecione</option>';
		foreach ($unidades as $key => $value) {
		    $select .='<option value="' . utf8_encode($value) . '">' . utf8_encode($value) . '</option>';
		}

		// Setando a variavel para ser impressa na view get_unidades
		$this->set('unidades', $select);
    }

//-------------------------------------------------------------------------------------------------------------------
    public function getOrientador() {
		$this->loadModel('Orientador');
		$orientador = $this->Orientador->find(
			"list", array(
		    	"fields" => array(
					"id",
					"orientador"
		    	),
		    	"conditions" => array(
					'Orientador.estado' => $_GET['estado'],
					'Orientador.cidade' => $_GET['cidade'],
					'Orientador.center' => $_GET['unidade']
		    	),
		    	"order" => "center ASC",
		    	'group' => 'orientador'
			)
		);
		$this->set(compact("orientador"));

		// Este atributo armazena o nome do template a ser usado quando a requisicao for feita pelo ajax
		$this->layout = 'ajax';

		$select = '<option value="">Selecione</option>';
		foreach ($orientador as $key => $value) {
		    $select .='<option value ="' . $key . '">' . utf8_encode($value) . '</option>';
		}

		// Setando a variavel para ser impressa na view get_orientador.ctp
		$this->set('orientador', $select);
    }




     public function QtdFiliais() {
	if ($this->Auth->user('tipo') != 'administrador') {
		    $this->redirect(array('controller' => 'concursos', 'action' => 'home'));
		}

		$dados0 = array();
		$dados1 = array();
		$dados2 = array();
		$params = array();
		$this->loadModel('Orientador');

		// recupera as filiais que o usuario tera acesso
		$params = $this->getAcesso();


		/// busca um aray com todas as filiais que o admin tem permissao pra ver
		$filiais = $this->Orientador->find("list",
			array(
		    	"fields" => array(
					"Orientador.id",
					"Orientador.filial"
			    ),
			    'conditions' => $params,
			    "order" => "filial ASC",
			    "group" => "filial"
			)
		);

		$this->set(compact("filiais"));

		$filial_unidade = array();

				/// busca um aray com todas as filiais que o admin tem permissao pra ver
		foreach ($filiais as $key => $value) {

			// busca um aray com todas as unidades	das filiais que o admin tem permissao pra ver
			$unidades_adm = $this->Orientador->find("list",
			    array(
					"fields" => array(
					    "Orientador.center",
					),
				    'conditions' => "Orientador.filial = '$value'",
				    "order" => "center ASC",
				    'group' => 'center'
			    )
			);

			$filial_unidade[$value] = $unidades_adm;
		}	

		$this->set(compact("filial_unidade"));

		// busca um aray com todas as unidades	das filiais que o admin tem permissao pra ver
		$unidades = $this->Orientador->find("list",
		    array(
				"fields" => array(
				    "Orientador.id",
				    "Orientador.center",
				),
			    'conditions' => $params,
			    "order" => "center ASC",
			    'group' => 'center'
		    )
		);

		$this->set(compact("unidades"));

		foreach ($unidades as $key => $value) {
		    $melhoresFrases = array(
		    	'joins' => array(
			        array(
			            'table' => 'orientadores',
			            'alias' => 'Ori',
			            'type' => 'INNER',
			            'conditions' => array(
			                'Ori.id = Concurso.orientador_id'
			            )
			        )
    			),
				'conditions' => array(
				    'Ori.center' => $value,
				    'Concurso.classe' => '0'
				),
				'group' => 'Concurso.frase, Concurso.nome',
				'fields' => array('Ori.*', 'Concurso.*')
		    );

		    // verifica se foram escolhidas frases como melhores, se sim adicionas as melhoress, se nao adiciona todas
		    $consulta = $this->Concurso->find("all", $melhoresFrases);
		    if (!empty($consulta)) {
				$dados0 = array_merge($dados0, $consulta);
		    }
		}

		$this->set(compact("dados0"));

		foreach ($unidades as $key => $value) {
		    $melhoresFrases = array(
		    	'joins' => array(
			        array(
			            'table' => 'orientadores',
			            'alias' => 'Ori',
			            'type' => 'INNER',
			            'conditions' => array(
			                'Ori.id = Concurso.orientador_id'
			            )
			        )
    			),
				'conditions' => array(
				    'Ori.center' => $value,
				    'Concurso.classe' => '1'
				),
				'group' => 'Concurso.frase, Concurso.nome',
				'fields' => array('Ori.*', 'Concurso.*')
		    );

		    // verifica se foram escolhidas frases como melhores, se sim adicionas as melhoress, se nao adiciona todas
		    $consulta = $this->Concurso->find("all", $melhoresFrases);
		    if (!empty($consulta)) {
				$dados1 = array_merge($dados1, $consulta);
		    }
		}

		$this->set(compact("dados1"));

		foreach ($unidades as $key => $value) {
		    $melhoresFrases = array(
		    	'joins' => array(
			        array(
			            'table' => 'orientadores',
			            'alias' => 'Ori',
			            'type' => 'INNER',
			            'conditions' => array(
			                'Ori.id = Concurso.orientador_id'
			            )
			        )
    			),
				'conditions' => array(
				    'Ori.center' => $value,
				    'Concurso.classe' => '2'
				),
				'group' => 'Concurso.frase, Concurso.nome',
				'fields' => array('Ori.*', 'Concurso.*')
		    );

		    // verifica se foram escolhidas frases como melhores, se sim adicionas as melhoress, se nao adiciona todas
		    $consulta = $this->Concurso->find("all", $melhoresFrases);
		    if (!empty($consulta)) {
				$dados2 = array_merge($dados2, $consulta);
		    }
		}

		$this->set(compact("dados2"));


		$this->set('nome_usuario', $this->Auth->user('nome'));
		$this->set('tipo_usuario', $this->Auth->user('tipo'));
     }	
//----------------------------------------------------------------------------------------------------------
     public function QtdUnidades() {
     	if ($this->Auth->user('tipo') != 'administrador') {
		    $this->redirect(array('controller' => 'concursos', 'action' => 'home'));
		}

		$dados0 = array();
		$dados1 = array();
		$dados2 = array();
		$params = array();
		$this->loadModel('Orientador');

		// recupera as filiais que o usuario tera acesso
		$params = $this->getAcesso();


		/// busca um aray com todas as filiais que o admin tem permissao pra ver
		$filiais = $this->Orientador->find("list",
			array(
		    	"fields" => array(
					"Orientador.id",
					"Orientador.filial"
			    ),
			    'conditions' => $params,
			    "order" => "filial ASC",
			    "group" => "filial"
			)
		);

		$this->set(compact("filiais"));

		$filial_unidade = array();

				/// busca um aray com todas as filiais que o admin tem permissao pra ver
		foreach ($filiais as $key => $value) {

			// busca um aray com todas as unidades	das filiais que o admin tem permissao pra ver
			$unidades_adm = $this->Orientador->find("list",
			    array(
					"fields" => array(
					    "Orientador.center",
					),
				    'conditions' => "Orientador.filial = '$value'",
				    "order" => "center ASC",
				    'group' => 'center'
			    )
			);

			$filial_unidade[$value] = $unidades_adm;
		}	

		$this->set(compact("filial_unidade"));

		// busca um aray com todas as unidades	das filiais que o admin tem permissao pra ver
		$unidades = $this->Orientador->find("list",
		    array(
				"fields" => array(
				    "Orientador.id",
				    "Orientador.center",
				),
			    'conditions' => $params,
			    "order" => "center ASC",
			    'group' => 'center'
		    )
		);

		$this->set(compact("unidades"));

		foreach ($unidades as $key => $value) {
		    $melhoresFrases = array(
		    	'joins' => array(
			        array(
			            'table' => 'orientadores',
			            'alias' => 'Ori',
			            'type' => 'INNER',
			            'conditions' => array(
			                'Ori.id = Concurso.orientador_id'
			            )
			        )
    			),
				'conditions' => array(
				    'Ori.center' => $value,
				    'Concurso.classe' => '0'
				),
				'group' => 'Concurso.frase, Concurso.nome',
				'fields' => array('Ori.*', 'Concurso.*')
		    );

		    // verifica se foram escolhidas frases como melhores, se sim adicionas as melhoress, se nao adiciona todas
		    $consulta = $this->Concurso->find("all", $melhoresFrases);
		    if (!empty($consulta)) {
				$dados0 = array_merge($dados0, $consulta);
		    }
		}

		$this->set(compact("dados0"));

		foreach ($unidades as $key => $value) {
		    $melhoresFrases = array(
		    	'joins' => array(
			        array(
			            'table' => 'orientadores',
			            'alias' => 'Ori',
			            'type' => 'INNER',
			            'conditions' => array(
			                'Ori.id = Concurso.orientador_id'
			            )
			        )
    			),
				'conditions' => array(
				    'Ori.center' => $value,
				    'Concurso.classe' => '1'
				),
				'group' => 'Concurso.frase, Concurso.nome',
				'fields' => array('Ori.*', 'Concurso.*')
		    );

		    // verifica se foram escolhidas frases como melhores, se sim adicionas as melhoress, se nao adiciona todas
		    $consulta = $this->Concurso->find("all", $melhoresFrases);
		    if (!empty($consulta)) {
				$dados1 = array_merge($dados1, $consulta);
		    }
		}

		$this->set(compact("dados1"));

		foreach ($unidades as $key => $value) {
		    $melhoresFrases = array(
		    	'joins' => array(
			        array(
			            'table' => 'orientadores',
			            'alias' => 'Ori',
			            'type' => 'INNER',
			            'conditions' => array(
			                'Ori.id = Concurso.orientador_id'
			            )
			        )
    			),
				'conditions' => array(
				    'Ori.center' => $value,
				    'Concurso.classe' => '2'
				),
				'group' => 'Concurso.frase, Concurso.nome',
				'fields' => array('Ori.*', 'Concurso.*')
		    );

		    // verifica se foram escolhidas frases como melhores, se sim adicionas as melhoress, se nao adiciona todas
		    $consulta = $this->Concurso->find("all", $melhoresFrases);
		    if (!empty($consulta)) {
				$dados2 = array_merge($dados2, $consulta);
		    }
		}

		$this->set(compact("dados2"));


		$this->set('nome_usuario', $this->Auth->user('nome'));
		$this->set('tipo_usuario', $this->Auth->user('tipo'));
     }	
}
