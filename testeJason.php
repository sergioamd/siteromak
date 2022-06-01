<?php





$json_str = file_get_contents('produtos.json');
 
//faz o parsing da string, criando o array "empregados"
$jsonObj = json_decode($json_str);


 
//navega pelos elementos do array, imprimindo cada empregado


foreach ( $jsonObj as $e )
	    {
      
          
     echo "id: $e->id - nome: $e->first_name $e->last_name - email: $e->email<br>"; 
        
        }

        

   


?>
