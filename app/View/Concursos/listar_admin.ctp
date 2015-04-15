<?php
echo date("y-m-d")." >= ".Configure::read('DATA_INICIO_ADMINISTRADOR')."<br />";
echo date("y-m-d")." >= ".Configure::read('DATA_FIM_ADMINISTRADOR')."<br />";
// Este trecho ira dizer ao cake para carregar o arquvo jquery.js e um arquivo chamado ajax.js
	$this->Html->script(
		array( 'jquery', 'ajax' ),
		array( 'inline' => false)
	);

	if(strtotime(date("y-m-d")) >= strtotime(Configure::read('DATA_INICIO_ADMINISTRADOR')) &&
	   strtotime(date("y-m-d")) <= strtotime(Configure::read('DATA_FIM_ADMINISTRADOR'))){
		 	$disabled = 0;
		}else{
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
		<div class="col-sm-12">
		    <section class="panel">
			<table id="filtros_admin">
			    <tr>
				<td>
								<?php
								echo $this->Form->input("filial_id",array(
										'id'=>'filial_admin',
										"type" => "select",
										"empty" => "",
										'label'=>"Filial",
										'class'=>'filtro_admin',
										//'disabled' => true
										)
									);
								?>
				</td>
				<td>
								<?php
								echo $this->Form->input("unidade",array(
										'id'=>'unidade_admin',
										"type" => "select",
										"empty" => "",
										'label'=>"Unidade",
										'class'=>'filtro_admin',
										'disabled' => true
										)
									);
								?>
				</td>
			    </tr>
			</table>
			<div class="panel-body">
			    <div class="adv-table">    </div>
			</div>
		    </section>
		</div>
	    </div>
	    <div class="row">
		<div class="col-sm-12">
		    <section class="panel">
			<div class="panel-body">
			    <div class="adv-table">
				<span class='classificacao'><?php echo $classificacao; ?></span>
				<table  class="display table table-bordered table-striped" id="dynamic-table0">
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
					<?php (empty($dados))? $salvar_disabled = TRUE : $salvar_disabled = FALSE;

						foreach ($dados as $key => $value) {
							$exibir =0;

							foreach ($avaliadas as $key2 => $value2) { 
								($value["Concurso"]["id"] == $value2["Nota"]["frase_id"])? $exibir = $value2["Nota"]["nota"] : '' ;
							} 
					?>
					<tr>
					    <td><?php echo utf8_encode($value["Concurso"]["nome"]); ?></td>
					    <td><?php echo utf8_encode($value["Ori"]["filial"]); ?></td>
					    <td><?php echo utf8_encode($value["Ori"]["center"]); ?></td>
					    <td><?php echo utf8_encode($value["Concurso"]["frase"]); ?></td>
						<td>
							<div class="">
								<div class="classificacao_estrela" data-average="5" data-id="<?php echo $value["Concurso"]["id"]; ?>">
									<input id="<?php echo $value["Concurso"]["id"];?>" class="hidden_nota" type="hidden" value="<?php echo $exibir;?>"/>
								</div>
							</div>
						</td>
					</tr>
					<?php }	?>
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
