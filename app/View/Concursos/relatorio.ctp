<?php
// Este trecho ira dizer ao cake para carregar o arquvo jquery.js e um arquivo chamado ajax.js
$this->Html->script( array( 'jquery', 'ajax' ),
					array( 'inline' => false) 
				);
?>
<style type="text/css">
	/* pelo fato de alguns coordenadores não possuirem quantidade de alunos, escondemos o erro de divisão por zero */
	.cake-error {
		display: none !important;
	}
</style>
<body id="bg_listar">
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
				<!-- page start-->			
				<div class="row">
					<div class="col-sm-12">
						<section class="panel">				
							<div class="panel-body">								
								<div class="adv-table">								
									<table  class="display table table-bordered table-striped" id="relatorio_coordenadores">									
										<thead>
											<tr>									
												<th>Coordenador</th>									
												<th>Total de Alunos</th>
												<th>Total de Inscritos</th>
												<th>%</th>
											</tr>
										</thead>
										<tbody id="relatorio_coordenadores">										
											<?php foreach ($total as $key => $value) { ?>											
												<tr>											
													<td><?php echo utf8_encode($value["nome"]); ?></td>
													<td><?php echo utf8_encode($value["alunos"]); ?></td>
													<td><?php echo utf8_encode($value["frases"]); ?></td>												
													<td><?php echo number_format($value["porcento"], 2, '.', ' '); ?></td>	
												</tr>
											<?php } ?>
										</tbody>
									</table>								
								</div>
								<div id="div_btn_salvar_frase">									
									<?php echo '<a href="home?time'.microtime().'"><button type="button" id="btn_voltar_home" class="btn btn-success">Voltar</button></a>' ?>									
								</div> 
							</div>
						</section>
					</div>
				</div>			
				<!-- page end-->
			</section>
		</section>
		<!-- dialog  -->
		<div id="dialog-confirm" title="História não selecionada!">
		  	<p>Sua história predileta ainda não foi selecionada, deseja continuar?</p>
		</div>
		
		<div id="dialog-confirm2" title="Salvo com sucesso!">
		  	<p>Sua escolha da melhor história foi salva com sucesso!!!</p>
		</div>
		
		<div id="dialog-confirm3" title="História selecionada com sucesso!">
		  	<p style="text-align: center">O prazo para escolher a melhor história por categoria é até 26 de maio de 2014.
			<br />Obrigado!</p>
		</div>
		<?php //echo $this->element('sql_dump'); ?>
		
		<!-- dialog  -->
	</section>
</body>