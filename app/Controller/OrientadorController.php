<?php
class OrientadorController extends AppController {
	public function index() {	
		$this->redirect(array("controller"=>"Usuarios","action"=>"login"));
	}
	
//-----------------------------------------------------------------------------------------
	
}