<?php 
$nome = explode(' ', $this->data['Concurso']['nome']);
?>
<html>
	<head>
		<title>Concurso Cultural Kumon</title>
	</head>
	<body style="margin: 0 !important; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; color: #5BA6D3">
		<table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td><img style="border : 0 !important; padding: 0 !important" src="<?php echo $this->Html->url('/app/webroot/img/frase_enviada/email_mensagem-enviada_01.jpg', true);?>" /></td>
				<td><img style="border : 0 !important; padding: 0 !important" src="<?php echo $this->Html->url('/app/webroot/img/frase_enviada/email_mensagem-enviada_02.jpg', true);?>" /></td>
			</tr>
			<tr>
				<td><img style="border : 0 !important; padding: 0 !important" src="<?php echo $this->Html->url('/app/webroot/img/frase_enviada/email_mensagem-enviada_03.jpg', true);?>" /></td>
				<td style="text-align: center; background-image: url(<?php echo $this->Html->url('/app/webroot/img/frase_enviada/email_mensagem-enviada_04.jpg', true);?>)">
						<span> Olá <? echo $nome[0];?>
							<br />
							<br />
							<b>História enviada com
							<br />
							sucesso.</b> 
						</span>
						<br />
						<br />
						<span style="color: #505050; padding-top: 9px;"> Obrigado por participar do
							<br />
							Concurso Cultural Kumon!
							<br />
						</span>
						<br />
						<span style="font-weight: 100;color: #9E959E;font-size: 12px;line-height: 13px;"> Kumon
							<br />
							Instituto de Educação </span>
				</td>				
			</tr>
		</table>
	</body>
</html>