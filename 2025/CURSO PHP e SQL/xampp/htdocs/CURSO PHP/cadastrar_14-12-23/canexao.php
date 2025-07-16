<?php
    $servidor = "localhost";    //usando o xampp
    $usuario = "root";          //usuario padrão do xampp
    $senha = "";                //não foi definida uma senha no xampp
    $dbname = "bd01";

    $conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);      //antigamente era mysql_connect() 

    if (!$conexao) {     //se não tiver conexao...
        die("Houve um erro" .mysqli_connect_error());      //mysqli_connect_error() é o código do erro
    }

?>