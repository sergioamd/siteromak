<?php
session_start();
 if(!isset($_SESSION['carrinho'])){ 
    $_SESSION['carrinho'] = array(); 
  }

//Variáveis
$nome = $_POST['nome'];
$email = $_POST['email'];
$fone = $_POST['fone'];
$area = $_POST['area'];
                  
                $cont=0;
                
               $teste='';
                foreach($_SESSION['carrinho'] as $id => $qtd){

                       require("select1.php");
                        //variavel contadora                        
                        $cont++;
                        //variavel que recebe os dados da session
                        $produtos.=$cont." - ". $_SESSION["codigo"]. " - " . $_SESSION["nome"]."</br>";
                        
                          } 
// Corpo E-mail
$arquivo="
 <html>
 <td>Nome: $nome</td></br>
 <td>E-mail: $email</td></br
 <td>Telefone: $fone</td></br>
 <td>Descricao: $area</td></br>
 <td>_____________________</td></br>
 <td>Produtos para orçamento</td></br>
 <td> $produtos </td></br>
 <td> </td>
 </html>
";




// emails para quem será enviado o formulário
$emailenviar = "romakvendas@gmail.com";
$destino = $emailenviar;
$assunto = "orcamento pelo site";

// É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'From: $nome <$email>';
  //$headers .= "Bcc: $EmailPadrao\r\n";

$enviaremail = mail($destino, $assunto, $arquivo, $headers);
  if($enviaremail){
  $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
  echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
  } else {
  $mgm = "ERRO AO ENVIAR E-MAIL!";
  echo "";
  }


?>