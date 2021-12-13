<?php 

session_start();
  if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
    } 

    $json_str = file_get_contents('produtos.json');
                     $jsonObj = json_decode($json_str);
        $item = 0;
           

//variaveis que receberao os dados do email
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$data_envio = date('d/m/Y');



 
 $tudojunto = "";

  foreach($_SESSION['carrinho'] as $id => $qtd){
      $item++;
      

                               //faz looping no arquivo json                            
                            foreach ( $jsonObj as $e )
                       {
                        // faz comparação entre id da session e do json                         
                         if($id == $e->id){
 
                          
                        $tudojunto.=$item." &nbsp".$e->cod." &nbsp ".$e->nome."<br>"; 
                         /*echo '<tr>  

                                 <td>'.$item.'</td>
                                 <td>'.$e->cod.'</td>
                                 <td>'.$e->nome.'</td><br>
                                 
                              </tr>';*/
                        }

                    }
                }

     

//corpo email
$arquivo ="

<html>
   <table width='510' >
            <tr>
              <td>
            <tr>
                 <td width='500'>Nome: $nome</td>
                </tr>
                <tr>
                  <td width='320'>Telefone: $telefone</td>
                </tr>
                <tr>
                  <td width='320'>E-mail: $email</td>
                 </tr>
               

                     <tr>
                  <td width='320'>Mensagem: $mensagem</td>
                </tr>
            </td>
          </tr> 
          
          <tr>
            <td>Este e-mail foi enviado em <b>$data_envio</b></td>
          </tr>
          <tr>
          <td><hr></hr></td> 
          </tr>
          <tr>
          <td>Orçamento:</td>
          </tr>
          <tr>
          <td>$tudojunto
                </td>
          </tr>

          

        </table>

           
</html>

";

//enviar
   
  // emails para quem será enviado o formulário
  $emailenviar = "sergio.amd@hotmail.com";
  $destino = $emailenviar;
  $assunto = "Contato pelo Site";
 
  // É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= ('Content-type: text/html; charset=utf-8') . "\r\n";
      $headers .= 'From: $email';
  //$headers .= "Bcc: $EmailPadrao\r\n";
   
  $enviaremail = mail($destino, $assunto, $arquivo, $headers);
  if($enviaremail){
  $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
  echo " <meta http-equiv='refresh' content='10;URL=index.php'>";
  echo $mgm;
  } else {
  $mgm = "ERRO AO ENVIAR E-MAIL!";
  echo "";
  }

 session_destroy(); 

?>