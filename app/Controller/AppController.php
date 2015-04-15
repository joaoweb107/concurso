<?php
App::uses('Controller', 'Controller');
App::uses('ConnectionManager', 'Concurso');
class AppController extends Controller {

    public $helpers = array('Html', 'Form', 'Minify.Minify');
    public $components = array('Session', 'Cookie', 'Auth' => array(
            'loginRedirect' => array('controller' => 'concursos', 'action' => 'home'),
            'logoutRedirect' => array('controller' => 'concursos', 'action' => 'index'),
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'username','password' => 'password')
                )
            )
        )
    );

    public function beforeFilter() {
        $this->loadModel("Config");
        $datas = $this->Config->find("all",
                array(
                    'conditions' => array('Config.id'=> 1)
                    )
                );
        // as datas devem ter o padrao ANO-MES-DIA
        //datas de exibiçao do formulario de cadastro das frases
        Configure::write('DATA_INICIO', $datas[0]['Config']['data_inicial_concurso']);
        Configure::write('DATA_FIM', $datas[0]['Config']['data_final_concurso']);

        // datas para o ORIENTADOR selecionar as melhores frases
        Configure::write('DATA_INICIO_ORIENTADOR', $datas[0]['Config']['data_inicial_orientadores']);
        Configure::write('DATA_FIM_ORIENTADOR', $datas[0]['Config']['data_final_orientadores']);

        // datas para o COORDENADOR selecionar as melhores frases
        Configure::write('DATA_INICIO_COORDENADOR', $datas[0]['Config']['data_inicial_coordenadores']);
        Configure::write('DATA_FIM_COORDENADOR', $datas[0]['Config']['data_final_coordenadores']);

        // datas para o COORDENADOR selecionar as melhores frases
        Configure::write('DATA_INICIO_LIDER', $datas[0]['Config']['data_inicial_lideres']);
        Configure::write('DATA_FIM_LIDER', $datas[0]['Config']['data_final_lideres']);

        // datas para o ADMINISTRADOR selecionar as melhores frases
        Configure::write('DATA_INICIO_ADMINISTRADOR', $datas[0]['Config']['data_inicial_primeira_escolha_administradores']);
        Configure::write('DATA_FIM_ADMINISTRADOR', $datas[0]['Config']['data_final_primeira_escolha_administradores']);

        // datas para o ADMINISTRADOR selecionar as melhores frases dentre todas as selecionadas
        Configure::write('DATA_INICIO_ADMINISTRADOR_SELECIONADAS', $datas[0]['Config']['data_inicial_refinamento_administradores']);
        Configure::write('DATA_FIM_ADMINISTRADOR_SELECIONADAS', $datas[0]['Config']['data_final_refinamento_administradores']);

        // datas para o ADMINISTRADOR DAR NOTA as melhores frases
        Configure::write('DATA_INICIO_ADMINISTRADOR_NOTA', $datas[0]['Config']['data_inicial_atribuicao_notas']);
        Configure::write('DATA_FIM_ADMINISTRADOR_NOTA', $datas[0]['Config']['data_final_atribuicao_notas']);

        // datas para o ADMINISTRADOR VER AS MEDIAS DAS NOTAS das melhores frases
        Configure::write('DATA_INICIO_ADMINISTRADOR_VER_NOTA', $datas[0]['Config']['data_inicial_lista_final_frases']);
        Configure::write('DATA_FIM_ADMINISTRADOR_VER_NOTA', $datas[0]['Config']['data_final_lista_final_frases']);

        // datas para o ADMINISTRADOR VER a porcentagem dos alunos por coordenador
        Configure::write('DATA_INICIO_ADMINISTRADOR_VER_COORDENADORES', $datas[0]['Config']['data_inicial_lista_final_coordenadores']);
        Configure::write('DATA_FIM_ADMINISTRADOR_VER_COORDENADORES', $datas[0]['Config']['data_final_lista_final_coordenadores']);

        $this->Auth->authenticate = array(
            AuthComponent::ALL => array('userModel' => 'Usuario'),
            'Form',
            'Basic',
        );

        $this->Auth->allow('index', 'view', 'sucesso', 'getCidades', 'getUnidades', 'getOrientador','loginAdmin','ajaxValidaEmailCpfCadastrado','modelarOrientador',
		'participe','premios','oQueE','comoFunciona','regulamento');
        if (!$this->Auth->user()) {
            $this->set('logado',0);
        } else {
            $this->set('logado',1);
        }
    }
}

function pre($array=array()){
    print '<pre class="pre">';
        print_r($array);
    print '</pre>';
}
/**
* UPLOAD DE IMAGENS
* @name uploadImage
* @access public
* @example uploadImage($file,$dir,$allowedExtensions, $gera_nome=false, $caracteres=10,$serialize=false)
* @param array $file array postado pelo formulario
* @param string $dir diretorio onde salvar as imagens no servidor
* @param array $allowedExtensions, tipos de arquivos permitidos
* @param borleano $gera_nome gerar nome único, padrão falso
* @param inteiro $caracteres quantidade de caracteres caso seja setado nome unico
* @param borleano $serialize alterar o retorno em serial ou array, padrao array
* Em caso de erro e retornado uma mensagem de erro
*/
/*
function uploadImage($file,$dir,$gera_nome=false, $caracteres=10,$allowedExtensions, $serialize=false){
    if(isset($file) && is_array($file)){
        $nfile = 1;

        for($i=0;$i<$nfile;$i++){
            if($file['size'] > 0){
                $file_name      = $file['name'];
                $file_type      = $file['type'];
                $file_tmp_name  = $file['tmp_name'];
                $file_error     = $file['error'];
                $file_size      = $file['size'];

                if (in_array(end(explode(".",strtolower($file_name))),$allowedExtensions)) {
                    if($gera_nome){
                        $temp = substr(md5(uniqid(time())), 0, $caracteres);
                        $file_unico = strtolower($temp) . "." . end(explode('.',$file_name));
                        $upload = move_uploaded_file($file_tmp_name,$dir.$file_unico);
                        $status[] = array(
                            'nome'          => $file_name,
                            'nome_unico'    => $file_unico,
                        );
                    } else {
                        $upload = move_uploaded_file($file_tmp_name,$dir.$file_name);
                        $status[] = array(
                            'nome'          => $file_name,
                        );
                    }
                } else {
                    $allowedExtensions_txt = '';
                    for($t=0;$t<count($allowedExtensions);$t++){
                            $allowedExtensions_txt .= $allowedExtensions[$t] . ' | ';
                    }
                    $status['erro'][] = array(
                            'nome'          => $file_name,
                            'msg_erro'      => 'A extenção do arquivo não é permitida. Tente novamente com arquivos: | '  .  $allowedExtensions_txt
                    );
                }
            }
        }
        if($serialize==true){
            for($i=0;$i<count($status);$i++){
                 $bd[] = $status[$i]['nome_unico'];
            }
            return serialize($bd);
        } else {
            if(isset($status)) {
                return $status;
            } else {
				$status[0]['nome_unico'] = "";
                return $status;
            }
        }
    } else {
        return 'Não é um array';
    }

}
*/