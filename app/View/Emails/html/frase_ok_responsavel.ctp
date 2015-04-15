<?php 
$nome = $this->data['Concurso']['nome'];
$responsavel = explode(' ', $this->data['Concurso']['nome_responsavel']);
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
						Olá <? echo $responsavel[0];?>
						<br />
						<br />
						<span style="line-height: 22px;"> 						
							Está confirmada a participação de<br />
							<b><? echo $nome ?><br /></b>
							no Concurso Cultural Kumon!
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