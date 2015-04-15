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

			<div style="width: 750px; margin: 0 auto;">

			<?php echo $this->Form->create("Config"); ?>
					<fieldset>
						<label><label>*</label>Etapa Cadastramento de Frases pelos alunos</label>
						<div class="row_form">
							<?php echo $this -> Form -> input("id", array('type' => "hidden", "value" => 1)); ?>
							<?php echo $this -> Form -> input("data_inicial_concurso", array('label' => "Data inicial:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_INICIO'))); ?>
							<?php echo $this -> Form -> input("data_final_concurso", array('label' => "Data final:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_FIM'))); ?>
						</div>
					</fieldset>
					<fieldset>
						<label><label>*</label>Etapa Orientadores</label>
						<div class="row_form">
							<?php echo $this -> Form -> input("data_inicial_orientadores", array('label' => "Data inicial:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_INICIO_ORIENTADOR'))); ?>
							<?php echo $this -> Form -> input("data_final_orientadores", array('label' => "Data final:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_FIM_ORIENTADOR'))); ?>
						</div>
					</fieldset>
					<fieldset>
						<label><label>*</label>Etapa Coordenadores</label>
						<div class="row_form">
							<?php echo $this -> Form -> input("data_inicial_coordenadores", array('label' => "Data inicial:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_INICIO_COORDENADOR'))); ?>
							<?php echo $this -> Form -> input("data_final_coordenadores", array('label' => "Data final:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_FIM_COORDENADOR'))); ?>
						</div>
					</fieldset>
					<fieldset>
						<label><label>*</label>Etapa Líderes</label>
						<div class="row_form">
							<?php echo $this -> Form -> input("data_inicial_lideres", array('label' => "Data inicial:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_INICIO_LIDER'))); ?>
							<?php echo $this -> Form -> input("data_final_lideres", array('label' => "Data final:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_FIM_LIDER'))); ?>
						</div>
					</fieldset>
					<fieldset>
						<label><label>*</label>Etapa de escolha das canditadas à melhores frases pelos Administradores</label>
						<div class="row_form">
							<?php echo $this -> Form -> input("data_inicial_primeira_escolha_administradores", array('label' => "Data inicial:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_INICIO_ADMINISTRADOR'))); ?>
							<?php echo $this -> Form -> input("data_final_primeira_escolha_administradores", array('label' => "Data final:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_FIM_ADMINISTRADOR'))); ?>
						</div>
					</fieldset>
					<fieldset>
						<label><label>*</label>Etapa de refinamento da escolha das canditadas à melhores frases pelos Administradores</label>
						<div class="row_form">
							<?php echo $this -> Form -> input("data_inicial_refinamento_administradores", array('label' => "Data inicial:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_INICIO_ADMINISTRADOR_SELECIONADAS'))); ?>
							<?php echo $this -> Form -> input("data_final_refinamento_administradores", array('label' => "Data final:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_FIM_ADMINISTRADOR_SELECIONADAS'))); ?>
						</div>
					</fieldset>
					<fieldset>
						<label><label>*</label>Etapa de atribuiçao de notas pelos Administradores</label>
						<div class="row_form">
							<?php echo $this -> Form -> input("data_inicial_atribuicao_notas", array('label' => "Data inicial:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_INICIO_ADMINISTRADOR_NOTA'))); ?>
							<?php echo $this -> Form -> input("data_final_atribuicao_notas", array('label' => "Data final:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_FIM_ADMINISTRADOR_NOTA'))); ?>
						</div>
					</fieldset>
					<fieldset>
						<label><label>*</label>Etapa da listagem final das frases, vista pelos Administradores</label>
						<div class="row_form">
							<?php echo $this -> Form -> input("data_inicial_lista_final_frases", array('label' => "Data inicial:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_INICIO_ADMINISTRADOR_VER_NOTA'))); ?>
							<?php echo $this -> Form -> input("data_final_lista_final_frases", array('label' => "Data final:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_FIM_ADMINISTRADOR_VER_NOTA'))); ?>
						</div>
					</fieldset>
					<fieldset>
						<label><label>*</label>Etapa da listagem final da porcentagem de alunos por coordenador, vista pelos Administradores</label>
						<div class="row_form">
							<?php echo $this -> Form -> input("data_inicial_lista_final_coordenadores", array('label' => "Data inicial:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_INICIO_ADMINISTRADOR_VER_COORDENADORES'))); ?>
							<?php echo $this -> Form -> input("data_final_lista_final_coordenadores", array('label' => "Data final:", 'dateFormat' => 'DMY', 'selected' => Configure::read('DATA_FIM_ADMINISTRADOR_VER_COORDENADORES'))); ?>
						</div>
					</fieldset>
					<div class="row_form normal">
						<?php echo $this -> Form -> submit("Enviar", array("class" => "button", "div" => false)); ?>
						<br style="clear:both;" />
					</div>

				<?php echo $this -> Form -> end(); ?>

				<?php echo $this -> Js -> writeBuffer(); ?>
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