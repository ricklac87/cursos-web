<?php

    $servidor = "localhost";    
    $usuario = "root";          
    $senha = "";                
    $dbname = "cfb01";          

    $conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);     

    if (!$conexao) {     
        die("Houve um erro" .mysqli_connect_error());    
    }

?>