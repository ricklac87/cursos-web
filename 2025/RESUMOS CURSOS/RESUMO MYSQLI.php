<?php
        //*Para realizar a conexão com o banco de dados
    $servidor = "localhost";    //usando o servidor local do xampp
    $usuario = "root";          //usuario padrão do xampp
    $senha = "";                //não foi definida uma senha no xampp
    $dbname = "cfb02";          //nome do banco de dados no myphpadmin

    $conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);      
//           //*para fazer a conexão com o banco de dados
//           //*ou mysqli_connect("localhost","root","","cfb02")

    if (!$conexao) {     //se não tiver conexao...
        die("Houve um erro" .mysqli_connect_error());      //mysqli_connect_error() é o código do erro
    }


          //*para obter os dados do formulário
//     $vproduto = $_REQUEST["produto"] ?? "Sem produto";   
//     $vpreco = str_replace(",",".",$_REQUEST["preco"]) ?? "Desconhecido";    //*para substituir virgula por ponto
//     $vquantidade = $_REQUEST["quantidade"] ?? "Desconhecido";   
//     $vcategoria = $_REQUEST["categoria"] ?? "Desconhecido";   


          //*Para inserir os dados do formulário no banco de dados
    //$sql = "INSERT INTO tb_produtos VALUES (NULL, '$vproduto', $vpreco , $vquantidade, '$vcategoria')";    
          //*caso os campos da tabela sejam VARCHAR, é preciso colocar as variáveis entre aspas simples
          //*caso os campos da tabela sejam INT ou FLOAT, não precisa colocar entre aspas
          //*primeiro campo (código) é NULL pois está configurado no banco de dados como auto-incremento 

          //*Para checar se houve algum erro durante o cadastro do formulário
//     if(mysqli_query($conexao, $sql)) {             
//         echo "Produto cadastrado com sucesso <br><br>";
//     }
//     else {
//         echo "Erro " .mysqli_connect_error($conexao);
//     }

    
         //*para fazer a consulta de todos os dados que estão na tabela
    // $consulta = mysqli_query($conexao, "SELECT * FROM tb_produtos"); 
    // $linhas = mysqli_num_rows($consulta);   
    //     *para imprimir a quantidade de linhas registradas na tabela
    // echo "Número de registros na tabela tb_produtos: $linhas <br>";
    
    
          //*para saber a quantidade de itens de uma categoria
    // $consulta = mysqli_query($conexao, "SELECT * FROM tb_produtos WHERE categoria = 'geladeira'"); 
    // $qtd = mysqli_num_rows($consulta);           
    // echo "Número de geladeiras: $qtd <br>";


          //*para saber a quantidade de itens de mais de uma categoria
    // $consulta = mysqli_query($conexao, "SELECT * FROM tb_produtos WHERE categoria = 'geladeira' OR categoria = 'tv'"); 
    // $qtd = mysqli_num_rows($consulta);           
    // echo "Número de geladeiras e TVs: $qtd <br>";

              //*para saber a quantidade de itens de mais de uma categoria
    // $consulta = mysqli_query($conexao, "SELECT * FROM tb_produtos WHERE categoria = 'geladeira' AND categoria = 'tv'"); 
    // $qtd = mysqli_num_rows($consulta);           
    // echo "Número de geladeiras e TVs: $qtd <br>";


          //*para saber o número de linhas afetadas
    // $linhas = mysqli_affected_rows($conexao);
    // echo "Número de linhas afetadas: $linhas <br>";
    // if ($linhas == 1){
    //     echo "Registro gravado com sucesso <br>";
    // }
    // else {
    //     echo "Falha na gravação do registro <br>";
    // }


          //*para imprimir todos os itens de uma categoria
    // $consulta = "SELECT * FROM tb_produtos WHERE categoria = 'geladeira'";
    // $res = mysqli_query($conexao , $consulta);
    // while($reg = mysqli_fetch_row($res)){
    //     $print_codigo = $reg[0];
    //     $print_produto = $reg[1];
    //     $print_preco = $reg[2];
    //     $print_quantidade = $reg[3];
    //     $print_categoria = $reg[4];
    //     echo "
    //         Código: $print_codigo <br>
    //         Produto: $print_produto <br>
    //         Preço: $print_preco <br>
    //         Quantidade: $print_quantidade <br>
    //         Categoria: $print_categoria <br><br>
    //     ";
    // };
          //*Pode-se colocar esses valores dentro de uma tabela: 
          //*VIDEO: https://www.youtube.com/watch?v=j9SyluyPOis&list=PLx4x_zx8csUgB4R1dDXke4uKMq-IrSr4B&index=34


            //*Para imprimir todos os itens cadastrados
    // $consulta = mysqli_query($conexao, "SELECT * FROM tb_produtos") or die(mysqli_connect_error());
    // while ($reg = mysqli_fetch_assoc($consulta)) {
    //       echo $reg['produto'] . "<br>";
    // }

    
          //*para procurar itens de uma tabela que possuam uma determinada palavra 
    // $consulta = "SELECT * FROM tb_produtos WHERE produto LIKE '%frostfree%'";       
          //*O código '%frostfree%' significa que estou procurando produtos com palavras antes e depois da palavra frostfree
          //*O código 'TV%' significa que estou procurando produtos que comecem com a palavra TV
          //*O código '%HD' significa que estou procurando produtos que terminem com a palavra HD
    // $res = mysqli_query($conexao , $consulta);  
    // while($reg = mysqli_fetch_row($res)){
    //     $print_produto = $reg[1];
    //     echo "Produto: $print_produto <br>"; 
    // };


              //*para procurar itens de uma tabela que possuam uma determinada letra em uma posição
    // $consulta = "SELECT * FROM tb_produtos WHERE produto LIKE '_e%'";       
              //*O código '_e%' significa que estou procurando produtos que possuam a letra e na 2a posição
              //*O código 'B%' significa que estou procurando produtos que comecem com a letra B
              //*O código 'C%r%s' significa que estou procurando produtos que comecem com a letra C, tenham a letra r no meio e terminem com a letra s
              //*O código '__s%o' significa que estou procurando produtos que tenham a letra s na 3a posição e terminem com a letra o
    // $res = mysqli_query($conexao , $consulta);  
    // while($reg = mysqli_fetch_row($res)){
    //     $print_produto = $reg[1];
    //     echo "Produto: $print_produto <br>";
    // };


              //*para procurar itens de uma tabela que NÃO possuam uma determinada letra ou palavra
    // $consulta = "SELECT * FROM tb_produtos WHERE produto NOT LIKE 'Geladeira%'";       
              //*O código NOT LIKE 'Geladeira%' significa que estou procurando produtos que não comecem com a palavra Geladeira
    // $res = mysqli_query($conexao , $consulta);  
    // while($reg = mysqli_fetch_row($res)){
    //     $print_produto = $reg[1];
    //     echo "Produto: $print_produto <br>";
    // };


              //*para deletar itens de uma tabela 
    // $delete = "DELETE FROM tb_produtos WHERE categoria = 'geladeira'";  
              //*para checar se tudo deu certo durante a eliminação
    // if (mysqli_query($conexao,$delete)){
    //     echo "Registro deletado com sucesso <br>";
    // }
    // else {
    //     echo "Falha na eliminação do registro <br>" . mysqli_error($conexao);
    // }

    
    
    


    echo "<a href='cfb02.html'>VOLTAR</a>";

    mysqli_close($conexao);    //*para fechar a conexão





/////////////////////////////////////////////////////////////////////////////////

    //CONEXÃO MYSQL (MODO PROCEDURAL)

    // $conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);      

    // if (mysqli_connect_errno()) {
    //     die ("Erro de conexão: (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
    // }

    // $vproduto = mysqli_real_escape_string($conexao, "Geladeira 01");  
    // $vpreco = mysqli_real_escape_string($conexao, "1202.03");
    // $vquantidade = mysqli_real_escape_string($conexao, "14");   
    // $vcategoria = mysqli_real_escape_string($conexao, "geladeira");   


    // $sql_add = "INSERT INTO tb_produtos VALUES (NULL, '$vproduto', $vpreco , $vquantidade, '$vcategoria')";    

    // if(mysqli_query($conexao, $sql_add)) {             
    //     echo "Produto cadastrado com sucesso <br><br>";
    // }
    // else {
    //     echo "Erro: " .mysqli_connect_error($conexao);
    // }


    // $consulta = mysqli_query($conexao, "SELECT * FROM tb_produtos") or die(mysqli_connect_error());
    // while ($reg = mysqli_fetch_assoc($consulta)) {
    //     echo $reg['produto'] . "<br>";
    // }


    // echo "<a href='cfb03.php'>F5</a>";

    // mysqli_close($conexao);    

    ?>