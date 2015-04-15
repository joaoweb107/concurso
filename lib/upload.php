<?php
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
$upload = uploadImage($_FILES['imagem'],array('jpeg','jpg','png','gif'),'../images/slider/',true,15,,true);
*/

function uploadImage($file,$dir,$allowedExtensions,$gera_nome=false,$caracteres=10, $serialize=false){
	if(isset($file) && is_array($file)){
		$nfile = count($file['name']);
		
		for($i=0;$i<$nfile;$i++){
			if($file['size'][$i] > 0){
				$file_name 		= $file['name'][$i];
				$file_type 		= $file['type'][$i];
				$file_tmp_name 	= $file['tmp_name'][$i];
				$file_error 	= $file['error'][$i];
				$file_size 		= $file['size'][$i];
				
				if (in_array(end(explode(".",strtolower($file_name))),$allowedExtensions)) {
					if($gera_nome){
						$temp = substr(md5(uniqid(time())), 0, $caracteres);
		    			$file_unico = strtolower($temp) . "." . end(explode('.',$file_name));
						$upload = move_uploaded_file($file_tmp_name,$dir.$file_unico);
						$status['sucesso'][] = array(
							'nome' 			=> $file_name,
							'nome_unico'	=> $file_unico,
						);	
					} else {
						$upload = move_uploaded_file($file_tmp_name,$dir.$file_name);
						$status['sucesso'][] = array(
							'nome' 			=> $file_name,
						);
					}					 
				} else {
					$allowedExtensions_txt = '';
					for($t=0;$t<count($allowedExtensions);$t++){
							$allowedExtensions_txt .= $allowedExtensions[$t] . ' | ';
					}
					$status['erro'][] = array(
							'nome' 			=> $file_name,
							'msg_erro'		=> 'A extenção do arquivo não é permitida. Tente novamente com arquivos: | '  .  $allowedExtensions_txt
					);
				}
				
				
				
			}
		}
		if($serialize==true){
			for($i=0;$i<count($status['sucesso']);$i++){
				 $bd[] = $status['sucesso'][$i]['nome_unico']; 
			}
			return serialize($bd);
		} else {
			return $status;	
		}

	
	} else {
		return 'Não é um array';
	}
}

?>