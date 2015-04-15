<?php
class ConfigsController extends AppController {
	var $helpers = array('Html','Ajax','Javascript');
	var $components = array('RequestHandler');
	var $paginate = array(
	        'limit' => 10
	        );

//--------------------------------------------------------------------------------------------------------------------
	
	public function logout() {

	$this->redirect(array('controller' => 'usuarios', 'action' => 'logout'));
    }

//--------------------------------------------------------------------------------------------------------------------
    public function index() {
	if($this->Auth->user('username') == 'diogoc@studiovisual.com.br'){
		$this->set('tipo_usuario', $this->Auth->user('tipo'));
		$this->set('email_usuario', $this->Auth->user('username'));
	}else{
		$this->redirect(array('controller' => 'usuarios', 'action' => 'logout'));
	}


    }
//--------------------------------------------------------------------------------------------------------------------
    public function configurarDatas() {
	    if($this->Auth->user('username') == 'diogoc@studiovisual.com.br'){
		    if (!empty($this->request->data)) {
			    if( $this->Config->save($this->data) ){
			    $this->Session->setFlash("Salvo com sucesso",'default', array('class' => 'success'));
		   }else{
			    $this->Session->setFlash('Erro ao salvar!!!');
		   }
		}
	    }else{
		$this->redirect(array('controller' => 'usuarios', 'action' => 'logout'));
	    }
    }

//--------------------------------------------------------------------------------------------------------------------
    public function configurarAcessos() {
	if (!empty($this->request->data) && $this->request->is('post')) {
	    $this->loadModel('Acesso');
	    if ($this->Acesso->save($this->data)) $this->Session->setFlash("Salvo com sucesso", 'default', array('class' => 'success'));
	}
		    // busca um aray com todas as filiais
		    $this->loadModel('Orientador');

		    $filiais = $this->Orientador->find(
			    "list",array(
				    "fields" => array (
						    "Orientador.filial",
						    "Orientador.filial"
				    ),
				    "order"=>"filial ASC",
				    "group" => "filial"
			    )
		    );

		    $this->set(compact("filiais"));

		    // busca um aray com todos usarios administradores
		    $this->loadModel('Usuario');

		    $usuarios = $this->Usuario->find(
			    "list",array(
				    "fields" => array (
						    //"Usuario.usuario_id",
						    "Usuario.username",
						    "Usuario.nome"
				    ),
				    "conditions" => array("tipo" => "administrador"),
				    "order"=>"nome ASC",
				    "group" => "username"
			    )
		    );

		    $this->set(compact("usuarios"));

		    //busca os acessos que ja estao configurados
		    $this->loadModel('Acesso');
		    $this->set('acessos', $this->Acesso->find('all'));

    }

//--------------------------------------------------------------------------------------------------------------------
    public function deletar($id = NULL)	{
       /*if($this->request->is('get')){
	  throw new MethodNotAllowedException('Você não tem permissão para deletar este usuário!');
       }*/
       if($this->Auth->user('username') == 'diogoc@studiovisual.com.br'){
		    $this->loadModel('Acesso');
		    $this->Session->setFlash( $id);
		    if(!$id && $id !== 0){
		       $this->Session->setFlash('ID inválido');
		       $this->redirect(array('action' => 'configurarAcessos'));
		    }

		    if($this->Acesso->delete($id)){
		       $this->Session->setFlash('Acesso deletado','default', array('class' => 'success'));
		       $this->redirect(array('action' => 'configurarAcessos'));
		    }

		    $this->Session->setFlash('Acesso não foi deletado');
		    $this->redirect(array('action' => 'configurarAcessos'));
	    }else{
		$this->redirect(array('controller' => 'usuarios', 'action' => 'logout'));
	    }

    }
//--------------------------------------------------------------------------------------------------------------------
    public function usuariosadmstdio() {
	//funçao pega todos os orientadores da table orientadores e os converte para a table usuarios codificando o cpf
	/*
	$this->loadModel('N_orientador');
	$orientadores = $this->N_orientador->find("all");

	$this->loadModel('N_usuario');

	foreach ($orientadores as $key => $value) {
		    $cpf = trim($value['N_orientador']['cpf']);
		    $nome = trim($value['N_orientador']['orientador']);
		    $id = trim($value['N_orientador']['id']);

		    $this->N_usuario->create();

		    $data['N_usuario']['nome'] = $nome ;
		    $data['N_usuario']['username'] = null;
		    $data['N_usuario']['password'] = AuthComponent::password($cpf);
		    $data['N_usuario']['tipo'] = 'orientador';
		    $data['N_usuario']['ativo'] = 1;

	    if ($this->N_usuario->save($data)) {
		$this->Session->setFlash(__('O Usuário foi salvo', true));
	    } else {
		$this->Session->setFlash(__('O Usuário não foi salvo.Tente novamente.', true));
	    }

	    }//foreach
	    */

    }

    public function usuariosadmstdio2() {
	$this->loadModel('N_orientador');
	$coordenadores = $this->N_orientador->find("all", array(
		"fields" => array(
		    'N_orientador.id',
		    'N_orientador.coordenador',
		    "SUM(N_orientador.total_alunos) as alunos"
		),
		'group' => 'N_orientador.coordenador'
	    )
	);

	$this->loadModel('N_coordenador');

	foreach ($coordenadores as $key => $value) {

	    $this->N_coordenador->create();

	    $data['N_coordenador']['coordenador'] = $value['N_orientador']['coordenador'] ;
	    $data['N_coordenador']['alunos'] = $value['0']['alunos'];

	    if ($this->N_coordenador->save($data)) {
		echo $data['N_coordenador']['coordenador'] . "Salvo com sucesso";
	    } else {
		echo $data['N_coordenador']['coordenador'] . 'O Usuário não foi salvo.Tente novamente.';
	    }

	}//foreach
    }

}