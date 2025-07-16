<?php

    include "cfb01.inc";

    /* Caso não queira importar o arquivo de conexão com o banco de dados (cfb01.inc):

    $servidor = "localhost";    //usando o servidor local do xampp
    $usuario = "root";          //usuario padrão do xampp
    $senha = "";                //não foi definida uma senha no xampp
    $dbname = "cfb01";          //nome do banco de dados no myphpadmin

    $conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);      //para fazer a conexão com o banco de dados
    //ou mysqli_connect("localhost","root","","cfb01")

    if (!$conexao) {     //se não tiver conexao...
        die("Houve um erro" .mysqli_connect_error());      //mysqli_connect_error() é o código do erro
    }
    
    */

    $nome = $_REQUEST["nome"] ?? "Sem nome";   
    $username = $_REQUEST["username"] ?? "Sem usuário";  
    $email = $_REQUEST["email"] ?? "Sem email";   
    $telefone = $_REQUEST["telefone"] ?? "Sem telefone";     
    $senha = md5($_REQUEST["senha"]) ?? "Sem senha";     //md5 para criptografar a senha como um hash
    $status = $_REQUEST["status"] ?? "Sem status";   
    $obs = $_REQUEST["obs"] ?? "Sem observação";   


    $sql = "INSERT INTO clientes VALUES (NULL, '$nome','$username','$senha','$email','$telefone',$status,'$obs')";    
    //caso os campos da tabela sejam VARCHAR, é preciso colocar as variáveis entre aspas simples
    //caso os campos da tabela sejam INT ou FLOAT, não precisa colocar entre aspas
    //primeiro campo (código) é NULL pois está configurado no banco de dados como auto-incremento 

    if(mysqli_query($conexao, $sql)) {             
        echo "Usuário cadastrado com sucesso <br>";
    }
    else {
        echo "Erro" .mysqli_connect_error($conexao);
    }


    $consulta = mysqli_query($conexao, "SELECT * FROM clientes"); 
    //*para fazer a consulta de todos os dados que estão na tabela clientes
    $linhas = mysqli_num_rows($consulta);           
    echo "Número de registros na tabela clientes: $linhas <br>";
    //*para imprimir a quantidade de linhas registradas na tabela


    $linhas = mysqli_affected_rows($conexao);
    echo "Número de linhas afetadas: $linhas <br>";
    //*para saber o número de linhas afetadas
    if ($linhas == 1){
        echo "Registro gravado com sucesso <br>";
    }
    else {
        echo "Falha na gravação do registro <br>";
    }


    echo "<a href='http://localhost/CURSO%20PHP/cfbcursos/cfb01.html'>VOLTAR</a>";

    mysqli_close($conexao);    //*para fechar a conexão



?>

