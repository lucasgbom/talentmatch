<?php 
   include('../conexao/conexao.php');
   
   $arquivo_temp = $_FILES['arquivo']['tmp_name'];
echo($arquivo_temp);
   if (move_uploaded_file($arquivo_temp, "../Imagens")) {
    echo "Arquivo enviado com sucesso!";
}
   var_dump($foto);

   ?>