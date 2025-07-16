<?php
    include("conexao.inc");     //*para importar o que foi digitado no arquivo conexao.inc

    /*

    $servidor = "localhost";    //usando o xampp
    $usuario = "root";          //usuario padrão do xampp
    $senha = "";                //não foi definida uma senha no xampp
    $dbname = "cadastro 14-12-23";

    $conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);      //antigamente era mysql_connect() 

    if (!$conexao) {     //se não tiver conexao...
        die("Houve um erro" .mysqli_connect_error());      //mysqli_connect_error() é o código do erro
    }

    */


    $nome = $_REQUEST["nome"] ?? "Sem nome";   
    $sobrenome = $_REQUEST["sobrenome"] ?? "Sem sobrenome";  
    $email = $_REQUEST["email"] ?? "Sem email";   
    $senha = md5($_REQUEST["senha"]) ?? "Sem senha";     //md5 para embaralhar a senha como um hash

    echo "<h2>
        Nome: $nome  
        <br>
        Sobrenome: $sobrenome
        <br>
        Email: $email
        <br>
        Senha: $senha
      </h2>";

    $sql = "INSERT INTO tabela01(nome,sobrenome,email,senha) VALUES ('$nome','$sobrenome','$email','$senha')";    //caso os campos da tabela sejam VARCHAR, é preciso colocar as variáveis entre aspas simples

    if(mysqli_query($conexao, $sql)) {
        echo "Usuário cadastrado com sucesso";
    }
    else {
        echo "Erro" .mysqli_connect_error($conexao);
    }

    mysqli_close($conexao);
?>