<?php

// Este trecho ira dizer ao cake para carregar o arquvo jquery.js e um arquivo chamado ajax.js
    $this->Html->script(
	    array( 'jquery', 'ajax' ),
	    array( 'inline' => false)
    );

    if(strtotime(date("y-m-d")) >= strtotime(Configure::read('DATA_INICIO_COORDENADOR')) &&
       strtotime(date("y-m-d")) <= strtotime(Configure::read('DATA_FIM_COORDENADOR'))){
		$disabled = 0;
	} else {
		    $disabled = 1;
	}
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
	    <div class="row"  <?php echo (isset($_GET['selecionadas']))? 'style="display:none"' : "" ?>>
	    </div>
	    <div class="row">
		<div class="col-sm-12">
		    <section class="panel">
			<div class="panel-body">
			    <div class="adv-table">
				<span class='classificacao'><?php echo $classificacao; ?></span><br />
				<span>Escolha as 3 melhores histórias dessa categoria e clique no botão SALVAR.</span><br /><br />
				<table  class="display table table-bordered table-striped">
				    <thead>
					<tr>
					    <th>Regional</th>
					    <th>História</th>
					    <th>Selecionar História</th>
					</tr>
				    </thead>
				    <tbody id="datatable_tbody0">
						<?php (empty($dados))? $salvar_disabled = TRUE : $salvar_disabled = FALSE;?>

						<?php if (count($regional) > 1 ) { ?>

							<p>"Não esqueça de selecionar a REGIONAL antes de realizar a sua Apuração. Lembre-se que deverá escolher 3 histórias por categoria, dando um total de 9 histórias POR REGIONAL".</p>

							<div class="users form">
							<?php echo $this->Form->create('regional');?>
							    <fieldset>
									Selecione aqui a REGIONAL:
									<select name="nome_regional">

									<?php
										foreach ($regional as $key => $regional_coordenador){
											//se o usuário selecionar a unidade, ela será referente ao post
											if (!empty($_POST) && $regional_coordenador == $_POST['nome_regional']) {
												$select = 'selected';
											}else{
												$select = '';
											} 

											echo "<option value='".$regional_coordenador."' ".$select." >".$regional_coordenador."</option>";
										}
									?>
									</select>

									<input type="submit" class="btn btn-info" value="Selecionar">

							    </fieldset>
							<?php echo $this->Form->end();?> 
							</div>

						<?php } ?>
						<br />
						<?php
						//ordena o array para listar conforme o select
						rsort($regional);
						foreach ($regional as $key => $regional_coordenador);

						foreach ($dados as $key => $dado) { 

							//se o usuário selecionar a unidade, ela será referente ao post
							if ($_POST) {
								$regional_coordenador = $_POST['nome_regional'];
							}

							if ($dado['regional'] == $regional_coordenador) {?>
							
								<tr>
						    		<td><?php echo utf8_encode($dado["regional"]); ?></td>
						    		<td><?php echo utf8_encode($dado["frase"]); ?></td>
						    		<td class="center hidden-phone">
						    			<input type="checkbox" class="seleciona_melhor_coordenador icheckbox_minimal-green" value="<?php echo $dado["id"]?>" <?php echo ($disabled)? 'style="display: none;"' : '' ?> <?php echo ($dado["melhor_coordenador"])? 'checked' : '' ?>/>
										<span id="melhor_admin<?php echo $dado["id"]?>">
											<?php echo (!$dado["melhor_coordenador"] && $disabled)? 'Escolha não disponível' : '' ?>
										</span>
										<?php echo ($dado["melhor_coordenador"] && $disabled)? '<span class="melhor_orientador">&nbsp;<span>' : '' ?>
						    		</td>
								</tr>

					<?php   }	};	 ?>
				    </tbody>
				</table>
			    </div>
			    <div id="div_btn_salvar_frase">
								<?php echo (!$disabled && !$salvar_disabled)?  '<a href="#"><button type="button" id="btn_salvar_frase" class="btn btn-success">Salvar</button></a><a href="home?time'.microtime().'"><button type="button" id="btn_voltar_home" class="btn btn-success">Voltar</button></a>' : '<a href="home?time'.microtime().'"><button type="button" id="btn_voltar_home" class="btn btn-success">Voltar</button></a>' ?>
				<!---->
			    </div>
			</div>
		    </section>
		</div>
	    </div>
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
<!--<?php// echo $this->element('sql_dump'); ?>-->
