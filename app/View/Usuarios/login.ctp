<body class="lock-screen">
	<div id="centro">
		<div id="logo_concurso">
		<style type="text/css">
			#texto_login {
				margin-top: 25px;
			}
			.login-wrap {
				margin: 0;
				margin-top: -15px !important;
			}
			.black {color: #000000 !important;}
			.a { color: #428bca };
		</style>
			<?php
			if( $this->request->here == "/concursoculturalkumon/orientador" || $this->request->here == "/concursoculturalkumon/usuarios/login" ) { ?>
			<style type="text/css">
				#logo_concurso {
					height: 690px;
					margin-bottom: 70px;
				}
			</style>
				<img alt="Concurso Cultural Kumon" src="<?php echo $this->Html->url('/img/index/concurso_cultural.png', true); ?>" />
				<div id="texto_login">
					<h3 style="line-height: 0;">Olá Orientador(a),</h3>
					<h3>Bem-vindo(a) ao Concurso Cultural Kumon!</h3>

					<p>Este é um espaço exclusivo para você!</p>

					<p>Aqui você pode acompanhar as histórias inscritas de sua unidade e participar da apuração onde você pode concorrer a um notebook!</p><br />

					<p><strong>Isso mesmo, para concorrer basta você participar do processo de apuração<br />do Concurso Cultural escolhendo as 2 melhores histórias por<br />categoria de sua unidade.</strong></p>

					<p><strong>Será um total de 6 histórias por unidade.</strong></p><br />

					<p>O prazo para escolha das melhores histórias é de 23 a 27 de março de 2015.</p>

					<div>		
						<p>Não perca essa oportunidade!</p><br />
						<h4 class="black">Digite seu CPF, confirme seus dados e participe!</h4>
					</div>
				</div>
			<?php } ?>
			<?php
			if(	$this->request->here == "/concursoculturalkumon/coordenador" ) { ?>
			<style type="text/css">
				#logo_concurso {
					height: 790px;
					margin-bottom: 70px;
				}
			</style>

				<img alt="Concurso Cultural Kumon" src="<?php echo $this->Html->url('/img/index/concurso_cultural.png', true); ?>" />
				<div id="texto_login">
					<h3 style="line-height: 0;">Olá Coordenador(a) de Franquia.</h3>
					<h3>Seja bem-vindo(a) ao Concurso Cultural Kumon.</h3>

					<p>Este é um espaço exclusivo para você acompanhar a participação</p>
					<p>de sua regional no Concurso Cultural Kumon.</p><br />

					<p>Escolha as 3 melhores histórias por categoria de sua regional.<br />Será um total de 9 histórias por regional.</p><br />

					<p><strong>Participe da apuração e concorra a um 1 iPad Mini 16Gb Wi-fi.</strong></p>
					<p><strong>O prazo de participação é de 30 de março a 02 de abril de 2015.</strong></p>
					<p>Para mais informações, <a href="#">clique aqui</a> e leia o Regulamento de Premiação Interna.</p><br />

					<p class="black"><strong>ATENÇÃO:</strong></p><br />

					<p class="black"><strong>SERÃO AVALIADAS SOMENTE AS HISTÓRIAS SELECIONADAS NESSE SISTEMA.</strong></p>
					<p class="black"><strong>PORTANTO, FIQUE ATENTO E NÃO DEIXE DE PARTICIPAR.<br />É RÁPIDO, FÁCIL E TRANQUILO.</strong></p><br />

					<p class="black"><strong>DIGITE ABAIXO O SEU CPF E ACESSE O SISTEMA DE APURAÇÃO:</strong></p>
				</div>
			<?php } ?>
			<?php
			if(	$this->request->here == "/concursoculturalkumon/lider" ) { ?>
				<style type="text/css">
					#logo_concurso {
						height: 835px;
						margin-bottom: 70px;
					}
				</style>
				<img alt="Concurso Cultural Kumon" src="<?php echo $this->Html->url('/img/index/concurso_cultural.png', true); ?>" />
				<div id="texto_login">
					<h3 style="line-height: 0;">Olá Líder de Filial.</h3>
					<h3>Seja bem-vindo(a) ao Concurso Cultural Kumon.</h3>
					<p>Este é um espaço exclusivo para você acompanhar a participação</p>
					<p>de sua filial no Concurso Cultural Kumon.</p><br />

					<p>Escolha as 5 melhores histórias por categoria de sua filial.</p>
					<p>Será um total de 15 histórias por filial.</p><br />

					<p><strong>Participe da apuração e sua filial estará concorrendo a um prêmio especial!</strong></p>
					<p><strong>O prazo de participação é de 06 a 10 de abril de 2015.</strong></p><br />

					<p class="black"><strong>ATENÇÃO:</strong></p>

					<p class="black"><strong>O SUCESSO DO PROJETO DEPENDE DA SUA PARTICIPAÇÃO.</strong></p>
					<p class="black"><strong>PORTANTO, FIQUE ATENTO E PARTICIPE!</strong></p>

					<p class="black"><strong>É RÁPIDO, FÁCIL E TRANQUILO.</strong></p><br />

					<p class="black">Para mais informações, <a href="#">clique aqui</a> e leia o</p>
					<p class="black">Regulamento de Premiação Interna.</p><br />

					<p class="black"><strong>DIGITE ABAIXO O SEU CPF E ACESSE O SISTEMA DE APURAÇÃO:</strong></p>
				</div>
			<?php } ?>
			<style type="text/css">
			pre {
				display: none !important;
			}
			.error-message {
				line-height: 2;
			}
			</style>
		    <div class="lock-wrapper login-wrap">
		        <div class="lock-box text-center">
		          <!--  <div class="lock-name">Seja bem-vindo</div>
		            <img src="<?php echo $this->Html->url('/app/webroot/css/template/images/lock_thumb.jpg', true); ?>" alt="lock avatar"/> -->
		            <div class="lock-pwd">               
				       <form class="form-inline" action="<?php //echo $this -> Html -> url('/usuarios/login', true); ?>" id="UsuarioLoginForm" method="post">            	                                        
			                <?php //echo (!$loginErro == FALSE) ?'<script> jQuery("header").css("display","none"); alert("Cpf não consta na nossa base de dados !!")</script>' : "";  ?>
					        <div class="form-group">
					            <input name="data[Usuario][username]" id="UsuarioUsername" type="hidden" value="" class="form-control">
				                <input name="data[Usuario][password]" id="UsuarioPassword" type="text" alt="cpf-senha" class="form-control lock-input" placeholder="Digite o CPF" autofocus>		            
				                <button class="btn btn-lock" type="submit">
		                            <i class="fa fa-arrow-right"></i>
		                        </button>
		                    </div>			
						</form>
						<?php $loginErro = $this->Session->flash('login');  echo $loginErro ; ?>   
		            </div>
		            <div class="ser-login-info"></div>
		        </div>
		    </div>
		</div>
	    <br style="clear: both" />
	</div>
    <script>
		jQuery('header').css("display","none"); 
        
    </script>

</body>