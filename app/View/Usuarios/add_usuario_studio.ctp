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
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    </head>
    <body>
	<div id="container">
	    <div id="header">
		<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
	    </div>
	    <div id="content">
		<?php echo $this->Session->flash(); ?>
		<div style="width: 500px; margin: 0 auto;">
		    <br /><br /><br /><br /><br /><br />
		    <?php echo $this->Form->create("Usuario",array('inputDefaults' => array('div' => false),"class"=>"form_concurso"));?>
		    <fieldset>
			<div class="row_form">
			    <?php echo $this->Form->input("nome",array('label'=>"NOME:", 'class' => 'large form-control m-bot15', 'placeholder'=>'Nome completo')); ?>
			</div>
			<div class="row_form">
			    <span>Caso seja um usuario Orientador, Coordenador ou Lider o email deve ser a palavra null</span>
			    <?php echo $this->Form->input("username",array('label'=>"E-MAIL:", 'class' => 'large form-control m-bot15', 'placeholder'=>'E-mail')); ?>
			</div>
			<div class="row_form">
			    <?php echo $this->Form->input("password",array('type' => 'SENHA', 'label'=>"Senha", 'class' => 'large form-control m-bot15', 'placeholder'=>'Nome completo')); ?>
			</div>
			<div class="row_form">
			    <?php $options = array('orientador' => 'Orientador', 'administrador' => 'Administrador','coordenador' => 'Coordenador', 'lider' => 'Líder');
					    $attributes = array('legend' => false);
					    echo $this->Form->radio('tipo', $options, $attributes); ?>
			</div>
			<div class="row_form">
			    <?php echo $this->Form->input("ativo",array('type' => 'hidden', 'class' => 'large form-control m-bot15','value' => 1)); ?>
			</div>
			<div class="row_form normal">
			    <?php echo $this->Form->submit("Enviar", array("class"=>"button", "div"=> false)); ?>
			</div>
		    </fieldset>
		<?php echo $this->Form->end();	?>
		</div>

			<?php echo $this->fetch('content'); ?>
	    </div>
	    <div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
	    </div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
    </body>
</html>