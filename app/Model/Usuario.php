<?php
class Usuario extends AppModel {
    public $name = 'Usuario';
    public $primaryKey = 'usuario_id';
    
    function beforeSave($data = array()){
        $this->data['Usuario']['password'] = AuthComponent::password($this->data['Usuario']['password']);
        return true;
    }
}
?>