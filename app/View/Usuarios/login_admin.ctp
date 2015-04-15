<body class="lock-screen" onload="">
<div id="login_admin">	
	<div id="centro">
		<div id="logo_concurso">
			<img alt="Concurso Cultural Kumon" src="<?php echo $this->Html->url('/img/index/concurso_cultural.png', true); ?>" />
			<div id="texto_login">
				<h3>Olá Administrador,</h3>
				<h3>Bem-vindo ao Concurso Cultural Kumon!</h3>
				<p>Este é um espaço exclusivo para você. Participe da apuração e selecione<br />as melhores histórias da Kumon.</p>
				<p>A escolha das melhores histórias poderá ser feita a partir do dia <b><?php echo date("d/m/Y", strtotime(Configure::read('DATA_INICIO_ADMINISTRADOR'))) ?></b>.</p>
				<div>			
					<h4>Digite seu Login e Senha!</h4>
				</div>		
			</div>
			<div class="lock-wrapper login-wrap">
		        <div class="lock-box text-center">
		        	<form class="form-inline" action="<?php echo $this -> Html -> url('/usuarios/login', true); ?>" id="UsuarioLoginForm" method="post" accept-charset="utf-8">
			             <?php $loginErro = $this->Session->flash('login'); ?>                                   
			             <?php echo (!$loginErro ==FALSE) ?'<script> jQuery("header").css("display","none"); alert("Usuário e/ou senha, não constam na nossa base de dados !!")</script>' : "";  ?>
			            <div class="lock-name">
			            	<input style="float:none;display:block" name="data[Usuario][username]" id="UsuarioUsername" type="text" value="" class="form-control lock-input" placeholder="Usuário" autofocus>
			            </div>
			           <!-- <img src="<?php echo $this->Html->url('/app/webroot/css/template/images/lock_thumb.jpg', true); ?>" alt="lock avatar"/> -->
			            <div class="lock-pwd admin">
					        <div class="form-group">			            
				                <input name="data[Usuario][password]" id="UsuarioPassword" type="password" alt="" class="form-control lock-input" placeholder="Digite a Senha" style="display:block" >		            
				                <button class="btn btn-lock" type="submit">
			                        <i class="fa fa-arrow-right"></i>
			                    </button>
			                </div>								
			            </div>
			            <br style="clear:both;" />
		            </form>
		            <div class="ser-login-info"></div>
		        </div>
		    </div>
		</div>
	</div>
</div>	
    <script>
		jQuery('header').css("display","none"); 
        
    </script>
</body>

<!--
	 <div class="container">

      <form class="form-signin" action="<?php echo $this -> Html -> url('/usuarios/login', true); ?>" id="UsuarioLoginForm" method="post" accept-charset="utf-8">
        <h2 class="form-signin-heading">Bem-Vindo Administrador</h2>
        <div class="login-wrap">
            
            	<?php if($logado == 0) { ?>        
	            <?php $loginErro = $this->Session->flash('login'); ?>                                   
	                <?php echo $loginErro; ?>	       
			        <div class="user-login-info">
			            <input name="data[Usuario][username]" id="UsuarioUsername" type="text" class="form-control" placeholder="Usuário" autofocus>
		                <input name="data[Usuario][password]" id="UsuarioPassword" type="password" class="form-control" placeholder="Senha">
		            </div>
		            <button class="btn btn-lg btn-login btn-block" type="submit">Entrar</button>            
				<?php } else { ?>
				    <ul class="">
				    	 <li><?php echo $this->Html->link('Frases',array('controller' => 'concursos', 'action' => 'listar'),array ('class' => 'btn btn-lg btn-login btn-block')); ?></li>          
				        <li><?php echo $this ->Html->link('Sair', array('controller' => 'usuarios', 'action' => 'logout'),array ('class' => 'btn btn-lg btn-login btn-block')); ?></li>
				    </ul>
				<?php } ?>  	
  
        </div>

      </form>

    </div>
 -->