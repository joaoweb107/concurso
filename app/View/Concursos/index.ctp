<?php
echo $this->Html->script(array('ajax'));
echo $this->Html->css(array('jquery-ui'	));
$participe = false;
if(strtotime(date("y-m-d")) >= strtotime(Configure::read('DATA_INICIO')) && strtotime(date("y-m-d")) <= strtotime(Configure::read('DATA_FIM'))){
	$participe = true;
}
?>
<div id="article" class="home">
	<div class="center">
		<div>
			<div class="concurso_cultural_3"></div>
			<div class="frase"></div>
			<div class="inscricao">
				<span class="azul small">Não fique fora dessa!</span><br />
				<span class="cinza"><strong>Inscrições</strong> de <strong>21/01/15</strong> a <strong>20/03/15</strong></span><br />
				<span class="azul"><a <?php echo (!$participe) ? 'rel="facebox" href="#denied_participe"' : 'href="participe"'; ?> >Participe!</a></span>
			</div>
		</div>
	</div>
</div>
<div id="aviso" title="Aviso!"></div>
