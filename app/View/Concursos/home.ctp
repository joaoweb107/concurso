<body id="bg_listar">
<br /><br /><br /><br /><br />
<style type="text/css">
	.cake-error{display: none;}
</style>

<?php
    switch ($tipo_usuario) {
	case 'orientador':
	    $url = '/Concursos/listar';
	    break;

	case 'administrador':
	    $url = '/Concursos/listarAdmin';
	    break;

	case 'coordenador':
	    $url = '/Concursos/listarCoordenador';
	    break;

	case 'lider':
	    $url = '/Concursos/listarLider';
	    break;

	default:
	    $TIPO_USUARIO = '';
	    $url = '/Concursos';
	    break;
    }

    $TIPO_USUARIO = strtoupper($tipo_usuario);

    $data_inicio = date('d/m/Y',strtotime(Configure::read('DATA_INICIO_'.$TIPO_USUARIO)));
/*$data_inicio = explode('-', $data_inicio);
$data_inicio = $data_inicio[2].'/'.$data_inicio[1].'/'.$data_inicio[0];
*/
    $data_fim = date('d/m/Y', strtotime(Configure::read('DATA_FIM_'.$TIPO_USUARIO)));
/*$data_fim = explode('-', $data_fim);
$data_fim = $data_fim[2].'/'.$data_fim[1].'/'.$data_fim[0];
*/



if(strtotime(date("y-m-d")) >= strtotime(Configure::read('DATA_INICIO_'.$TIPO_USUARIO)) &&
   strtotime(date("y-m-d")) <= strtotime(Configure::read('DATA_FIM_'.$TIPO_USUARIO))){
 			$periodo = TRUE;
	}else{
			$periodo = FALSE;
	}

if(strtotime(date("y-m-d")) >= strtotime(Configure::read('DATA_INICIO_ADMINISTRADOR_NOTA')) &&
   strtotime(date("y-m-d")) <= strtotime(Configure::read('DATA_FIM_ADMINISTRADOR_NOTA'))){
	 	$periodo_nota = TRUE;
	}else{
		$periodo_nota = FALSE;
	}

if(strtotime(date("y-m-d")) >= strtotime(Configure::read('DATA_INICIO_ADMINISTRADOR_SELECIONADAS')) &&
   strtotime(date("y-m-d")) <= strtotime(Configure::read('DATA_FIM_ADMINISTRADOR_SELECIONADAS'))){
	 	$periodo_selecionadas = TRUE;
	}else{
		$periodo_selecionadas = FALSE;
	}

if(strtotime(date("y-m-d")) >= strtotime(Configure::read('DATA_INICIO_ADMINISTRADOR_VER_NOTA'))){
	 	$periodo_ver_nota = TRUE;
	}else{
		$periodo_ver_nota = FALSE;
	}
?>

	<div class="panel-buttons">
	<?php if($tipo_usuario == 'orientador') { ?>
	    <a id='link_banner_concurso' href="#regulamento" alt="" rel="facebox" style="display:none;">
			<img src="<?php echo $this->Html->url('/app/webroot/css/template/images/banner_concurso.png', true); ?>" />
	    </a>
	    <h2>Você também pode ganhar um prêmio!</h2><br />
	    <h5>Se seu aluno ganhar em primeiro lugar em qualquer categoria, você ganha um Notebook!  É isso mesmo!<br /><a href="#regulamento" alt="" rel="facebox">Saiba mais</a></h5>

	    <h5>Olá <strong><?php echo $nome_usuario?></strong>,</h5><br />
	    
	    <?php if (count($unidade) > 1) { ?>
		
		<h5 class="historias_cadastradas"><?php
	    
	    if ($numero_frases > 0)
	    	echo 'Suas unidades possuem ' . $numero_frases . ' histórias cadastradas.<br />';
	    else
	    	echo 'Suas unidades não possuem histórias cadastradas.<br />';
	    ?></h5>

	    <?php }else{ ?>

	    <h5 class="historias_cadastradas"><?php

	    if ($numero_frases > 0)
	    	echo 'Sua unidade possui ' . $numero_frases . ' histórias cadastradas.<br />';
	    else
	    	echo 'Sua unidade não possui histórias cadastradas.<br />';
	    ?></h5>

		<?php } ?>



		<h5>Vamos lá, ainda dá tempo! Incentive seus alunos a participar e concorrer a prêmios!</h5><br />
		<h5>Escolha as 2 melhores histórias por categoria de sua unidade.<br />Será um total de 6 histórias por unidade.</h5><br />
		<h5><strong>Participe e concorra a um Notebook!</strong></h5><br />
		<h5><a href="#regulamento" alt="" rel="facebox">Para mais informações leia o regulamento de apuração e premiação.</a></h5><br />

		<h5><strong>O prazo para escolher as melhores histórias por categoria é de 23 a 27 de Março de 2015.</strong></h5><br />

	    <h5><strong>Visualize abaixo as opções da unidade <?php //echo $unidade; ?>e escolha as 2 (duas) melhores histórias por categoria:</strong></h5>
	<!-- ADMINISTRADORES -->
	<?php } elseif ($tipo_usuario == 'administrador') { ?>
	    <h4>Olá, <b><?php echo $nome_usuario?></b></h4>
	    <h5><b>Bem-vindo (a) ao Concurso Cultural Kumon!</b></h5>
	    <h5><b>Este é um espaço exclusivo para Administradores!</b></h5>
	    <h5><b>A escolha das melhores histórias poderá ser feita a partir do dia <b style="color: red;"><?php echo date("d/m/Y", strtotime(Configure::read('DATA_INICIO_ADMINISTRADOR'))) ?></b>.</h5>
	    <br />
	    <h5><b>Visualize abaixo as melhores histórias selecionadas pelos líderes:</b></h5>

		<?php if(isset($total_cadastradas)){ $total_cadastradas = count($total_cadastradas); ?> <h5><b>Total de histórias cadastradas: <?php echo (empty($total_cadastradas))? '0': $total_cadastradas;?> .</b></h5> <?php } ?>

	    <?php if(isset($total_frases)){ ?> <h5><b>Total de histórias encaminhadas: <?php echo (empty($total_frases))? '0': $total_frases;?> .</b></h5> <?php } ?>  	

	    <?php if(isset($numero_orientadores)){ ?> <h5>Total de Orientadores participantes: <b><?php echo $numero_orientadores;?></b>.</h5> <?php } ?>

	    <?php if(isset($numero_melhores_orientadores)){ ?> <h5>Total de Histórias Selecionadas pelos Orientadores: <b><?php echo $numero_melhores_orientadores;?></b>.</h5> <?php } ?>
	<?php } elseif($tipo_usuario == 'coordenador') { ?>
		<a id='link_banner_concurso' href="#regulamento" alt="" rel="facebox" style="display:none">
			<img src="<?php echo $this->Html->url('/app/webroot/css/template/images/banner_concurso.png', true); ?>" />
	    </a>
	    <?php //atualização 13-01 textos coordenador e lider ?>
	    <h4>Olá, <b><?php echo $nome_usuario?></b></h4><br />
	    <h5>Este é um espaço exclusivo para você, coordenador de franquias do Kumon!</h5><br />

	     <?php if (count($regional) > 1) { ?>
		<h5 class="historias_cadastradas"><b><?php 
		$total_frases = count($dados);
	    if (isset($total_frases) and $total_frases > 0) {
	    	echo 'Suas regionais possuem ' . $total_frases . ' histórias cadastradas.<br />';
	    } else {
	    	echo 'Suas regionais não possuem histórias cadastradas.<br />';
	    }
	    ?></b></h5>
		<?php }else{ ?>
		<h5 class="historias_cadastradas"><b><?php 
		$total_frases = count($dados);
	    if (isset($total_frases) and $total_frases > 0) {
	    	echo 'Sua regional possui ' . $total_frases . ' histórias cadastradas.<br />';
	    } else {
	    	echo 'Sua regional não possui histórias cadastradas.<br />';
	    }
	    ?></h5></b>
		<?php } ?>

	    <br />
		<h5>Escolha as 3 melhores histórias por categoria de sua regional.</h5>
		<h5>Será um total de 9 histórias por regional.</h5><br />
		<h5><strong>Participe da apuração e concorra a um iPad Mini Branco 16Gb Wi-fi.</strong></h5><br />
		<h5><strong>ATENÇÃO:</strong></h5><br/>
		<h5><strong>SERÃO AVALIADAS SOMENTE AS HISTÓRIAS SELECIONADAS NESSE SISTEMA.</strong></h5>
		<h5><strong>A NÃO PARTICIPAÇÃO NA APURAÇÃO, NÃO PROMOVERÁ A PASSAGEM DAS HISTÓRIAS<br />PARA A PRÓXIMA FASE DA APURAÇÃO, AFETANDO NA PARTICIPAÇÃO DOS ALUNOS<br />E ORIENTADORES DE SUA REGIONAL.<strong></h5><br />
		<h5>Para mais informações, <a href="#regulamento" alt="" rel="facebox"><b>CLIQUE AQUI</b></a> e leia o Regulamento de Premiação Interna.</h5><br />
		<h5><strong>O prazo de participação é de 30 de março a 02 de abril de 2015.</strong></h5>
	    <br />

	    <!-- h5>Visualize abaixo as melhores histórias selecionadas pelos orientadores: <br /></h5 -->

	    <?php /*if(isset($total_frases)){ ?> <h5>Total de histórias encaminhadas: <b><?php echo $total_frases;?></b>.</h5> <?php } ?>

	    <?php if(isset($numero_orientadores)){ ?> <h5>Total de Orientadores participantes: <b><?php echo $numero_orientadores;?></b>.</h5> <?php } ?>

	    <?php if(isset($numero_melhores_orientadores)){ ?> <h5>Total de Histórias Selecionadas pelos Orientadores: <b><?php echo $numero_melhores_orientadores;?></b>.</h5> <?php }  */ ?>

	    <?php if(isset($total_frases_filiais)){ ?>
		<!--h5>Total de histórias das filiais de sua competência:</h5>
		<h5><?php foreach ($total_frases_filiais as $key => $value) {	?>
				<?php echo $key; ?>: <b><?php echo $value;?></b> |
			<?php } ?>
		</h5-->
	    <?php } ?>
	<?php } elseif($tipo_usuario == 'lider') { ?>
		<a id='link_banner_concurso' href="#regulamento" alt="" rel="facebox" style="display:none">
			<img src="<?php echo $this->Html->url('/app/webroot/css/template/images/banner_concurso.png', true); ?>" />
	    </a>
	   	<?php //atualização 13-01 textos coordenador e lider ?>
	    <h4>Olá, <b><?php echo $nome_usuario?></b></h4><br />
	    <h5>Este é um espaço exclusivo para você, líder de filial do Kumon!</h5><br />
		<h5 class="historias_cadastradas"><b><?php
		$total_frases = count($dados);
	    if (isset($total_frases) and $total_frases > 0) {
	    	echo 'Sua filial possui ' . $total_frases . ' histórias cadastradas.<br />';
	    } else {
	    	echo 'Sua filial não possui histórias cadastradas.<br />';
	    }
	    ?></b></h5><br />
	    <h5>Escolha as 5 melhores histórias por categoria de sua filial.</h5>
	    <h5>Será um total de 15 histórias por filial.</h5><br />
	    <h5>Participe da apuração e sua filial estará concorrendo a um prêmio especial!</h5><br />
	    <h5><strong>ATENÇÃO:</strong></h5><br />
	    <h5><strong>SERÃO AVALIADAS SOMENTE AS HISTÓRIAS SELECIONADAS NESSE SISTEMA.</strong></h5><br />
	    <h5><strong>A NÃO PARTICIPAÇÃO NA APURAÇÃO, NÃO PROMOVERÁ A PASSAGEM DAS HISTÓRIAS<br />PARA A FASE FINAL DA APURAÇÃO DO CONCURSO, AFETANDO NA PARTICIPAÇÃO DOS ALUNOS,<br />ORIENTADORES E COORDENADORES DE SUA FILIAL.</strong></h5><br />
	    <h5><strong>O SUCESSO DO PROJETO DEPENDE DA SUA PARTICIPAÇÃO.</strong></h5><br />
		
		<h5>Para mais informações, <a href="#regulamento" alt="" rel="facebox"><b>CLIQUE AQUI</b></a> e leia o Regulamento de Premiação Interna.</h5><br />

	    <h5>O prazo de participação é de 06 a 10 de abril de 2015.</h5><br />

	    <?php /* if(isset($total_frases)){ ?> <h5>Total de histórias encaminhadas: <b><?php echo $total_frases;?></b>.</h5> <?php } ?>

	    <?php if(isset($numero_orientadores)){ ?> <h5>Total de Orientadores participantes: <b><?php echo $numero_orientadores;?></b>.</h5> <?php } ?>

	    <?php if(isset($numero_melhores_orientadores)){ ?> <h5>Total de Histórias Selecionadas pelos Coordenadores: <b><?php echo $numero_melhores_orientadores;?></b>.</h5> <?php } */ ?>

	    <?php if(isset($total_frases_filiais)){ ?>
		<!--h5>Total de histórias das filiais de sua competência:</h5>
		<h5><?php foreach ($total_frases_filiais as $key => $value) {	?>
				<?php echo $key; ?>: <b><?php echo $value;?></b> |
			<?php } ?>
		</h5-->
	    <?php } ?>
	<?php } ?>

	<?php if($periodo == TRUE && $TIPO_USUARIO == "COORDENADOR"){ ?>
	    <div class="buttons_home">
			<?php $class_termos = ($termos)? '' : 'termos_zero';
			echo $this->Html->link(
				'Pré-escolar',
				$url.'?classe=0&time'.microtime(),array(
				'class' => 'btn btn-success '.$class_termos,
				)
			);
			echo $this->Html->link(
			    'Fundamental 1',
			    $url.'?classe=1&time'.microtime(),
			    array(
				'class' => 'btn btn-info '.$class_termos,
			    )
			);
			echo $this->Html->link(
			    'Fundamental 2',
			    $url.'?classe=2&time'.microtime(),
			    array(
				'class' => 'btn btn-danger '.$class_termos
				)
			);
			?>
	    </div>
	<?php }elseif ($TIPO_USUARIO == "ORIENTADOR" || $TIPO_USUARIO == "ADMINISTRADOR") { ?>
	    <div class="buttons_home">
			<?php $class_termos = ($termos)? '' : 'termos_zero';
			echo $this->Html->link(
				'Pré-escolar',
				$url.'?classe=0&time'.microtime(),array(
				'class' => 'btn btn-success '.$class_termos,
				)
			);
			echo $this->Html->link(
			    'Fundamental 1',
			    $url.'?classe=1&time'.microtime(),
			    array(
				'class' => 'btn btn-info '.$class_termos,
			    )
			);
			echo $this->Html->link(
			    'Fundamental 2',
			    $url.'?classe=2&time'.microtime(),
			    array(
				'class' => 'btn btn-danger '.$class_termos
				)
			);
			?>
	    </div>
	<?php } elseif ($periodo == TRUE && $TIPO_USUARIO == "LIDER") { ?>
	    <div class="buttons_home">
			<?php $class_termos = ($termos)? '' : 'termos_zero';
			echo $this->Html->link(
				'Pré-escolar',
				$url.'?classe=0&time'.microtime(),array(
				'class' => 'btn btn-success '.$class_termos,
				)
			);
			echo $this->Html->link(
			    'Fundamental 1',
			    $url.'?classe=1&time'.microtime(),
			    array(
				'class' => 'btn btn-info '.$class_termos,
			    )
			);
			echo $this->Html->link(
			    'Fundamental 2',
			    $url.'?classe=2&time'.microtime(),
			    array(
				'class' => 'btn btn-danger '.$class_termos
				)
			);
			?>
	    </div>
	<?php } ?>    

	    <br />
	    <div class="buttons_home">
		<?php
		if($email_usuario == 'diogoc@studiovisual.com.br' or $email_usuario == 'marcio.santos@kumon.com.br'){
			echo $this->Html->link(
				'Qtd Filiais',
			'QtdFiliais',array(
			'class' => 'btn btn-success ',
				)
			);
			echo $this->Html->link(
			'Qtd Unidade',
			'QtdUnidades',array(
			'class' => 'btn btn-success ',
				)
			);
			echo $this->Html->link(
				'Relatório Filial',
			'relatorioFilial',array(
			'class' => 'btn btn-success ',
				)
			);
			echo $this->Html->link(
				'Relatório Coordenador',
			'relatorio',array(
			'class' => 'btn btn-success ',
				)
			);
		}


		//esta etapa foi retirada dia 20/03/2015, através de uma conversa do Marcio e Diogo
		/*if($tipo_usuario == 'administrador' && $periodo_selecionadas){
			echo $this->Html->link(
				'Histórias Selecionadas',
			$url.'Selecionadas?selecionadas=true&time'.microtime(),array(
			'class' => 'btn btn-success ',
				)
			);
		}*/

		//esta etapa foi retirada dia 20/03/2015, através de uma conversa do Marcio e Diogo, onde a etapa de atribuir nota é listada direto para o admin
		/*if($tipo_usuario == 'administrador' &&  $periodo_nota ){
			echo $this->Html->link(
				'Atribuição de Notas',
			$url.'ParaNota?time'.microtime(),array(
			'class' => 'btn btn-info ',
				)
			);
		}*/
		?>
		</div>
		<br />
		<div class="buttons_home">
		<?php
		if($email_usuario == 'diogoc@studiovisual.com.br' or $email_usuario == 'marcio.santos@kumon.com.br' &&  $periodo_ver_nota ){
			echo $this->Html->link(
			'Lista Final PRÉ',
			$url.'Notas0?time'.microtime(),array(
			'class' => 'btn btn-danger ',
				)
			);

			echo $this->Html->link(
			'Lista Final EF1',
			$url.'Notas1?time'.microtime(),array(
			'class' => 'btn btn-danger ',
				)
			);

			echo $this->Html->link(
			'Lista Final EF2',
			$url.'Notas2?time'.microtime(),array(
			'class' => 'btn btn-danger ',
				)
			);


			/*echo $this->Html->link(
				'Lista Coordenadores',
			'relatorio?time'.microtime(),array(
			'class' => 'btn btn-success ',
				)
			);*/
		}
		?>
	    </div>
	    <br />
	    <div class="buttons_home">
		<?php
		if($email_usuario == 'diogoc@studiovisual.com.br'){
			echo $this->Html->link(
				'Configurações',
			'/configs?time'.microtime(),array(
			'class' => 'btn btn-success ',
				)
			);
		}
		?>
	    </div>
	</div>
<?php if($tipo_usuario == 'orientador') { ?>
	<!-- modalOrientador  -->
	<div id="regulamento" title="Regulamento para Orientadores!" style="display:none;">
		<div class="facebox_home">
			<span class="span_regulamento"><h4><strong>REGULAMENTO DO SISTEMA DE APURAÇÃO E PREMIAÇÃO DE ORIENTADORES:</strong></h4></span>
			<p>
				Para participar do processo de apuração do Concurso Cultural é muito fácil. Para isso é só seguir os passos abaixo:<br /><br />
				1. Acessar o link:<br />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.concursokumon.com.br/orientador">www.concursokumon.com.br/orientador</a>
				<br /><br />
				2. Digitar CPF, acessar sua área exclusica, ler e confirmar o regulamento de premiação interna.<br /><br />
				3. Será possível o orientador visualizar as respostas de sua unidade por categoria, mas somente no período entre 23/03/15 a 27/03/15 poderá escolher as melhores histórias de sua unidade.<br /><br />
				4. O orientador deverá escolher as <strong>2 (duas) melhores histórias por categoria</strong> de sua unidade. <strong>Total de 6 histórias por unidade: 2 por categoria.</strong> <br /><br />
				5. Ganhará o prêmio somente o orientador qual seu aluno ganhar em primeiro lugar, em qualquer categoria do Concurso. <br /><br />
				6. O aluno só será considerado oficialmente um dos ganhadores, após entrega e aceitação da documentação exigida no <a href="/concursoculturalkumon/regulamento">regulamento publicado no site oficial do concurso cultural kumon</a>. <br /><br />
				7. O orientador só será considerado ganhador, após a finalização do processo de documentação e auditoria de seu aluno ganhador.  <br /><br />
				8. O orientador ganhará somente um prêmio, mesmo se houver mais de 1 (um) aluno vencedor do concurso em sua unidade.  <br /><br />
				9. O modelo, marca e configurações do notebook (prêmio) serão estabelecidos pela Comissão Julgadora do Concurso Cultural.  <br /><br />
				10. Esta ação é válida somente para a rede de franqueados do Kumon Brasil.  <br /><br />
				11. Em caso de fraude ou manipulação, o orientador será desclassificado do processo de apuração e o prêmio será cancelado.  <br /><br />
				12. O Kumon não poderá ser responsabilizado por participações atrasadas, incompletas, incorretas, imprecisas e inválidas.  <br /><br />
				13. O Kumon não poderá ser responsabilizado por participações não efetivadas em razão de falhas técnicas nos provedores ou servidores, nos computadores, sejam problemas do hardware ou software, ou não efetuadas por erro, interrupção, defeito, atraso ou falha em operações ou transmissões para o correto processamento das participações, incluindo, mas não se limitando, à transmissão imprecisa de dados ou falha ao recebê-los. Não poderá ser responsabilizado, ainda, por causas advindas de força maior ou caso fortuito.  <br /><br />
				<strong> Atenção: <strong><br />
				14. Serão avaliadas pela comissão julgadora somente as melhores histórias selecionadas pelos orientadores. Dessa forma, somente concorrerão ao prêmio os orientadores que REALIZAREM o processo de apuração de sua unidade. <br /><br />
			</p>


			<?php if(!$termos){
				echo $this->Html->link(
					'Li e concordo com os termos do regulamento',
			    	'/Concursos/setTermos?cpf='.$this->Session->read('Auth.User.cpf'),array(
			    		'class' => 'btn btn-danger',
			    		'id' => 'btn_termos'
			    	)
	    		);
			}
			?>

		</div>
	</div>

<?php } ?>
		<!-- / modalOrientador  -->

<?php if($tipo_usuario == 'coordenador') { ?>
		<!-- modalCoordenador  -->
	<div id="regulamento" title="Regulamento para Coordenadores!" style="display:none;">
		<div class="facebox_home">
			<span class="span_regulamento_coordenador"><h4><strong>REGULAMENTO INTERNO DE PREMIAÇÃO PARA COORDENADORES DE FRANQUIAS:</strong></h4></span>
			<p>
				<b>Coordenador, para participar do processo de apuração do Concurso Cultural é muito fácil.<br />Para isso devem-se seguir os passos abaixo:</b><br /><br />
				<b>1)&nbsp;Acessar o site:</b> <a href="http://www.kumon.com.br/concursoculturalkumon/coordenador">www.kumon.com.br/concursoculturalkumon/coordenador</a>
				<br /><br />
				<b>2)</b>&nbsp;Digitar CPF, acessar sua área exclusiva, ler e confirmar o regulamento de premiação interna.<br /><br />

				<b>3)</b>&nbsp;Será possível o coordenador visualizar a <u>quantidade de histórias</u> cadastradas na sua(s) regional(is) a partir do dia <b>10/02/15</b>,mas somente no período entre <b>30/03/15 a 02/04/15</b> poderá ler e escolher as melhores histórias de sua(s) regional(is).<br /><br />

				<b>4.</b>&nbsp;O coordenador deverá escolher as <b>3 (três) melhores histórias</b> de sua regional por categoria.  <b>Total de 9 histórias por regional: 3 por categoria (Pré-escolar, Ensino Fundamental 1 e Ensino Fundamental 2).</b><br /><br />

				5.&nbsp;As histórias deverão ser avaliadas com base nos critérios de criatividade, originalidade e adequação ao tema.<br /><br />

				6.&nbsp;Esta ação é válida somente para coordenadores de franquias do Kumon Brasil, responsáveis por uma ou mais regionais.<br /><br />

				7.&nbsp;Em caso de fraude ou manipulação, o coordenador será desclassificado do processo de apuração e será premiado o próximo coordenador colocado na lista de vencedores gerada pelo nosso sistema de apuração.<br /><br />

				8.&nbsp;A Comissão Julgadora não poderá ser responsabilizada por participações atrasadas, incompletas, incorretas, imprecisas e inválidas.<br /><br />

				9.&nbsp;A Comissão Julgadora não poderá ser responsabilizada por participações não efetivadas em razão de falhas técnicas nos provedores ou servidores, nos computadores, sejam problemas do hardware ou software, ou não efetuadas por erro, interrupção, defeito, atraso ou falha em operações ou transmissões para o correto processamento das participações, incluindo, mas não se limitando, à transmissão imprecisa de dados ou falha ao recebê-los. Qualquer dificuldade relativa ao site do concurso ou adventos de força maior devem ser comunicados ao Departamento de Comunicação. Demais ocorridos técnicos devem ser comunicados imediatamente ao Departamento de TI.<br /><br />

				10.&nbsp;Será premiado o coordenador que apresentar em nosso sistema de apuração a maior pontuação conforme os critérios abaixo: <br /><br />
					<b>Maior número absoluto de alunos inscritos em sua regional</b> (a pontuação será realizada mediante a análise do número absoluto de alunos participantes em relação à totalidade de alunos inscritos no concurso).<br /><br />
					<b>Maior % de Alcance</b> (a pontuação será realizada mediante a análise da profundidade de alunos participantes em relação à totalidade de alunos efetivamente matriculados na sua regional).<br /><br />


				11.&nbsp;Após a conclusão do concurso o sistema de apuração gerará automaticamente a lista de coordenadores participantes classificada por pontuação que será auditada pela Comissão Julgadora do Concurso Cultural Kumon. O coordenador com maior pontuação ganhará 1 (um) iPad Mini Branco 16Gb Wi-fi Apple. A premiação será divulgada por e-mail. <br /><br />

				12.&nbsp;O prêmio será entregue após a conclusão final de todo o processo do concurso. Data e forma de entrega serão definidas posteriormente pela comissão julgadora do concurso.<br /><br />

				13.&nbsp;<b>Serão avaliadas pela comissão julgadora somente as melhores histórias selecionadas pelos orientadores, coordenadores e líderes. Dessa forma, somente concorrerão aos prêmios os coordenadores que realizarem o processo de apuração de sua regional.</b><br /><br />

				<b>14.</b>&nbsp;<strong>ATENÇÃO:<strong><br /><br />

				 <strong>A NÃO PARTICIPAÇÃO NA APURAÇÃO, NÃO PROMOVERÁ A PASSAGEM DAS HISTÓRIAS PARA A PRÓXIMA FASE DA APURAÇÃO DO CONCURSO, AFETANDO NA PARTICIPAÇÃO DOS ALUNOS E ORIENTADORES DE SUA REGIONAL.</strong><br /><br />
				 <strong>O SUCESSO DO PROJETO DEPENDE DA SUA PARTICIPAÇÃO. PORTANTO, FIQUE ATENTO E PARTICIPE!  É RÁPIDO, FÁCIL E TRANQUILO.</strong><br /><br />

				<h6><b><i>OBS: ESSAS INFORMAÇÕES SÃO INTERNAS E SIGILOSAS E NÃO DEVEM SER COMPARTILHADAS COM OS ORIENTADORES E ALUNOS.</i></b></h6>
			</p>


			<?php if(!$termos){
				echo $this->Html->link(
					'Li e concordo com os termos do regulamento',
			    	'/Concursos/setTermos?cpf='.$this->Session->read('Auth.User.cpf'),array(
			    		'class' => 'btn btn-danger',
			    		'id' => 'btn_termos'
			    	)
	    		);
			}
			?>

		</div>
	</div>

<?php } ?>	

		<!-- / modalCoordenador  -->

<?php if($tipo_usuario == 'lider') { ?>
			<!-- modalLider  -->
	<div id="regulamento" title="Regulamento para Lideres!" style="display:none;">
		<div class="facebox_home">
			<span class="span_regulamento_lider"><h4><strong>REGULAMENTO INTERNO DE PREMIAÇÃO PARA AS FILIAIS (LÍDERES DE FILIAIS):</strong></h4></span>
			<p>
				<b>Líder de Filial, para participar do processo de apuração do Concurso Cultural é muito fácil.<br />Para isso devem-se seguir os passos abaixo:</b><br /><br />
				<b>1)&nbsp;Acessar o site:</b> <a href="http://www.kumon.com.br/concursoculturalkumon/lider">www.kumon.com.br/concursoculturalkumon/lider</a>
				<br /><br />
				<b>2)</b>&nbsp;Digitar CPF, acessar sua área exclusiva, ler e confirmar o regulamento de premiação interna.<br /><br />

				<b>3)</b>&nbsp;Será possível o líder visualizar a <u>quantidade de histórias</u> cadastradas na sua filial a partir do dia <b>10/02/15</b>, mas somente no período entre <b>06/04/15 a 10/04/15</b> poderá ler e escolher as melhores histórias de sua filial.<br /><br />

				<b>4.</b>&nbsp;O líder deverá escolher as <b>5 (cinco) melhores histórias</b> de sua filial por categoria. <b>Total de 15 histórias por filial: 5 por categoria.</b><br /><br />

				5.&nbsp;As histórias deverão ser avaliadas com base nos critérios de criatividade, originalidade e adequação ao tema.<br /><br />

				6.&nbsp;Esta ação é válida somente para líderes de filiais de franquias, colaboradores do Kumon Brasil.<br /><br />

				7.&nbsp;Em caso de fraude ou manipulação, a filial será desclassificada do processo de apuração e será premiada a próxima filial colocada na lista de vencedores gerada pelo nosso sistema de apuração.<br /><br />

				8.&nbsp;A Comissão Julgadora não poderá ser responsabilizada por participações atrasadas, incompletas, incorretas, imprecisas e inválidas.<br /><br />

				9.&nbsp;A Comissão Julgadora não poderá ser responsabilizada por participações não efetivadas em razão de falhas técnicas nos provedores ou servidores, nos computadores, sejam problemas do hardware ou software, ou não efetuadas por erro, interrupção, defeito, atraso ou falha em operações ou transmissões para o correto processamento das participações, incluindo, mas não se limitando, à transmissão imprecisa de dados ou falha ao recebê-los. Qualquer dificuldade relativa ao site do concurso ou adventos de força maior devem ser comunicados ao Departamento de Comunicação. Demais ocorridos técnicos devem ser comunicados imediatamente ao Departamento de TI.<br /><br />

				10. Será premiada a filial que apresentar em nosso sistema de apuração a maior pontuação conforme os critérios abaixo:<br /><br />
					<b>• Maior número absoluto de alunos inscritos em sua filial</b> (a pontuação será realizada mediante a análise do número absoluto de alunos participantes em relação à totalidade de alunos inscritos no concurso).<br /><br />
					<b>• Maior % de Alcance</b> (a pontuação será realizada mediante a análise da profundidade de alunos participantes em relação à totalidade de alunos efetivamente matriculados na filial).<br /><br />


				11.&nbsp;Após a conclusão do concurso o sistema de apuração gerará automaticamente a lista de filiais participantes classificadas por pontuação que será auditada pela Comissão Julgadora do Concurso Cultural Kumon. A filial com maior pontuação ganhará 1 (um) prêmio especial que será acordado pela Comissão Julgadora e a filial vencedora. O produto será avaliado conforme as necessidades da filial vencedora. A premiação será divulgada por e-mail a toda a rede interna do Kumon.<br /><br />

				12.&nbsp;O prêmio será entregue após a conclusão final de todo o processo do concurso. Data e forma de entrega serão definidas posteriormente pela comissão julgadora do concurso.<br /><br />

				13.&nbsp;<b>Serão avaliadas pela comissão julgadora somente as melhores histórias selecionadas pelos orientadores, coordenadores e líderes. Dessa forma, somente concorrerão aos prêmios as filiais quais os líderes realizarem o processo de apuração de sua filial.</b><br /><br />

				<b>14.</b>&nbsp;<strong>ATENÇÃO:<strong><br /><br />

				 <strong>A NÃO PARTICIPAÇÃO NA APURAÇÃO, NÃO PROMOVERÁ A PASSAGEM DAS HISTÓRIAS PARA A FASE FINAL DA APURAÇÃO DO CONCURSO, AFETANDO NA PARTICIPAÇÃO DOS ALUNOS, ORIENTADORES E COORDENADORES DE SUA FILIAL.</strong><br /><br />
				 <strong>O SUCESSO DO PROJETO DEPENDE DA SUA PARTICIPAÇÃO. PORTANTO, FIQUE ATENTO E PARTICIPE!  É RÁPIDO, FÁCIL E TRANQUILO.</strong><br /><br />

				<h6><b><i>OBS: ESSAS INFORMAÇÕES SÃO INTERNAS E SIGILOSAS E NÃO DEVEM SER COMPARTILHADAS COM OS ORIENTADORES E ALUNOS.</i></b></h6>
			</p>


			<?php if(!$termos){
				echo $this->Html->link(
					'Li e concordo com os termos do regulamento',
			    	'/Concursos/setTermos?cpf='.$this->Session->read('Auth.User.cpf'),array(
			    		'class' => 'btn btn-danger',
			    		'id' => 'btn_termos'
			    	)
	    		);
			}
			?>

		</div>
	</div>
<?php } ?>	

		<!-- / modalLider  -->
	<?php //echo $this->element('sql_dump'); ?>
