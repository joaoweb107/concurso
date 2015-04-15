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
	    <!-- div class="row"  <?php echo (isset($_GET['selecionadas']))? 'style="display:none"' : "" ?>>
		<div class="col-sm-12">
		    <section class="panel">
				<table id="filtros_admin">
				    <tbody>
				    	<?php echo $this->Form->create('filial');?>
				    	<tr>
							<td>
								<div class="input select"><label for="filial_admin">Filial</label>
									<select name="nome_filial" class="filtro_admin">
										<?php
											foreach ($filiais as $key => $filial_adm){
												//se o usuário selecionar a unidade, ela será referente ao post
												if (!empty($_POST) && $filial_adm == $_POST['nome_filial']) {
													$select = 'selected';
												}else{
													$select = '';
												} 

												echo "<option value='".$filial_adm."' ".$select." >".$filial_adm."</option>";
											}
										?>
									</select>
								</div>				
							</td>
							<td>
								<input type="submit" class="btn btn-info" value="Selecionar" style="margin-top: 23px;">
							</td>
				    	</tr>
				    	<?php echo $this->Form->end();?> 
					</tbody>
				</table>
				<div class="panel-body">
				    <div class="adv-table"></div>
				</div>
		    </section>
		</div>
	    </div -->
		
		

	    <div class="row">
		<div class="col-sm-12">
		    <section class="panel">
			<div class="panel-body">
			<span class="classificacao">Quantidade de histórias</span><br /><br />
				
			<?php
				foreach ($filiais as $key => $filial_adm){

					echo "<b>".$filial_adm."</b><br />"; 

					$pe = 0;
					foreach ($dados0 as $key => $value) { 
						if ($value["Ori"]["filial"] == $filial_adm) {
						$pe++;
						}
					}
					echo "Pré-Escolar: ".$pe."<br />";

					$ef1 = 0;
					foreach ($dados1 as $key => $value) {
						if ($value["Ori"]["filial"] == $filial_adm) { 
						$ef1++;
						}
					}
					echo "EF1: ".$ef1."<br />";

					$ef2 = 0;
					foreach ($dados2 as $key => $value) { 
						if ($value["Ori"]["filial"] == $filial_adm) { 
						$ef2++;
						}
					}
					echo "EF2: ".$ef2."<br />";

					$total = $pe + $ef1 + $ef2;
					echo "<b>Total:</b> ".$total." histórias. <br /><br />";
				}
			?>

			    <!-- div class="adv-table">
				<table  class="display table table-bordered table-striped" id="dynamic-table">
				    <thead>
					<tr>
					    <th>Nome</th>
					    <th>Filial</th>
					    <th>Unidade</th>
					    <th>História</th>
					</tr>
				    </thead>
				    <tbody id="datatable_tbody0">
					<?php if ($_POST) { ?>

						<?php foreach ($dados as $key => $value) { 
							if ($value["Ori"]["filial"] == $_POST["nome_filial"]) { ?>
							<tr>
							    <td><?php echo utf8_encode($value["Concurso"]["nome"]); ?></td>
							    <td><?php echo utf8_encode($value["Ori"]["filial"]); ?></td>
							    <td><?php echo utf8_encode($value["Ori"]["center"]); ?></td>
							    <td><?php echo utf8_encode($value["Concurso"]["frase"]); ?></td>
							</tr>
						<?php } } ?>
					
					<?php } else { ?>

						<?php foreach ($dados as $key => $value) {	?>
							<tr>
							    <td><?php echo utf8_encode($value["Concurso"]["nome"]); ?></td>
							    <td><?php echo utf8_encode($value["Ori"]["filial"]); ?></td>
							    <td><?php echo utf8_encode($value["Ori"]["center"]); ?></td>
							    <td><?php echo utf8_encode($value["Concurso"]["frase"]); ?></td>
							</tr>
						<?php }	?>

					<?php } ?>	
				    </tbody>
				</table>
			    </div -->
			    <div id="div_btn_salvar_frase">
					<a href="home?time'.microtime().'"><button type="button" id="btn_voltar_home" class="btn btn-success">Voltar</button></a>
			    </div>
			</div>
		    </section>
		</div>
	    </div>
	    <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!--right sidebar start-->
    <!--right sidebar end-->
</section>
<!--<?php// echo $this->element('sql_dump'); ?>-->
