<?php 
	session_start();
	if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
    }	

	 	
	 	 //adiciona produto
        
      if(isset($_GET['acao'])){

              
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){
               $_SESSION['carrinho'][$id] = 1;
            }else{
               $_SESSION['carrinho'][$id] += 1;
            }
         }

                   
         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
               unset($_SESSION['carrinho'][$id]);
            }
         }
           
         //ALTERAR QUANTIDADE
         /*if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $id => $qtd){
                  $id  = intval($id);
                  $qtd = intval($qtd);
                  if(!empty($qtd) || $qtd <> 0){
                     $_SESSION['carrinho'][$id] = $qtd;
                  }else{
                     unset($_SESSION['carrinho'][$id]);
                  }
               }
            }
         }*/
        
      }  


           
?>
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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
       
		<title>Romak - Automação Comercial. Venda de balanças, registradoras, calculadoras, teclados de membrana, bobinas, assitência técnicia, e suprementos de automação comercial em Porto Alegre - Rio Grande do Sul / RS</title>
		<link type="image/x-icon" rel="shortcut icon" href="favicon.ico">
		<link type="text/css" rel="stylesheet" href="scss/main.css">
	</head>
	<body>

		<?php include 'menu.php'; ?>

	<div class="container">
		<div class="card mt-5">
			 <div class="card-body">
	    		<h2 class="card-title">Listagem Orçamento</h2>
	    		<a class="btn btn-success" href="carrinho.php">VOLTAR</a></button>
	    		
	    		
	    	</div>
	    	<br>
		</div>

		
			
			<table class="table table-borderless">
				<thead>
					<tr>
						
						<th>Items</th>
						<th>Codigo</th>
						<th>Descrição</th>
						
					</tr>				
				</thead>
				<tbody>


                    <?php
                       $json_str = file_get_contents('produtos.json');
	                   $jsonObj = json_decode($json_str);
                           
                        $item = 0;

                        // faz looping na session carrinho
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                        	$item++;
                         //faz looping no arquivo json                           	
                            foreach ( $jsonObj as $e )
	                     {
                        // faz comparação entre id da session e do json                         
                         if($id == $e->id){

                           echo '<tr>  

                                 <td>'.$item.'</td>
                                 <td>'.$e->cod.'</td>
                                 <td>'.$e->nome.'</td>
                                 
                              </tr>';
                        }
                    }
                }
                                  
               ?>

				</tbody>
				
			</table>
        
        <!--<button type="submit" class="btn btn-primary">Enviar Orcamento</button>-->
	

	

	      <div class="container">
               <hr></hr>
                  <p style="color: red;">O orçamento ira automaticamente junto com o e-mail e so preencher os dados e enviar</p>
               <hr></hr>
                            

             <div style=" width: 400px; color: blue;">

                  <form method="POST" action="enviar.php">
                       
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="nome" class="form-control" name="nome" placeholder="Seu Nome">
                      </div>
                      <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="Seu E-mail">
                      </div>
                      <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" class="form-control" name="telefone" placeholder="Telefone">
                      </div>
                      <div class="form-group">
                        <label>Mensagem</label>
                        <textarea class="form-control" name="mensagem" rows="3"></textarea>
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Enviar</button>

                  </form> 

            
             </div>
              	
        </div>

</div>              		

		<script type="text/javascript" src="scripts/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="scripts/main.js"></script>
			
</body>
</html>