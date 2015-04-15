<?php
echo $this->Html->script(array('ajax'));
echo $this->Html->css(array('jquery-ui'	));
$participe = false;
if(strtotime(date("y-m-d")) >= strtotime(Configure::read('DATA_INICIO')) && strtotime(date("y-m-d")) <= strtotime(Configure::read('DATA_FIM'))){
	$participe = true;
}
if($participe) { ?>
<?php //teste verifica data inicial echo Configure::read('DATA_INICIO'); ?>
<?php //teste verifica data final echo Configure::read('DATA_FIM'); ?>
<div id="article" style="height:895px;" class="participeCont">
	<div class="center">
		<div>
			<div class="concurso_cultural_4 "></div>
			<?php if(isset($form_send)) { ?>
				<style>.form_concurso { display:none; }</style>
				<script>
				jQuery(document).ready(function(){
					setTimeout(function() {
					      window.location = "/concursoculturalkumon";
					}, 3000);
				});
				</script>
				<div class="mensagem_envio">
					Sua história foi enviada com sucesso!
				</div>
			<?php } ?>
			<?php
			    echo $this->Form->create("Concurso",array('inputDefaults' => array('div' => false),"class"=>"form_concurso"));?>
			    <fieldset>
				    <label>DADOS DO ALUNO</label>
				    <div class="row_form">
				    	<div class="form_align">
					    	<?php echo $this->Form->input("nome",array('label'=>"NOME:", 'class' => 'Tlarge form-control m-bot15', 'placeholder'=>'Nome completo')); ?>
					    </div>
				    </div>
				    <div class="row_form">
				    	<div class="form_align">
					    	<?php echo $this->Form->input("email",array('label'=>"E-MAIL:", 'class' => 'form-control m-bot15 email_field', 'placeholder'=>'E-mail', 'maxlength' => 100)); ?>
					    </div>
					    <div class="form_align">
					    	<?php echo $this->Form->input("data_nascimento",array('label'=>array('class' => 'secundary-label large','text' => 'NASCIMENTO:'), 'class' => 'secundary-field form-control m-bot15 medium', 'alt' => 'date')); ?>
					    </div>
				    </div>
				    <label>DADOS DO RESPONSÁVEL</label>
				    <div class="row_form">
				    	<div class="form_align">
					    	<?php echo $this->Form->input("nome_responsavel",array('label'=>"Nome:", 'class' => 'form-control m-bot15 Tlarge', 'placeholder'=>'Nome do responsável')); ?>
					   	</div>
				    </div>
				    <div class="row_form">
				    	<div class="form_align">
					    	<?php echo $this->Form->input("email_responsavel",array('type' => 'email', 'label'=>"E-MAIL:", 'class' => 'form-control m-bot15 email_field','placeholder'=>'Email')); ?>
					    </div>
					    <div class="form_align">
					    	<?php echo $this->Form->input("data_nascimento_responsavel",array('label'=>array('class' => 'secundary-label large','text' => 'NASCIMENTO:' ),'class' => 'form-control m-bot15 medium','alt' => 'date')); ?>
				    	</div>
				    </div>
				    <div class="row_form">
				    	<div class="form_align">
					    	<?php echo $this->Form->input("rg_responsavel",array("type" => "hidden","value" => "")); ?>
					    </div>
					    <div class="form_align">
					    	<?php echo $this->Form->input("cpf_responsavel",array('label'=>"CPF:",'class' => 'form-control m-bot15 cpf_field','placeholder'=>'CPF','alt' => 'cpf')); ?>
					    </div>
					    <div class="form_align">
					    	<?php echo $this->Form->input("telefone_responsavel",array('label'=>array('class' => 'secundary-label small','text' => "TEL.:" ),'class' => 'secundary-field form-control m-bot15 tel_field','placeholder'=>'Telefone','alt' => 'phone')); ?>
				    	</div>
				    </div>
				    <label>ENDEREÇO</label>
				    <div class="row_form">
				    	<div class="form_align">
					    	<?php echo $this->Form->input("cep_responsavel",array('label'=>array('class' => 'normal','text' => "CEP:" ), 'class' => 'cep_field form-control m-bot15', 'id' => 'cep', 'placeholder'=>'CEP', 'alt' => 'cep')); ?>
					    </div>
					    <div class="form_align">
					    	<?php echo $this->Form->input("estado_responsavel",array('label'=> array('class' => 'secundary-label','text' => "ESTADO:" ),'class' => 'form-control m-bot15 uf_field', 'id' => 'estado', 'placeholder'=>'UF', 'maxlength' => 2)); ?>
					    </div>
					    <div class="form_align">
					    	<?php echo $this->Form->input("cidade_responsavel",array('label'=>array('class' => 'secundary-label','text' => "CIDADE:" ),'class' => 'form-control m-bot15  cidade_field', 'id' => 'cidade', 'placeholder'=>'Cidade')); ?>
					    </div>
				    </div>
				    <div class="row_form">
				    	<div class="form_align">
					    	<?php echo $this->Form->input("endereco_responsavel",array('label'=>array('class' => 'large','text' => 'ENDEREÇO:'), 'class' => 'form-control m-bot15 large', 'id' => 'endereco', 'placeholder'=>'Endereço')); ?>
				    	</div>
				    </div>
				    <div class="row_form">
				    	<div class="form_align">
				    		<?php echo $this->Form->input("numero_responsavel",array('label'=> array('class' => 'normal','text' => "Nº:" ),'class' => 'form-control m-bot15 numero_field')); ?>
				    	</div>
				    	<div class="form_align">
				    		<?php echo $this->Form->input("complemento_responsavel",array('label'=>array('class' => 'secundary-label','text' => "COMP.:" ),'class' => 'form-control m-bot15 complemento_field', 'placeholder'=>'Complemento')); ?>
				    	</div>
				    	<div class="form_align">
					    	<?php echo $this->Form->input("bairro_responsavel",array('label'=>array('class' => 'secundary-label','text' => "BAIRRO:" ), 'class' => 'form-control m-bot15 bairro_field', 'id' => 'bairro', 'placeholder'=>'Bairro')); ?>
				    	</div>
				    </div>
				    <label>DADOS DA UNIDADE</label>
				    <div class="row_form">
				    <?php echo $this->Form->input("estado",array(
											    "options" => array(
												    'AC' =>'AC',
												    'AL' =>"AL",
												    'AM' => 'AM',
												    'AP' => 'AP',
												    'BA' => 'BA',
												    'CE' => 'CE',
												    'DF' => 'DF',
												    'ES' => 'ES',
												    'GO' => 'GO',
												    'MA' => 'MA',
												    'MG' => 'MG',
												    'MS' => 'MS',
												    'MT' => 'MT',
												    'PA' => 'PA',
												    'PB' => 'PB',
												    'PE' => 'PE',
												    'PI' => 'PI',
												    'PR' => 'PR',
												    'RJ' => 'RJ',
												    'RN' => 'RN',
												    'RO' => 'RO',
												    'RR' => 'RR',
												    'RS' => 'RS',
												    'SC' => 'SC',
												    'SE' => 'SE',
												    'SP' => 'SP',
												    'TO' => 'TO'
											    ),
											    "empty" => "Selecione",
											    "default" =>"Selecione",
											    "selected" =>"Selecione",
											    'label'=>"ESTADO:",
											    'class' => 'form-control m-bot15 estado_field',
											    'div' => true,
											    'div' => array('class' => 'contentSelect')
											    )
										    ); ?>

					    <?php echo $this->Form->input("cidade",array("type" => "select","empty" => "Selecione",'label'=>array('class' => 'secundary-label','text' => "CIDADE:" ),'class' => 'form-control m-bot15 uCidade_field','disabled'=> true,'div' => true,'div' => array('class' => 'contentSelect'))); ?>
					    <br style="clear:both;" />
					    </div>
					    <div class="row_form">
						    <?php echo $this->Form->input("unidade",array("type" => "select","empty" => "Selecione",'label'=>"UNIDADE:",'class' => 'form-control m-bot15 unidade_field','disabled'=> true,'div' => true,'div' => array('class' => 'contentSelect'))); ?>
						    <br style="clear:both;" />
					    </div>
					    <div class="row_form">
						    <?php echo $this->Form->input("orientador_id",array("type" => "select","empty" => "Selecione",'label' => 'ORIENTADOR(a):','class' => 'form-control m-bot15 orientador_field','disabled'=> true,'div' => true,'div' => array('class' => 'contentSelect'))); ?>
						    <br style="clear:both;" />
					    </div>
					    <?php echo $this->Form->input("melhor",array("type" => "hidden","value" => 0)); ?>
				    <div class="row_form normal" style="padding-bottom: 5px;">
					    <p style="padding: 20px 0;margin: 0;"><strong>Escreva sua história abaixo e concorra a prêmios,<br />lembre-se que você só tem 340 caracteres.</strong></p>
				    </div>
				    <p class="textarea_label">COMO O MÉTODO KUMON TE AJUDA HOJE  A TER UM FUTURO MELHOR?</p>
				    <div class="row_form normal">
					    <?php echo $this->Form->textarea('frase', array("maxlength" => "340")); ?>
				    </div>
				    <div class="row_form normal aceitarRegulamentoCont">
				    	<label class="aceitarRegulamento">Estou ciente do <a href="regulamento" style="color: #6ccff6;text-decoration: underline;">regulamento</a> e aceito participar!</label>
					    <?php echo $this->Form->checkbox('termos', array('hiddenField' => false, "style" => "width: auto;display: block;float: left;margin-top: 5px;")); ?>
					    <br style="clear:both;" />
					    <?php echo $this->Form->submit("Enviar", array("class"=>"button", "div"=> false)); ?>
				    </div>
			    </fieldset>
			    <?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
<?php } else { ?>
<div id="article">
	<div class="center">
		<div>
			<div class="concurso_cultural_3"></div>
			<div class="inscricao">
				<span class="azul small">Não fique fora dessa!</span><br />
				<span class="cinza"><strong>Inscrições</strong> de <strong>21/01/15</strong> a <strong>20/03/15</strong></span><br />
				<span class="azul"><a <?php echo ($participe) ? 'rel="facebox" href="#denied_participe"' : 'href="participe"' ?>>Participe!</a></span>

			</div>
			<div class="frase"></div>
		</div>
	</div>
</div>
<?php } ?>
<div id="aviso" title="Aviso!"></div>