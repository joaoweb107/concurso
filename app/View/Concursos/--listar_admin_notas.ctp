<?php
// Este trecho ira dizer ao cake para carregar o arquvo jquery.js e um arquivo chamado ajax.js
	$this->Html->script(
		array( 'jquery', 'ajax' ),
		array( 'inline' => false)
	);

?>

<section id="container_listar_nota" >
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
			                    <table  class="display table table-bordered table-striped" id="dynamic-table<?php echo $i?>">
				                    <thead>
					                    <tr>
											<th>Nome</th>
											<th>Filial</th>
											<th>Unidade</th>
											<th>História</th>
											<th>Avaliação</th>
					                    </tr>
				                    </thead>
									<tbody id="datatable_tbody0">
										<?php foreach ($avaliadas as $key2 => $value2) { ?>
											<?php foreach ($$dados as $key => $value) {	?>
												<?php if($value["Concurso"]["id"] == $value2["Nota"]["frase_id"]){	  ?>
													<tr>
														<td>
															<a class="link_aluno" href="#<?php echo utf8_encode($value["Concurso"]["id"]); ?>" rel="facebox">
																<?php echo utf8_encode($value["Concurso"]["nome"]); ?>
															</a>
														</td>
														<td><?php echo utf8_encode($value["Orientador"]["filial"]); ?></td>
														<td><?php echo utf8_encode($value["Orientador"]["center"]); ?></td>
														<td><?php echo utf8_encode($value["Concurso"]["frase"]); ?></td>
														<td><?php echo substr($value2[0]['AVG(`Nota`.`nota`)'],0,4);?>		<input type="hidden" value="<?php echo $value["Concurso"]["id"];?>"/></td>
													</tr>

													<div id="<?php echo utf8_encode($value["Concurso"]["id"]); ?>" title="Dados do Aluno!" class="" style="display:none;">
														<div class="form_vencedores">
															<span id="nome"><?php echo utf8_encode($value["Concurso"]["nome"]); ?></span>
															<span id="email"><?php echo utf8_encode($value["Concurso"]["email"]); ?></span>
															<span id="data_nascimento"><?php echo utf8_encode($value["Concurso"]["data_nascimento"]); ?></span>

															<span id="nome_responsavel"><?php echo utf8_encode($value["Concurso"]["nome_responsavel"]); ?></span>
															<span id="email_responsavel"><?php echo utf8_encode($value["Concurso"]["email_responsavel"]); ?></span>
															<span id="data_nascimento_responsavel"><?php echo utf8_encode($value["Concurso"]["data_nascimento_responsavel"]); ?></span>
															<span id="cpf_responsavel"><?php echo utf8_encode($value["Concurso"]["cpf_responsavel"]); ?></span>
															<span id="telefone_responsavel"><?php echo utf8_encode($value["Concurso"]["telefone_responsavel"]); ?></span>

															<span id="cep_responsavel"><?php echo utf8_encode($value["Concurso"]["cep_responsavel"]); ?></span>
															<span id="estado_responsavel"><?php echo utf8_encode($value["Concurso"]["estado_responsavel"]); ?></span>
															<span id="endereco_responsavel"><?php echo utf8_encode($value["Concurso"]["endereco_responsavel"]); ?></span>
															<span id="numero_responsavel"><?php echo utf8_encode($value["Concurso"]["numero_responsavel"]); ?></span>
															<span id="bairro_responsavel"><?php echo utf8_encode($value["Concurso"]["bairro_responsavel"]); ?></span>
															<span id="cidade_responsavel"><?php echo utf8_encode($value["Concurso"]["cidade_responsavel"]); ?></span>

															<span id="estadoU"><?php echo utf8_encode($value["Concurso"]["estado"]); ?></span>
															<span id="cidadeU"><?php echo utf8_encode($value["Concurso"]["cidade"]); ?></span>
															<span id="unidade"><?php echo utf8_encode($value["Concurso"]["unidade"]); ?></span>
															<span id="orientador"><?php echo utf8_encode($value["Concurso"]["orientador"]); ?></span>

															<span id="frase"><?php echo utf8_encode($value["Concurso"]["frase"]); ?></span>

														</div>
													</div>
													<?php break; ?>
												<?php } ?>
											<?php } ?>
										<?php }	?>
									</tbody>
			                    </table>
		                    </div>
		                    <div id="div_btn_salvar_frase" <?php echo ($i < 2)? 'style="display:none"' : "" ?>>
								<a href="home?time'<?php echo microtime();?>"><button type="button" id="btn_voltar_home" class="btn btn-success">Voltar</button></a>
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
	<!-- END MODAL -->
    <!--main content end-->
	<!--right sidebar start-->
	<!--right sidebar end-->
</section>
