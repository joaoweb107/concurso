<?php
class PagesController extends AppController {
    
    public $components = array( 'RequestHandler' );
    public $helpers = array('Js');
    public $uses = array( 'Concurso' );
   

    
    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     */
    public function display() 
    {
        $config['limit'] = 10;
        
        if( !$this->request->is( 'ajax' ) ){
            $this->request->params['named']['page'] = 1;
        }
        
        if( isset( $this->request->query['procurar'] ) ){  
            $config['conditions']['and']['Concurso.nome like'] = "%{$this->request->query['procurar']}%";
			$config['conditions']['and']['or']['Concurso.frase like'] = "%{$this->request->query['procurar']}%";
        }
		
		debug($config);
        
        $this->paginate = $config;
        $this->set( 'postagens', $this->paginate('Concurso') );       
    }
}
