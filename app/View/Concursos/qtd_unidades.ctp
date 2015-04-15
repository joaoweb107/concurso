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
	    <div class="row">
		<div class="col-sm-12">
		    <section class="panel">
				<div class="panel-body">
					<div class="adv-table">
						<span class="classificacao">Quantidade de histórias por unidade</span><br />
						<br />
						<style type="text/css">
							.unidade_qtd {
								background: #F1F2F7;
								padding: 10px 0 10px 20px;
								margin: 20px 0 20px 0;
							}
						</style>

						<table  class="display table table-bordered table-striped" id="dynamic-table3">
						    <thead>
							<tr>
							    <th>Filial</th>
							    <th>Unidade</th>
							    <th>PRÉ</th>
							    <th>EF1</th>
							    <th>EF2</th>
							    <th>Total</th>
							</tr>
						    </thead>
						    <tbody id="datatable_tbody3">
							
								<?php
								
								foreach ($filiais as $key => $filial_adm){
									//echo "<div class='unidade_qtd'>";
									//echo "<b style='color: red; font-size: 28px;'>FILIAL ".$filial_adm."</b><br /><br />";
									$total_filial = 0;
									$total = 0;
									foreach ($filial_unidade[$filial_adm] as $key => $unidade_adm){
										echo "<tr>";

										echo "<td>".$filial_adm."</td>";

										echo "<td>".$unidade_adm."</td>";

										$pe = 0;
										foreach ($dados0 as $key => $value) { 
											if ($value["Ori"]["center"] == $unidade_adm and $value["Ori"]["filial"]== $filial_adm) {
											$pe++;
											}
										}
										echo "<td>".$pe."</td>";

										$ef1 = 0;
										foreach ($dados1 as $key => $value) {
											if ($value["Ori"]["center"] == $unidade_adm and $value["Ori"]["filial"]== $filial_adm) { 
											$ef1++;
											}
										}
										echo "<td>".$ef1."</td>";

										$ef2 = 0;
										foreach ($dados2 as $key => $value) { 
											if ($value["Ori"]["center"] == $unidade_adm and $value["Ori"]["filial"]== $filial_adm) { 
											$ef2++;
											}
										}
										echo "<td>".$ef2."</td>";

										$total = $pe + $ef1 + $ef2;
										//echo "<b>Total:</b> ".$total." histórias. <br /><br />";
										//$total_filial = $total_filial + $total;

										echo "<td>".$total."</td>";

										echo "</tr>";
									}
									//echo "<b style='color: red; font-size: 16px;'>Total de histórias da filial ".$filial_adm.": ".$total_filial.".</b><br /><br />";
									//echo "</div>";

								}

								?>
						    </tbody>
						</table>
					</div>
				    <div id="div_btn_salvar_frase">
						<a href="<?php echo "home?time".microtime(); ?>" ><button type="button" id="btn_voltar_home" class="btn btn-success">Voltar</button></a>
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