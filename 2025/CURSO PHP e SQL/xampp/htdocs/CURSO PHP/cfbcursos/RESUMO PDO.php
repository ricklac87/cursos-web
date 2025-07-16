<?php
        
    /////////////////////////CONEXÃO COM O BANCO DE DADOS//////////////////////////////
        
    $servidor = "localhost";    
    $porta = 3306;         //*porta do mysql
    //$porta = 5432;       //*porta do postgresql
    $dbname = "cfb02";  
    $usuario = "root";          
    $senha = "";                
    $dsn = "mysql: host=$servidor ; port=$porta ; dbname=$dbname";   
    //$dsn = "pgsql: host=$servidor ; port=$porta ; dbname=$dbname";   

    // define('HOST', '127.0.0.1');
    // define('PORT', '5432');
    // define('DBNAME', 'cfb02');
    // define('USER', 'root');
    // define('PASSWORD', '');
    
    try {
        $conexao = new PDO($dsn, $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($conexao) {
            echo "Conectado com sucesso!<br>";
        }
    } catch (PDOException $e) {
        echo "Conexão falhou!: " . $e->getMessage();
    }

    /////////////////////////INSERIR NO BANCO DE DADOS//////////////////////////////

    $vproduto = "Geladeira 02";  
    $vpreco = "2602.01";    //*aspas opcional
    $vquantidade = "18";    //*aspas opcional
    $vcategoria = "geladeira";  

        //*Para resolver os problemas de SQL Injection ao adicionar:
    $stmt = $conexao->prepare("INSERT INTO tb_produtos VALUES (NULL, :produto, :preco, :quantidade, :categoria)");
        // $stmt->bindParam(':produto', $vproduto);
        // $stmt->bindParam(':preco', $vpreco);
        // $stmt->bindParam(':quantidade', $vquantidade);
        // $stmt->bindParam(':categoria', $vcategoria);
    $resultSet = $stmt->execute([':produto' => $vproduto, ':preco' => $vpreco, ':quantidade' => $vquantidade, ':categoria' => $vcategoria]);

        //*Para resolver os problemas de SQL Injection usando ? como parâmetros:
    // $stmt = $conexao->prepare("INSERT INTO tb_produtos VALUES (NULL, ?, ?, ?, ?)");
    // $resultSet = $stmt->execute([$vproduto, $vpreco, $vquantidade, $vcategoria]);

    if($resultSet){
        echo "Os dados foram inseridos com sucesso. <br>";
    } else {
        echo "Ocorreu um erro e não foi possível inserir os dados. <br>";
    }

    /////////////////////////CONSULTA AO BANCO DE DADOS//////////////////////////////

            //*Para resolver os problemas de SQL Injection ao consultar
    $stmt = $conexao->prepare("SELECT * FROM tabela WHERE produto = :produto");
    $stmt->execute([':produto' => $vproduto]);


    $consulta = $conexao->query('SELECT * FROM tb_produtos');
    $consulta->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $consulta->fetch()) {
        echo $row['produto'] . "\t";
    }

        // $qtdeLinhasAfetadas = $conexao->exec("Delete From Cliente Where codigo_cliente = 1");

    $stmt = null;
    $conexao = null;

///////////////////////////////////////////////////////////////////////////////////

    //PDO 

// $vproduto = "Geladeira 10";  
    // $vpreco = "4602.01";
    // $vquantidade = "28";   
    // $vcategoria = "geladeira";  

    //FORMA 1:
    // $stmt = $conexao->prepare("INSERT INTO tb_produtos VALUES (NULL, :produto, :preco, :quantidade, :categoria)");
    // $resultSet = $stmt->execute([':produto' => $vproduto, ':preco' => $vpreco, ':quantidade' => $vquantidade, ':categoria' => $vcategoria]);
    // if($resultSet){
    //     echo "Os dados foram inseridos com sucesso.<br>";
    // }

    //FORMA 2:
    // $stmt = $conexao->prepare("INSERT INTO tb_produtos(produto,preco,quantidade,categoria) VALUES (:produto, :preco, :quantidade, :categoria)");
    // $resultSet = $stmt->execute([':produto' => $vproduto, ':preco' => $vpreco, ':quantidade' => $vquantidade, ':categoria' => $vcategoria]);
    // if($resultSet){
    //     echo "Os dados foram inseridos com sucesso.<br>";
    // }

    //FORMA 3:
    // $stmt = $conexao->prepare("INSERT INTO tb_produtos VALUES (NULL, ?, ?, ?, ?)");
    // $resultSet = $stmt->execute([$vproduto, $vpreco, $vquantidade, $vcategoria]);
    // if($resultSet){
    //     echo "Os dados foram inseridos com sucesso.<br>";
    // }

    //FORMA 4:
    // $stmt = $conexao->prepare("INSERT INTO tb_produtos(produto,preco,quantidade,categoria) VALUES (?, ?, ?, ?)");
    // $resultSet = $stmt->execute([$vproduto, $vpreco, $vquantidade, $vcategoria]);
    // if($resultSet){
    //     echo "Os dados foram inseridos com sucesso.<br>";
    // }

    // FORMA 5 (faltando parâmetros):
    // $stmt = $conexao->prepare("INSERT INTO tb_produtos(produto,preco) VALUES (?, ?)");
    // $resultSet = $stmt->execute([$vproduto, $vpreco]);
    // if($resultSet){
    //     echo "Os dados foram inseridos com sucesso.<br>";
    // }



    // $stmt = $conexao->prepare("SELECT * FROM tb_produtos WHERE produto = :produto");
    // $stmt->execute([':produto' => $vproduto]);


    // $consulta = $conexao->query('SELECT * FROM tb_produtos');
    // $consulta->setFetchMode(PDO::FETCH_ASSOC);

    // while ($row = $consulta->fetch()) {
    //     echo $row['produto'] . "\t";
    // }

    //////////////////////////////////////////////////////////////////////////////

        //USANDO UMA FUNÇÃO:
    // require_once 'conexao.php';

    // $mensagem = Incluir($_POST["produto"], $_POST["preco"], $_POST["quantidade"], $_POST["categoria"]);

    //  ....

    // function Incluir($vproduto, $vpreco, $vquantidade, $vcategoria){
    //     global $dsn, $user, $pass;
    //     $mensagem = "";
    //     try {
    //         $conexao = new PDO($dsn, $usuario, $senha);
    //         $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         $sql = "INSERT INTO tb_produtos VALUES (NULL, ?, ?, ?, ?)";
    //         $stmt = $conexao->prepare($sql);
    //         $stmt->execute([$vproduto, $vpreco, $vquantidade, $vcategoria]);
    //         $mensagem = "Os dados foram inseridos com sucesso. <br>";
    //     }
    //     catch (PDOException $e) {
    //         $mensagem = "Ocorreu um erro e não foi possível inserir os dados. <br>";
    //     }
    //     finally {
    //         if ($conexao) {
    //             $conexao = null;
    //         }
    //     }
    //     return $mensagem;
    // }

    //////////////////////////////////









?>

