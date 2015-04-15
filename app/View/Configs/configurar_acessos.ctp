<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this -> Html -> charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	echo $this -> Html -> meta('icon');

	echo $this -> Html -> css('cake.generic');

	echo $this -> fetch('meta');
	echo $this -> fetch('css');
	echo $this -> fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this -> Html -> link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this -> Session -> flash(); ?>
			<div style="width: 850px; margin: 0 auto;">
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
					        <div class="row">
					            <div class="col-sm-12">
					                <section class="panel">
									<?php	echo $this -> Form -> create("Acesso"); ?>
										<table id="filtros_admin">
											<tr>
												<td>
												<?php echo $this -> Form -> input("filial_id", array('id' => 'filial', "type" => "select", "empty" => "", 'label' => "Filial", 'class' => 'filtro_admin')); ?>
												</td>
												<td>
												<?php echo $this -> Form -> input("usuario_id", array('id' => 'usuario', "type" => "select", "empty" => "", 'label' => "Usuário", 'class' => 'filtro_admin')); ?>
												</td>
												<td>
													<div style="margin-top: 25px;" >
														<?php echo $this -> Form -> submit("Cadastrar Acesso", array("class" => "button", "div" => false)); ?>
														<br style="clear:both;" />
													</div>
												</td>
											</tr>
										</table>
									<?php echo $this -> Form -> end(); ?>
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
							                    <table  class="display table table-bordered table-striped" id="dynamic-table_acessos">
								                    <thead>
									                    <tr>
									                    	<th>Filial</th>
															<th>Usuário</th>
															<th></th>
									                    </tr>
								                    </thead>
													<tbody id="datatable_tbody">
														<?php foreach ($acessos as $key => $value) { ?>
															<tr>
																<td><?php echo utf8_encode($value["Acesso"]["filial_id"]); ?></td>
																<td><?php echo utf8_encode($value["Acesso"]["usuario_id"]); ?></td>
																<td><?php echo $this -> Html -> link('Deletar', array('action' => 'deletar', $value['Acesso']['id']), array('class' => 'btn btn-danger ', 'confirm' => 'Você tem certeza que quer excluir este acesso?')); ?>
																</td>
															</tr>
														<?php } ?>
													</tbody>
							                    </table>
						                    </div>
						                    <!--div id="div_btn_salvar_frase">
												<?php echo (!$disabled && !$salvar_disabled)?  '<a href="#"><button type="button" id="btn_salvar_frase" class="btn btn-success">Salvar</button></a><a href="home?time'.microtime().'"><button type="button" id="btn_voltar_home" class="btn btn-success">Voltar</button></a>' : '<a href="home?time'.microtime().'"><button type="button" id="btn_voltar_home" class="btn btn-success">Voltar</button></a>' ?>
											</div-->
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
			</div>

			<?php echo $this -> fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this -> Html -> link($this -> Html -> image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false)); ?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
