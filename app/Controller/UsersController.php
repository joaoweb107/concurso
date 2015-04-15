<?php
class UsersController extends AppController {
    public $name = 'Users';
    
     public function login() {
         $this->redirect(array('controller' => 'usuarios','action' => 'login'));
     }
}
?>