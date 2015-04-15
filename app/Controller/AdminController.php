<?php
class AdminController extends AppController {
	public function index() {
		if (!$this->Auth->user()) {
            $this->redirect(array("controller"=>"Usuarios","action"=>"loginAdmin"));
        } else {
            $this->redirect(array("controller"=>"Concursos","action"=>"home"));
        }
	}
}