<?php
// Este trecho ira dizer ao cake para carregar o arquvo jquery.js e um arquivo chamado ajax.js
$this->Html->script( array( 'jquery', 'ajax' ),
					array( 'inline' => false)
				);

	if(strtotime(date("y-m-d")) >= strtotime(Configure::read('DATA_INICIO_ORIENTADOR')) &&
	   strtotime(date("y-m-d")) <= strtotime(Configure::read('DATA_FIM_ORIENTADOR'))){
 			$disabled = FALSE;
	}else{
			$disabled = TRUE;
}
?>
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
								<span class='classificacao'><?php echo $classificacao; ?>, <span>visualize abaixo as histórias da sua unidade:</span></span><br />
								<span>Escolha as 2 melhores histórias dessa categoria e clique no botão SALVAR.</span><br />
								<div class="adv-table">
									<table  class="display table table-bordered table-striped" id="Orientador_dynamic-table<?php echo $classe; ?>">
										<thead>
											<tr>
												<th>História</th>
												<th>Selecionar História</th>
											</tr>
										</thead>
										<tbody>
											<?php (empty($dados))? $salvar_disabled = TRUE : $salvar_disabled = FALSE;?>
											<br />
											
											<?php 
											//esta informação aparecerá somente para orientadores com mais de uma unidade
											if (count($unidade) > 1) { ?>
												<p>Não esqueça de selecionar a UNIDADE antes de realizar a sua Apuração. Lembre-se que deverá escolher 2 histórias por categoria, dando um total de 6 histórias POR UNIDADE.</p>
												<div class="users form">
													<?php echo $this->Form->create('unidade');?>
													    <fieldset>
															Selecione aqui a UNIDADE: 
															<select name="nome_unidade">
															<?php
																foreach ($unidade as $key => $unidade_orientador) {
																	//se o usuário selecionar a unidade, ela será referente ao post
																	if (!empty($_POST) and $unidade_orientador == $_POST['nome_unidade']) {
																		$select = 'selected';
																	}else{
																		$select = '';
																	} 
																	echo "<option value='".$unidade_orientador."' ".$select." > $unidade_orientador </option>";
																}
															?>
															</select>
															<input type="submit" class="btn btn-info" value="Selecionar">
													    </fieldset>
													<?php echo $this->Form->end();?> 
												</div>
											<?php } ?>	

											<?php 
											//ordena os dados para a primeira listagem aparecer conforme o select
											rsort($unidade);
											foreach ($unidade as $key => $unidade_orientador);

											//ordena os dados das histórias do concurso
											foreach ($dados as $key => $value) {

													//se o usuário selecionar a unidade, ela será referente ao post
													if ($_POST) {
														$unidade_orientador = $_POST['nome_unidade'];
													} 

												if ($value['Orientador']['center'] == $unidade_orientador) {
											 ?>

												<tr>
													<td><?php echo utf8_encode($value["Concurso"]["frase"]); ?></td>
													<td>
														<input type="checkbox" class="seleciona_melhor icheckbox_minimal-green" value="<?php echo $value["Concurso"]["id"]?>" <?php echo ($disabled)? 'style="display:none"' : '' ?> <?php echo ($value["Concurso"]["melhor"])? 'checked' : '' ?>/>
														<span id="melhor<?php echo $value["Concurso"]["id"]?>" class="<?php echo ($value["Concurso"]["melhor"] && $disabled)? 'green' : '' ?>">
															<?php echo (!$value["Concurso"]["melhor"] && $disabled)? 'Escolha não disponível' : '' ?>
															<?php echo ($value["Concurso"]["melhor"] && $disabled)? 'Frase Selecionada' : '' ?>
														</span>
													</td>
												</tr>

											<?php  }  }  ?>
										</tbody>
									</table>
								</div>
								<div id="div_btn_salvar_frase">
									<?php echo (!$disabled && !$salvar_disabled)?  '<a href="#"><button type="button" id="btn_salvar_frase" class="btn btn-success">Salvar</button></a><a href="home?time'.microtime().'"><button type="button" id="btn_voltar_home" class="btn btn-success">Voltar</button></a>' : '<a href="home?time'.microtime().'"><button type="button" id="btn_voltar_home" class="btn btn-success">Voltar</button></a>' ?>
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
		  	<p>Suas histórias prediletas ainda não foram selecionadas, deseja continuar?</p>
		</div>
		<div id="dialog-confirm2" title="Salvo com sucesso!">
		  	<p>Sua escolha das melhores histórias foi salva com sucesso!!!</p>
		</div>
		<div id="dialog-confirm3" title="História selecionada com sucesso!">
		  	<p style="text-align: center">O prazo para escolher as melhores histórias por categoria é até <?php echo date('d/m/Y',strtotime(Configure::read('DATA_FIM_ORIENTADOR'))) ?>.
			<br />Obrigado!</p>
		</div>
		<!-- dialog  -->
	</section>
</body>