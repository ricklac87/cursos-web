<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>
        <?php /*

            <?php echo "Texto de exemplo 1"; ? >
            <?php print "Texto de exemplo 2"; ? >
            <?= "Texto de exemplo 3" ? >

            echo "\u{1F30E}";   *para inserir emoji

            phpinfo();        *Para obter dados do servidor

            var_dump($_GET);   
            
            $nome = $_GET["nome"];   
            $sobrenome = $_GET["sobrenome"];  

            $nome = $_GET["nome"] ?? "sem nome";                          *operador de coalescência nula 
            $sobrenome = $_GET["sobrenome"] ?? "desconhecido";            *operador de coalescência nula 

            /////////////////////////////

            VIDEO: https://www.youtube.com/watch?v=Sa0geI71RgA&list=PLHz_AreHm4dlFPrCXCmd5g92860x_Pbr_&index=35

            $_GET              *variavel superglobal
            $_POST              *variavel superglobal
            $_REQUEST              *variavel superglobal
            $_COOKIE              *variavel superglobal
            $_FILES              *variavel superglobal
            $_SESSION              *variavel superglobal
            $_ENV             *variavel superglobal
            $_SERVER              *variavel superglobal
            GLOBALS             *variavel superglobal

            setcookie("dia-da-semana" , "SEGUNDA" , time() + 3600);       *parar criar um cookie
            var_dump($_COOKIE)

            session_start();                                  *para criar uma session
            $_SESSION["teste"] = "FUNCIONOU";

            /////////////////////////////////

            https://www.youtube.com/watch?v=TuNj2zXQuOw&list=PLHz_AreHm4dlFPrCXCmd5g92860x_Pbr_&index=35
            Formulários retroalimentados

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" id="formulario">
                <label for="nome">Nome: </label>
                <input type="text" id="idnome" name="nome"><br>
                <label for="sobrenome">Sobrenome: </label>
                <input type="text" id="idsobrenome" name="sobrenome"><br>
                <button type="submit" id="btn">ENVIAR</button>
            </form>

            <div>
                <?php

                    $nome = $_REQUEST["nome"] ?? "Sem nome";   
                    $sobrenome = $_REQUEST["sobrenome"] ?? "Sem sobrenome";   

                echo "<div>
                        Nome: $nome  <br>
                        Sobrenome: $sobrenome
                      </div>";

                ?>
            </div>

            Obs: É possível simplicar a super tag:
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get" id="formulario">

            ////

                <?php
                    $valor1 = $_REQUEST["valor1"] ?? "0";   
                    $valor2 = $_REQUEST["valor2"] ?? "0";  
                ?>
        
            <form action="<?= $_SERVER["PHP_SELF"] ?>" method="get" id="formulario">
                <label for="valor1">Valor 1: </label>
                <input type="text" id="idvalor1" name="valor1" value="<?= $valor1 ?>"> <br>
                <label for="valor2">Valor 2: </label>
                <input type="text" id="idvalor2" name="valor2" value="<?= $valor2 ?>"> <br>
                <button type="submit" id="btn">SOMAR</button>
            </form>

            <br>

            <div>
                <?php 
                    $soma = $valor1 + $valor2;

                    echo "<div>
                        Resultado: $soma;
                      </div>";
                ?>
            </div>

            ////////////////////////////////////////////////////////////////////////

            Include / Require
            VIDEO: https://www.youtube.com/watch?v=QZMWuPbKgQA&list=PLx4x_zx8csUgB4R1dDXke4uKMq-IrSr4B&index=16
            https://pt.stackoverflow.com/questions/15286/quando-usar-require-include-require-once-e-include-once

            Importar dados de outro arquivo PHP:

            -Arquivo 1 (teste01.php):       
            <?php
                $valor1 = 7;
                $valor2 = 10;
            ?>

            -Arquivo 2 (teste02.php):
            <?php
                include "teste01.php";

                $soma = $valor1 + $valor2;

                echo "$soma";
            ?>

            Pode-se usar também include_once, require e require_once:
            include "teste01.php";
            include_once "teste01.php";
            require "teste01.php";
            require_once "teste01.php";

            O acréscimo de _once (para ambos os casos) diz ao PHP para verificar se o arquivo já foi incluído, caso ele tenha sido não será incluso novamente.

            Tratamento de erro: 
            include: se o arquivo não existe, a um warning (E_WARNING) é lançado mas sua aplicação continua funcionando (pode ser "abafado" com @)
            require: se o php não localizar o arquivo, um fatal error é lançado (E_COMPILE_ERROR). neste caso o script para.

            require & include são funções do "tipo" statement. A semântica correta do uso destas funções é: include 'file.php' ou require 'file.php';

            Em geral, recomenda-se usar require_once e include_once sempre que possível, pois eles ajudam a evitar erros e conflitos que podem ocorrer quando um arquivo é incluído várias vezes.

            Obs: Caso seja um arquivo de conexao com banco de dados, pode-se nomear o arquivo de conexao como .inc :
            Exemplo: conexao.inc

            //////////////////////////////////////////////////////////////////////

            Manipulação de data e hora:
            VIDEO: https://www.youtube.com/watch?v=2aZ0lxC5wDI&list=PLx4x_zx8csUgB4R1dDXke4uKMq-IrSr4B&index=15

            $dia = date("d");

            $mes = date("m");   *retorna o mes com indices de 0 a 11, portanto é preciso fazer:
            $meses = Array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto", "Setembro","Outubro","Novembro","Dezembro")
            echo $meses[$mes-1]

            $ano = date("y");  *ano com 2 digitos
            $ano = date("Y");  *ano com 4 digitos

            echo $dia . " de " . $meses[$mes-1] . " de " . $ano;

            $hora = date("h");   *hora no formato de 12 horas
            $hora = date("H");   *hora no formato de 24 horas
            Obs: Talvez a hora venha errada por causa das configurações do timezone do Apache. Ver o video.

            $minuto = date("i");

            $segundo = date("s");

            echo $hora . ":" . $minuto . ":" . $segundo;

            ///////////////////////////////////////////////////////////////////////////

            Função Isset:
            VIDEO: https://www.youtube.com/watch?v=wVEXdl3A5S0&list=PLx4x_zx8csUgB4R1dDXke4uKMq-IrSr4B&index=17

            Indica se uma variavel ou objeto foi criado ou definido dentro da página php
            Então pode ser usado para indicar que um formulário foi submetido
            
            $teste = "";

            if(isset($teste)){
                echo "Variável foi definida";
            }
            else{
                echo "Variável não foi definida";
            }

            Obs: Caso a variavel $teste não tenha sido declarada ou possua o valor nulo ($teste = NULL ou $teste;), cairá no else

            /////

            -Para verificar se um formulário foi submetido:

            <?php
                if(isset($_REQUEST["nome"])){
                    $vnome = $_REQUEST["nome"];
                    echo "Nome: $vnome <br>";
                }
                else{
                    echo "Dados não submetidos";
                                                        *O else só será fechado após o html
            ?>

            <html><head></head><body>
            <form action="nomedoarquivo.php" method="post" class="form">
                <label for="nome">Nome: </label>
                <input type="text" id="idnome" name="nome"><br>
                <button type="submit" class="btn">ENVIAR</button>
            </form>
            </body></html>

            <?php
                }                       *para fechar o else após o html
            ?>

            ////////////////////////////////////////////////////////////////////

            Passagem de valores de variaveis pela url:
            VIDEO: https://www.youtube.com/watch?v=wo2aWbY9OKI&list=PLx4x_zx8csUgB4R1dDXke4uKMq-IrSr4B&index=18

            -Arquivo 1 (teste01.php):
            <?php
                $texto = "Texto de exemplo";

                echo "<a href=teste02.php?tx=" . urlencode($texto) . " target=_self>CLIQUE AQUI</a>";
            ?>

            -Arquivo 2 (teste02.php):
            <?php
                $vtexto = $_GET["tx"];

                echo $vtexto;
            ?>

            ///////////////////////////////////////////////////////////////////////

            Para iniciar uma sessão:
            VIDEO: https://www.youtube.com/watch?v=exWolsOoNC8&list=PLx4x_zx8csUgB4R1dDXke4uKMq-IrSr4B&index=19

            session_start();           *para iniciar a sessão

            $_SESSION['vnome'] = "Bruno";      *para criar a variavel na sessão

            echo $_SESSION['vnome'];       *para imprimir a variavel criada

            unset($_SESSION['vnome']);      *para deletar a variavel criada

            session_destroy();          *para destruir a sessão  (é o mesmo que fechar o browser)

            /////////////////////////////////////////////////////////////////////////

            Para enviar um email:
            VIDEO: https://www.youtube.com/watch?v=ddBaTWH8UvY&list=PLx4x_zx8csUgB4R1dDXke4uKMq-IrSr4B&index=26

            /////////////////////////////////////////////////////////////////////////

            Banco de dados SQL:
            VIDEO: https://www.youtube.com/watch?v=5snuonRCPaA&list=PLx4x_zx8csUgB4R1dDXke4uKMq-IrSr4B&index=27

            Campos da tabela:
            cod : tipo = INT : Índice = PRIMARY : Extra: AUTO_INCREMENT (AI)
            nome : tipo = VARCHAR : Tamanho = 30
            username : tipo = VARCHAR : Tamanho = 15 : Índice = UNIQUE
            senha : tipo = VARCHAR : Tamanho = 15 
            email : tipo = VARCHAR : Tamanho = 40
            telefone : tipo = VARCHAR : Tamanho = 13
            status : tipo = INT :                     *Ex: status 1 para usuário liberado e 2 para usuário bloqueado
            obs : tipo = VARCHAR : Tamanho = 200        *Observações


            //////////////////////////////////////////////////////////////////////////

            PDO x MySQLi (diferenças):
            VIDEO: https://www.youtube.com/watch?v=FU0nsZhhGjE

                *Mysqli (orientado a objetos):
            $conexao = new mysqli($host, $user, $password, $database);
            if ($mysqli -> connect_errno) {
                die ("Erro de conexão: (" . $conexao->connect_errno . ") " . $conexao->connect_error);
            }
            $query_exec = $mysqli->query('SELECT * FROM tabela') or die($conexao->error);
            while ($clientes = $query_exec->fetch_assoc()) {
                echo $clientes['nome'] . "<br>";
            }

            $nome = $conexao->real_escape_string($_POST['name']);
            $valor = $conexao->real_escape_string($_POST['valor']);
            $query_exec = $mysqli->query("INSERT INTO tabela (nome , valor) VALUES ('nome', 'valor')");

            ////////

                *Mysqli (procedural):
            $conexao = mysqli_connect($host, $user, $password, $database);
            if (mysqli_connect_errno()) {
                die ("Erro de conexão: (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
            }

            $consulta = mysqli_query($conexao, "SELECT * FROM tb_produtos") or die(mysqli_connect_error());
            while ($reg = mysqli_fetch_assoc($consulta)) {
                echo $reg['produto'] . "<br>";
            }
            $nome = mysqli_real_escape_string($_POST['name']);
            $valor = mysqli_real_escape_string($_POST['valor']);
            $query_exec = mysqli_query("INSERT INTO tabela (nome , valor) VALUES ('nome', 'valor')");

            /////////


                *PDO (orientado a objetos):
            try {
                $conexao = new PDO("mysql:host={$host};dbname={$database}", $user, $password);
            } catch (PDOException $e) {
                die ("Erro de conexão: " . $e->getMessage());
            }

            $query_exec = $conexao->query('SELECT * FROM tabela');
            $query_exec->setFetchMode(PDO::FETCH_ASSOC);

            while ($clientes = $query_exec->fetch()) {
                echo $clientes['nome'] . "<br>";
            }

            $stmt = $conexao->prepare("INSERT INTO tabela (nome , valor) VALUES (:nome, :valor)");
            $stmt->bindParam(':nome', $_POST['nome']);
            $stmt->bindParam(':valor', $_POST['valor']);

            /////////////////////////////////////////////////////////////////////

            Mysqli(procedural):

            Para inserir no banco de dados com sql injection:

                $servidor = "localhost";    
                $usuario = "root";          
                $senha = "";                
                $dbname = "cfb02";          

                $conexao = mysqli_connect($servidor,$usuario,$senha,$dbname);      

                if (mysqli_connect_errno()) {
                    die ("Erro de conexão: (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
                }

                $vproduto = mysqli_real_escape_string($conexao, "Geladeira 01");  
                $vpreco = mysqli_real_escape_string($conexao, "1202.03");
                $vquantidade = mysqli_real_escape_string($conexao, "14");   
                $vcategoria = mysqli_real_escape_string($conexao, "geladeira");   


                $sql_add = "INSERT INTO tb_produtos VALUES (NULL, '$vproduto', $vpreco , $vquantidade, '$vcategoria')";    

                if(mysqli_query($conexao, $sql_add)) {             
                    echo "Produto cadastrado com sucesso <br><br>";
                }
                else {
                    echo "Erro: " .mysqli_connect_error($conexao);
                }















            


        */  
        ?>


    </h2>
</body>
</html>