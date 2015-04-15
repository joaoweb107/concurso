<?php
class UsuariosController extends AppController {
    public $helpers = array('Html', 'Form');
    public $name = 'Usuarios';

     public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','logout','addUsuarioStudio', 'add', 'participe');
		//$this->Auth->logout();
    }

    public function login() {
      	if ($this->request->is('post')) {
            if (empty($this->data['Usuario']['username'])){
            	$results = $this->Usuario->find('all', array(
                    	'conditions' => array('Usuario.password' => AuthComponent::password($this->data['Usuario']['password'])),
                	)
                );
                $userData = $results[0]['Usuario'];
                $userData['nome'] = utf8_encode($userData['nome']);
                $userData['termos'] = (empty($userData['termos'])) ? "1" : $userData['termos'];
                if($this->Auth->login($userData)) {
                	if ($results[0]['Usuario']['ativo'] == 0) {
	                    // User has not confirmed account
	                    $this->Session->setFlash('<div class="error-message">Conta inativa espere o contato do administrador!</div>', 'default', array(), 'login');
	                    $this->Auth->logout();
	                }
	                if ($results[0]['Usuario']['ativo'] == 1) {
	                    // User is active
	                    if ($results[0]['Usuario']['tipo'] == 'orientador'){
	                    	$this->redirect(array('controller' => 'concursos', 'action' => 'home'));
					    }else if ($results[0]['Usuario']['tipo'] == 'administrador'){
			                $this->redirect(array('controller' => 'concursos', 'action' => 'home'));
					    }else if ($results[0]['Usuario']['tipo'] == 'lider'){
			                $this->redirect(array('controller' => 'concursos', 'action' => 'home'));
					    }else if ($results[0]['Usuario']['tipo'] == 'coordenador'){
			                $this->redirect(array('controller' => 'concursos', 'action' => 'home'));
					    }
	                }
                } else {
					$this->Session->setFlash('<div class="error-message">Senha digitada está inválida</div>', 'default', array(), 'login');
					$this->redirect(array('controller' => 'usuarios', 'action' => 'login'));
                }
            } else if ($this->Auth->login()) {
                $results = $this->Usuario->find('all', array(
                    'conditions' => array('Usuario.username' => $this->Auth->user('username')),
                    	'fields' => array('Usuario.ativo','Usuario.tipo','Usuario.termos','Usuario.usuario_id')
                	)
                );
                if ($results[0]['Usuario']['ativo'] == 0) {
                    // User has not confirmed account
                    $this->Session->setFlash('<div class="error-message">Conta inativa espere o contato do administrador!</div>', 'default', array(), 'login');
                    $this->Auth->logout();
                }
                if ($results[0]['Usuario']['ativo'] == 1) {
                    // User is active
                    if ($results[0]['Usuario']['tipo'] == 'orientador'){
                    	$this->redirect($this->Auth->redirect());
				    }else if ($results[0]['Usuario']['tipo'] == 'administrador'){
		                $this->redirect(array('controller' => 'concursos', 'action' => 'home'));
				    }else if ($results[0]['Usuario']['tipo'] == 'coordenador'){
		                $this->redirect(array('controller' => 'concursos', 'action' => 'home'));
				    }
                }
            } else {
			    $this->Session->setFlash('<div class="error-message">Usuário e/ou senha invalidos</div>', 'default', array(), 'login');
			    $this->redirect(array('controller' => 'usuarios', 'action' => 'loginAdmin'));
            }
        }
    }

    public function loginAdmin() {

	}


    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function addUsuarioStudio()	{
	if($this->Auth->user('username') != 'diogoc@studiovisual.com.br' && $this->Auth->user('username') != 'soliveira@studiovisual.com.br') $this->redirect(array('controller' => 'concursos', 'action' => 'index'));
	if($this->request->is('post')){
		if ($this->Usuario->save($this->data)) {
		    $this->Session->setFlash(__('O Usuário foi salvo', true),'default', array('class' => 'success'));
		} else {
		    $this->Session->setFlash(__('O Usuário não foi salvo.Tente novamente.' , true));
		}
	}

    }

	public function add()	{
/*		$this->loadModel('Orientador');
        $orientadores = $this->Orientador->find('all');

		foreach ($orientadores as $key => $value) {
			$cpf = trim($value['Orientador']['cpf']);
			$nome = trim($value['Orientador']['orientador']);
			$id = trim($value['Orientador']['id']);

			$this->Usuario->create();
	        $data['Usuario']['id'] = $id ;
			$data['Usuario']['nome'] = $nome ;
	        $data['Usuario']['username'] = $cpf.'@'.$cpf;
			$data['Usuario']['password'] = $cpf;//AuthComponent::password($cpf);
			$data['Usuario']['tipo'] = 'orientador';
			$data['Usuario']['ativo'] = 1;

	        if ($this->Usuario->save($data)) {
	            $this->Session->setFlash(__('O Usuário foi salvo', true));
	        } else {
	            $this->Session->setFlash(__('O Usuário não foi salvo.Tente novamente.', true));
	        }

		}//foreach


	*/
/*
				$this->Usuario->create();
				$data['Usuario']['username'] = 'null';
				$data['Usuario']['tipo'] = 'orientador';
				$data['Usuario']['ativo'] = 1;
				$data['Usuario']['password'] = 7774267735;
				$data['Usuario']['nome'] =	'LILIAN DIETRICH';
				if ($this->Usuario->save($data)) {
				$this->Session->setFlash(__('O Usuário foi salvo', true));
				} else {
				$this->Session->setFlash(__('O Usuário não foi salvo.Tente novamente.' , true));
				}
		*/
				}
}
			?>