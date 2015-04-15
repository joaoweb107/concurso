<?php
// Este trecho ira dizer ao cake para carregar o arquvo jquery.js e um arquivo chamado ajax.js
	$this->Html->script( 
		array( 'jquery', 'ajax' ),
		array( 'inline' => false) 
	);
	
	if(strtotime(date("y-m-d")) >= strtotime(Configure::read('DATA_INICIO_ADMINISTRADOR_SELECIONADAS')) &&
	   strtotime(date("y-m-d")) <= strtotime(Configure::read('DATA_FIM_ADMINISTRADOR_SELECIONADAS'))){
		 	$disabled = 0;	
		}else{
			$disabled = 1;
		}
//echo '<pre>';		print_r($dados1);die(); echo '</pre>';		
?>

<section id="container" >
	<!--header start-->
	<!--header end-->
	<aside>
	<!-- Aqui estava a barra lateral -->
	</aside>
	<!--sidebar end-->
    <!--main content start-->
    <section id="main-content" class="merge-left">
    	<section class="wrapper">
        <!-- page start -->
	        <?php for ($i=0; $i < 3; $i++) { 
	        		$classificacao = 'classificacao'.$i;	
					$dados = 'dados'.$i;
	        ?>
	        <div class="row">
	            <div class="col-sm-12">
	                <section class="panel">	                   	
	                    <div class="panel-body">
		                    <div class="adv-table">
		                    	<span class='classificacao'><?php echo $$classificacao; ?></span>
			                    <table  class="display table table-bordered table-striped" id="dynamic-table<?php echo $i;?>">
				                    <thead>
					                    <tr>
											<th>Nome</th>
											<th>Filial</th>
											<th>Unidade</th>
											<th>História</th>											
											<th>Selecionar História</th>											
					                    </tr>
				                    </thead>
									<tbody id="datatable_tbody<?php echo $i;?>">										
										<?php foreach ($$dados as $key => $value) {	?>
											<tr>		
												<td><?php echo utf8_encode($value["Concurso"]["nome"]); ?></td>
												<td><?php echo utf8_encode($value["Orientador"]["filial"]); ?></td>
												<td><?php echo utf8_encode($value["Orientador"]["center"]); ?></td>
												<td><?php echo utf8_encode($value["Concurso"]["frase"]); ?></td>
												<td class="center hidden-phone">							
													<input type="checkbox" class="seleciona_melhor_admin icheckbox_minimal-green" value="<?php echo $value["Concurso"]["id"]?>" <?php echo ($disabled)? 'style="display: none;"' : '' ?> <?php echo ($value["Concurso"]["melhor_admin"])? 'checked' : '' ?>/>
													<span id="melhor_admin<?php echo $value["Concurso"]["id"]?>"><?php echo (!$value["Concurso"]["melhor_admin"] && $disabled)? 'Escolha não disponível' : '' ?><?php echo ($value["Concurso"]["melhor_admin"])? '' : '' ?></span>
													<?php echo ($value["Concurso"]["melhor_admin"] && $disabled)? '<span class="melhor_orientador">&nbsp;<span>' : '' ?>
												</td>												
											</tr>
										<?php }	?>
									</tbody>
			                    </table>
		                    </div>		                    
		                    <div id="div_btn_salvar_frase" <?php echo ($i < 2)? 'style="display:none"' : "" ?>>
								<?php echo (!$disabled)? '<a href="#"><button type="button" id="btn_salvar_frase" class="btn btn-success">Salvar</button></a><a href="home?time'.microtime().'"><button type="button" id="btn_voltar_home" class="btn btn-success">Voltar</button></a>' : '<a href="home?time'.microtime().'"><button type="button" id="btn_voltar_home" class="btn btn-success">Voltar</button></a>' ?>								
							</div>
	                    </div>
	                </section>
	            </div>
	        </div>
	        <?php } ?>	        
        <!-- page end-->
        </section>
    </section>
    <!-- MODAL -->
	<div id="dialog-confirm" title="História não selecionada!" style="text-align: center">
	  	<p>Você ainda não selecionou nenhuma história. Deseja continuar?</p>
	</div>
	
	<div id="dialog-confirm2" title="História salva!" style="text-align: center">
	  	<p>As histórias foram salvas com sucesso!<br /> Obrigado por participar da apuração do Concurso Cultural Kumon!</p>
	</div>
	<div id="dialog-confirm3" title="História salva!" style="text-align: center">
	  	<p>A história foi salva com sucesso!<br /> Obrigado por participar da apuração do Concurso Cultural Kumon!</p>
	</div>
	<!-- END MODAL -->
    <!--main content end-->
	<!--right sidebar start-->
	<!--right sidebar end-->
</section>
</body>
