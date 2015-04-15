<?php
$participe = false;
if(strtotime(date("y-m-d")) >= strtotime(Configure::read('DATA_INICIO')) && strtotime(date("y-m-d")) <= strtotime(Configure::read('DATA_FIM'))){
	$participe = true;
}
?>
<div id="article" class="como-funciona">
	<div class="center">
		<div>
			<div class="concurso_cultural_2"></div>
			<div class="balao">
				<h1>Como Funciona?</h1>
				<ol>
					<li>Clique em <a <?php echo (!$participe) ? 'rel="facebox" href="#denied_participe"' : 'href="participe"'; ?> style="font-size: 22px;color:#ffffff;font-weight: bold;">Participe!</a></li>
					<li>Preencha sua inscrição.</li>
					<li>Aceite o <a href="regulamento" style="color:#ffffff;">Regulamento</a>.</li>
					<li>E conte sua história no Kumon com o tema abaixo:</li>
				</ol>
				<p class="cote">“Como o método Kumon te ajuda<br />hoje a ter um futuro melhor?”</p>
				<p class="frase2">Pronto! As três melhores histórias ganharão prêmios!</p>
			</div>
		</div>
	</div>
</div>