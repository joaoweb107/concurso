<?php
if(strtotime(date("y-m-d")) >= strtotime(Configure::read('DATA_INICIO')) &&	strtotime(date("y-m-d")) <= strtotime(Configure::read('DATA_FIM'))){
	$periodo_concurso = TRUE;
} else {
	$periodo_concurso = FALSE;
}
$cakeDescription = __d('cake_dev', 'Concurso Cultural');
Cache::clear(); ?>
<!DOCTYPE HTML>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	if (!(isset($paralax))) {
		echo $this->Html->css(array('style','jquery-ui',"template/bs3/css/bootstrap.min.css","template/css/bootstrap-reset.css","template/assets/font-awesome/css/font-awesome.css","template/assets/advanced-datatable/media/css/demo_page.css","template/assets/advanced-datatable/media/css/demo_table.css","template/assets/advanced-datatable/extras/TableTools/media/css/TableTools","template/assets/data-tables/DT_bootstrap.css","template/css/style.css","template/css/style-responsive.css","template/assets/iCheck-master/skins/minimal/green.css","template/facebox","../js/jRating-master/jquery/jRating.jquery"));
		echo $this->Html->script(array('jquery','jquery-ui','jquery-migrate-1.1.1.min','jquery.meio.mask','jquery.validate.js','template/facebox',"template/bs3/js/bootstrap.min.js","template/js/accordion-menu/jquery.dcjqaccordion.2.7.js","template/js/scrollTo/jquery.scrollTo.min.js","template/assets/jQuery-slimScroll-1.3.0/jquery.slimscroll.js","template/js/nicescroll/jquery.nicescroll.js","template/assets/easypiechart/jquery.easypiechart.js","template/assets/sparkline/jquery.sparkline.js","template/assets/flot-chart/jquery.flot.js","template/assets/flot-chart/jquery.flot.tooltip.min.js","template/assets/flot-chart/jquery.flot.resize","template/assets/flot-chart/jquery.flot.pie.resize","template/assets/advanced-datatable/media/js/jquery.dataTables","template/assets/advanced-datatable/extras/TableTools/media/js/ZeroClipboard","template/assets/advanced-datatable/extras/TableTools/media/js/TableTools","template/assets/data-tables/DT_bootstrap","template/js/scripts","template/js/dynamic_table/dynamic_table_init","template/assets/iCheck-master/jquery.icheck.js","template/assets/ckeditor/ckeditor.js","template/js/icheck/icheck-init.js",'functions','jRating-master/jquery/jRating.jquery')); ?>
		<!--[if IE 7]>
			<?php echo $this->Html->css(array('ie8/ie8-responsive-file-warning.js')); ?>
		<![endif]-->
		<!--[if lt IE 9]>
			<?php echo $this->Html->script(array('html5shiv.js')); ?>
		<![endif]-->
		<?php
	} else {
		/* css/style.css */
		echo $this->Html->css(array('style','font','styleIndex',"template/facebox"));
		echo $this->Html->script(array('jquery-1.11.1','jquery-migrate-1.1.1.min','jquery-ui','jquery.meio.mask','jquery.validate.js','template/facebox','jquery.backgroundSize','functions'));
	}
	?>
	<!--[if lt IE 9]>
		<?php echo $this->Html->script(array('html5shiv.js', 'jquery.backgroundSize.js')); ?>
	<![endif]-->
	<!--script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-42367757-1', 'kumon.com.br');
	  ga('send', 'pageview');

	</script-->
</head>
<body>
<!--nocache-->
<?php if(!(isset($paralax))) { ?>
    <header class="header fixed-top clearfix">
	<!--logo start -->
	<div class="">
	    <a href="<?php echo $this->Html->url('/concursos/home', true); ?>" class="logo">
		<img alt="Kumon" src="<?php echo $this->Html->url('/app/webroot/img/sample_logo.png', true); ?>">
	    </a>
	</div>
	<!--logo end-->
	<div class="nav notify-row" id="top_menu">
	    <?php if($logado == 0) { ?>
		<?php $loginErro = $this->Session->flash('login'); ?>
	    <a href="<?php echo $this->Html->url('/usuarios/loginAdmin', true); ?>" class="" id="abre_login" ></a>
	    <?php } else { ?>
	</div>
	<div class="top-nav clearfix">
	    <!--search & user info start-->
	    <ul class="nav pull-right top-menu">
			<!-- user login dropdown start-->
			<li class="dropdown">
			    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
				<span class="username"><?php echo $this->Session->read('Auth.User.nome'); ?></span>
				<b class="caret"></b>
			    </a>
			    <ul class="dropdown-menu extended logout">
				<li><a href="logout"><i class="fa fa-key"></i>Sair</a></li>
				<!--
				<?php if (isset($tipo_usuario) && $tipo_usuario == 'orientador'){ ?>
						<li><?php echo $this->Html->link('Frases',array('controller' => 'concursos', 'action' => 'listar')); ?></li>
			    <?php } elseif (isset($tipo_usuario) && $tipo_usuario == 'administrador'){ ?>
						<li><?php echo $this->Html->link('Frases',array('controller' => 'concursos', 'action' => 'listarAdmin')); ?></li>
			    <?php } ?>
				-->
			    </ul>
			</li>
	    </ul>
	    <?php } ?>
	</div>
    </header>
    <div id="container">
	<div id="content">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
	<div id="footer">
		<?php /*echo $this->Html->link(
				$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
				'http://www.cakephp.org/',
				array('target' => '_blank', 'escape' => false)
			);
		*/?>
	</div>
    </div>
	<?php //echo $this->element('sql_dump'); ?>
<?php } else {
	$participe = false;
	if(strtotime(date("y-m-d")) >= strtotime(Configure::read('DATA_INICIO')) && strtotime(date("y-m-d")) <= strtotime(Configure::read('DATA_FIM'))){
		$participe = true;
	}
	?>
	<div id="wrapper">
		<div id="header">
			<div class="center">
				<div class="logo">
					<a href="/concursoculturalkumon">
						<?php echo $this->Html->image('index/logo.png')?>
					</a>
				</div>
				<a class="menu-mobile" style="display:none;"></a>
				<div id="nav" class="menu">
					<ul>
						<li class="first">
							<a href="o-que-e" class="<?php echo ($menu_active == "oquee")  ? "active" : ""; ?>">O QUE É?</a>
						</li>
						<li>
							<a href="como-funciona" class="<?php echo ($menu_active == "comofunciona")  ? "active" : ""; ?>">COMO FUNCIONA?</a>
						</li>
						<li>
							<a href="premios" class="<?php echo ($menu_active == "premios")  ? "active" : ""; ?>">PRÊMIOS</a>
						</li>
						<li>
							<a href="regulamento" class="<?php echo ($menu_active == "regulamento")  ? "active" : ""; ?>">REGULAMENTO</a>
						</li>
						<li class="last">
							<a <?php echo (!$participe) ? 'rel="facebox" href="#denied_participe"' : 'href="participe"'; ?> class="<?php echo ($menu_active == "participe")  ? "active" : ""; ?>">PARTICIPE!</a>
						</li>
					</ul>
				</div>
				<br style="clear:both;" />
			</div>
		</div>
		<!-- SCRPITS -->
		<?php $flash = $this->Session->flash() ?>
		<?php if($flash != "") { ?>
			<script>
			$(document).ready(function() {
			    jQuery('a#abre_mensagem').click();
			});
			</script>
			<a id="abre_mensagem" href="#content_mensagem" rel="facebox"></a>
			<div id="content_mensagem" style="display:none">
				<?php echo $flash ?>
			</div>
		<?php } ?>
   		<?php echo $this->fetch('content'); ?>
		<div id="footer">
			<div class="center">
				<div class="lapis" style="<?php echo ($menu_active == "oquee")  ? "" : "display:none;"; ?>"></div>
				<div class="livros" style="<?php echo ($menu_active == "comofunciona")  ? "" : "display:none;"; ?>"></div>
				<div class="globo" style="<?php echo ($menu_active == "regulamento")  ? "" : "display:none;"; ?>"></div>
				<div class="menina" style="<?php echo ($menu_active == "home")  ? "" : "display:none;"; ?>"></div>
				<div class="menina_desc" style="<?php echo ($menu_active == "home")  ? "" : "display:none;"; ?>">Rafaela Costato Pereira Jorge, vencedora do concurso em 1º lugar na categoria EF1 no ano de 2014</div>
				<div class="mensagem" style="<?php echo ($menu_active == "home" || $menu_active == "premios")  ? "" : "display:none;"; ?>">* Imagem dos prêmios são meramente ilustrativas. Certificado de Autorização Caixa nº 3-2598/2014</div>

				<div class="menina" style="<?php echo ($menu_active == "participe" && !$participe)  ? "" : "display:none;"; ?>"></div>
				<div class="menina_desc" style="<?php echo ($menu_active == "participe" && !$participe)  ? "" : "display:none;"; ?>">Rafaela Costato Pereira Jorge, vencedora do concurso em 1º lugar na categoria EF1 no ano de 2014</div>
				<div class="mensagem" style="<?php echo ($menu_active == "participe" && !$participe)  ? "" : "display:none;"; ?>">* Imagem dos prêmios são meramente ilustrativas. Certificado de Autorização Caixa nº 3-2598/2014</div>
				<p class="footer_text">
					<span style="float: left;padding: 5px 0 0 0;font-size:12px;">Kumon Instituto de Educação Ltda. Todos os direitos reservados.</span>
					<span style="float: right;font-size: 20px !important;"><a href="http://www.kumon.com.br" style="color:#fff;text-decoration:none;">www.kumon.com.br</a></span>
					<br style="clear:both;" />
				</p>
			</div>
		</div>
		<script src="//i.btg360.com.br/lc.js" type="text/javascript"></script>
		<script>
		__blc['id'] = "5303";
		function enviaParticipe(nome, email) {
   			try {
        		lc.sendData({
            		evento : "notifique-me-concurso-2015",
            		nm_email : email,
            		repetir : "0",
					vars : { 
						nome : "Kumon Instituto de Educação",
						data_allin : "12.02.2014"
					},
					lista : {
						nm_lista : "notifique-me-concurso-2015",
						nome : nome,
						nm_email : email,
            		}
        		});
    		} catch (e) { 

    		}
    	}
		</script>
		<div id="denied_participe" style="display:none">
			<div class="notifique_box">
				<div class="contentForm">
					<h1>O período de participação é de 21/01 a 20/03/15.</h1>
					<p>Fique atento e participe!</p>
					<form id="formNotifique" method="post" action="">
						<div class="form_align">
							<label>Nome:</label>
							<input type="text" name="nome_notif" />
						</div>
						<div class="form_align">
							<label>E-mail:</label>
							<input type="text" name="email_notif" />
						</div>
						<div class="form_align">
							<button type="submit">Notifique-me</button>
						</div>
					</form>
				</div>
				<div class="contentMsg" style="display:none;">
					<h1 style="font-size: 25px;">
						E-mail cadastrado com sucesso ;)
						<br /><br />
						Você receberá uma notificação próximo ao início do concurso!
						<br /><br />
						Não fique fora dessa!
					</h1>
				</div>
				<script>
				jQuery(document).ready(function () {
					jQuery('#facebox #formNotifique').validate({
						rules: {
						    'email_notif': {
								required: true,
								email: true,
						    },
						    'nome_notif': {
								required: true,
							},
						},
						messages: {
						    'email_notif': {
								required: "O campo email é obrigatório.",
								email: "Preencha com um email válido.",
						    },
						    'nome_notif': {
								required: "O campo nome é obrigatório.",
						    },
						},
						submitHandler: function(form) {
    						enviaParticipe(jQuery('#facebox [name="nome_notif"]').val(), jQuery('#facebox [name="email_notif"]').val());
    						jQuery(".contentForm").fadeOut( 100, function() {
        						jQuery(".contentMsg").fadeIn(100);
							});
						    return false;
						}
				    });
				});
				</script>
			</div>
		</div>
	</div>
<?php } ?>
<!--/nocache-->
</body>
</html>

