<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Relatório Orçamento</title>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="scss/main.css">
    </head>
<body>
 <div class="container">
   <h1>Relatório Orçamento</h1>
 <table class="table table-striped table-borderless table-sm table-responsive">
   <a class="btn btn-info btn-sm" href="carrinho.php">Voltar</a>
   
     
  <thead>
       <tr>
      
      <th>Itens</th>
      <th>Código</th>
      <th>Descrição</th>
    </tr>
  </thead>
<?php
session_start();
 if(!isset($_SESSION['carrinho'])){ 
    $_SESSION['carrinho'] = array(); 
  }
 
        if(count($_SESSION['carrinho']) == 0){
          echo '
        <tr>
          <td colspan="5">Não há produto no carrinho</td>
        </tr>
      ';
          } else {
                require("config.php");
                $objDb = new db();
                $link = $objDb->conecta_mysql();

                $cont=0;
                
                foreach($_SESSION['carrinho'] as $id => $qtd){
                        $sql   = "SELECT * FROM product WHERE id= '$id'";
                        $result = mysqli_query($link, $sql);

                        $row = $result->fetch_assoc();
                        $cont++;
                        echo '<tr>
                                <td>'.$cont.'</td> &nbsp &nbsp
                                <td> '.$row['codigo'].'</td>&nbsp &nbsp 
                                <td> '.$row['name'].'</td></br>
                              </tr>
                        ';


                        
                }
                
          }

    

?>
</table>
</br>
<hr></hr>
<div class="formularioEmail">
  <form action="envioOrcamento.php" name="envioOrcamento" method="post">
     <div class="form-group row">
    <label for="Nome" class="col-sm-2 col-form-label">Nome:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="Nome" required="required" name="nome" placeholder="nome">
    </div>
  </div>
  <div class="form-group row">
    <label for="Email" class="col-sm-2 col-form-label">E-mail;</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="Email" required="required" name="email" placeholder="email@email.com">
    </div>
  </div>
  <div class="form-group row">
    <label for="Fone" class="col-sm-2 col-form-label">Telefone:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="Fone" required="required" name="fone" placeholder="digite seu telefone">
    </div>
  </div>
  <div class="form-group row">
    <label for="textArea" class="col-sm-2 col-form-label">Message:</label>
    <div class="col-sm-6">
      <textarea class="form-control" id="textArea" name="area" rows="2"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-8">
  <input type="submit" class="btn btn-success btn-sm" style="float:right;" value="enviar "></a>
  </div>  
</div>
    

    
 

  </form>

</div>
</div>
</body>
</html>