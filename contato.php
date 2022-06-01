<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="content-language" content="pt-br">
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="description" content="Romak - Automação Comercial. Venda de balanças, registradoras, calculadoras, teclados de membrana, bobinas, assitência técnicia, e suprementos de automação comercial em Porto Alegre - Rio Grande do Sul / RS">
		<meta name="keywords" content="balanças,registradoras,calculadoras,teclados de membrana,bobinas,assitência técnicia,suprementos">
		<meta name="robots" content="index/follow">

		<title>Romak - Automação Comercial. Venda de balanças, registradoras, calculadoras, teclados de membrana, bobinas, assitência técnicia, e suprementos de automação comercial em Porto Alegre - Rio Grande do Sul / RS</title>

		<link type="image/x-icon" rel="shortcut icon" href="favicon.ico">
		<link type="text/css" rel="stylesheet" href="scss/main.css">
	</head>
	<body>

		<?php include 'menu.php'; ?>

		<section class="main-section">
			<div class="container">
				<h3>Contato</h3>
				<p class="padding-bottom">
					Entre em contato preenchendo o formulário abaixo.
				</p>

				<div class="row margin-bottom padding-bottom">
					<div class="col col-phone-12 text-justify">
						<?php
						  $action=$_REQUEST['action'];
						  if ($action=="") {
						  ?>

						    <form  action="" method="POST" enctype="multipart/form-data">
							    <input type="hidden" name="action" value="submit">

									<label class="block">Nome</label>
									<div class="field margin-bottom">
										<input name="name" type="text" value="" size="30" placeholder="Digite seu nome">
									</div>

									<label class="block">E-mail</label>
									<div class="field margin-bottom">
										<input name="email" type="text" value="" size="30" placeholder="Digite seu e-mail. Ex.: seu@email.com.br" >
									</div>

									<label class="block">Telefone</label>
									<div class="field margin-bottom">
										<input name="telephone" type="text" value="" size="20" placeholder="(DDD) + Número">
									</div>

									<label class="block">Menssagem</label>
									<div class="field margin-bottom">
										<textarea name="message" placeholder="Digite aqui sua mensagem"></textarea>
									</div>

									<div style="max-width: 480px;" class="text-right">
										<input class="button button-brand" type="submit" value="Enviar"/>
									</div>
						    </form>

						  <?php
						  } else {
						    $name=$_REQUEST['name'];
						    $email=$_REQUEST['email'];
								$telephone=$_REQUEST['telephone'];
						    $message=$_REQUEST['message'];

								$to = "romakvendas@gmail.com";

								$headers  = 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								$headers .= 'From: '.$from."\r\n" . 'Reply-To: '.$from."\r\n" . 'X-Mailer: PHP/' . phpversion();

						    if (($name=="")||($email=="")||($message=="")||$telephone=="") {
						      echo "Todos os campos são obrigatórios.<br> <a class=\"button button-brand margin-top\" href=\"contato.php\">Retornar ao formulário de contato</a>";
							  } else {
						      $from="De: $name<$email>\r\nReturn-path: $email";
						      $subject="Mensagem enviada do site Romak.";

									$emailbody = "<b>Nome: </b>" . $name . "<br>" . "<b>Telefone: </b>: " . $telephone . "<br>" . "<b>E-mail: </b>" . $email . "<br>" . "<b>Mensagem: </b>" . $message;

						      mail($to, $subject, $emailbody, $headers);
						      echo "Mensagem enviada com sucesso! Em breve retornaremos seu contato.<br><a class=\"button button-brand margin-top\" href=\"contato.php\">Enviar nova mensagem</a>";
						    }
						  }
						?>

					</div>
				</div>
			</div>
		</section>

		<?php include 'rodape.php'; ?>

		<script type="text/javascript" src="scripts/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="scripts/main.js"></script>
	</body>
</html>
