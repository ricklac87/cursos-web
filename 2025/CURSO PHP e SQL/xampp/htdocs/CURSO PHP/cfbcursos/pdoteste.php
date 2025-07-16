<?php
    //require_once "conexao.php";

    $servidor = "localhost";    
    $porta = 3306;         
    $dbname = "cfb02";  
    $usuario = "root";          
    $senha = "";                
    $dsn = "mysql: host=$servidor ; port=$porta ; dbname=$dbname";   

    try {
        $conexao = new PDO($dsn, $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conectado com sucesso!<br>";
    } catch (PDOException $e) {
        echo "Conexão falhou! Erro: " . $e->getMessage();
    }
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php  //FORMA 1

       $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
       if(!empty($dados['btn-enviar'])) {

            $vproduto = $_REQUEST["produto"] ?? "Sem produto";   
            $vpreco = str_replace(",",".",$_REQUEST["preco"]) ?? "Desconhecido";    
            $vquantidade = $_REQUEST["quantidade"] ?? "Desconhecido";   
            $vcategoria = $_REQUEST["categoria"] ?? "Desconhecido";   
    
            $sql = "INSERT INTO tb_produtos VALUES (NULL, ?, ?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $resultSet = $stmt->execute([$vproduto, $vpreco, $vquantidade, $vcategoria]);
    
            if($resultSet){
                echo "<p style='color: green;'>Os dados foram inseridos com sucesso.</p><br>";
            } else {
                echo "<p style='color: red;'>Os dados não foram inseridos com sucesso.</p><br>";
            }
            $stmt = null;             
            $conexao = null; 
       }
    ?>

    <?php  //FORMA 2

    //    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //    if(!empty($dados['btn-enviar'])) {

    //         $sql = "INSERT INTO tb_produtos VALUES (NULL, :produto, :preco, :quantidade, :categoria)";
    //         $stmt = $conexao->prepare($sql);

    //         $stmt->bindParam(':produto', $dados['produto'], PDO::PARAM_STR);
    //         $stmt->bindParam(':preco', $dados["preco"], PDO::PARAM_STR);     //*Não existe parametro para float
    //         $stmt->bindParam(':quantidade', $dados['quantidade'], PDO::PARAM_INT);
    //         $stmt->bindParam(':categoria', $dados['categoria'], PDO::PARAM_STR);

    //         $stmt->execute();
    
    //         if($stmt->rowCount()){
    //             echo "<p style='color: green;'>Os dados foram inseridos com sucesso.</p><br>";
    //         } else {
    //             echo "<p style='color: red;'>Os dados não foram inseridos com sucesso.</p><br>";
    //         }
    //         $stmt = null;             
    //         $conexao = null;          
    //    }
    ?>

    <!-- <form action="pdoteste.php" method="post" id="formulario"> -->
    <!-- <form action="?php echo $_SERVER['PHP_SELF'] ?" method="post" id="formulario"> -->
    <form action="" method="post" id="formulario">
        <label for="produto">Produto: </label>
        <input type="text" id="idproduto" name="produto" size="60" maxlength="50" required>
        <br>
        <label for="preco">Preço: </label>    
        <input type="text" id="idpreco" name="preco" size="10" required>
        <br>
        <label for="quantidade">Quantidade: </label>
        <input type="text" id="idquantidade" name="quantidade" size="10" required>
        <br>
        <label for="categoria">Categoria: </label>
        <input type="text" id="idcategoria" name="categoria" size="20" maxlength="10" required>
        <br>
        <input type="submit" name="btn-enviar" value="CADASTRAR"></button>
    </form>
       <br><br>

<script>
    
</script>
</body>
</html>


<?php
        
    // $servidor = "localhost";    
    // $porta = 3306;         
    // $dbname = "cfb02";  
    // $usuario = "root";          
    // $senha = "";                
    // $dsn = "mysql: host=$servidor ; port=$porta ; dbname=$dbname";   

    // try {
    //     $conexao = new PDO($dsn, $usuario, $senha);
    //     $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //          //$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);   //*para testes e debugging
    //     echo "Conectado com sucesso!<br>";
    // } catch (PDOException $e) {
    //     echo "Conexão falhou!: " . $e->getMessage();
    // }


        //     $conexao = new mysqli($servidor,$usuario,$senha,$dbname);      
        //     if ($conexao->connect_error) {
        //          die ("Erro de conexão: " . $conexao->connect_error);
        //     }
        //    echo "Conectado com sucesso! <br>";

    //////////////////////////////////
        //ADICIONAR CONTEÚDO

    //     FORMA 1 (sem proteção):
    // $vproduto = $_REQUEST["produto"] ?? "Sem produto";   
    // $vpreco = str_replace(",",".",$_REQUEST["preco"]) ?? "Desconhecido";    
    // $vquantidade = $_REQUEST["quantidade"] ?? "Desconhecido";   
    // $vcategoria = $_REQUEST["categoria"] ?? "Desconhecido";   

    // $sql = "INSERT INTO tb_produtos VALUES (NULL, '$vproduto', $vpreco , $vquantidade, '$vcategoria')";
    // $stmt = $conexao->prepare($sql);
    // $resultSet = $stmt->execute();

    // if($resultSet){
    //     echo "Os dados foram inseridos com sucesso. <br>";
    // } 

    //     FORMA 2 (com positional placeholders):
    // $vproduto = $_REQUEST["produto"] ?? "Sem produto";   
    // $vpreco = str_replace(",",".",$_REQUEST["preco"]) ?? "Desconhecido";    
    // $vquantidade = $_REQUEST["quantidade"] ?? "Desconhecido";   
    // $vcategoria = $_REQUEST["categoria"] ?? "Desconhecido";   

    // $sql = "INSERT INTO tb_produtos VALUES (NULL, ?, ?, ?, ?)";
    // $stmt = $conexao->prepare($sql);
    // $resultSet = $stmt->execute([$vproduto, $vpreco, $vquantidade, $vcategoria]);

    // if($resultSet){
    //     echo "Os dados foram inseridos com sucesso. <br>";
    // } 

    //         FORMA 3 (com named placeholders):
    // $vproduto = $_REQUEST["produto"] ?? "Sem produto";   
    // $vpreco = str_replace(",",".",$_REQUEST["preco"]) ?? "Desconhecido";    
    // $vquantidade = $_REQUEST["quantidade"] ?? "Desconhecido";   
    // $vcategoria = $_REQUEST["categoria"] ?? "Desconhecido";   

    // $data = [
    //     ':produto' => $vproduto,
    //     ':preco' => $vpreco,
    //     ':quantidade' => $vquantidade,
    //     ':categoria' => $vcategoria,
    // ];

    // $sql = "INSERT INTO tb_produtos VALUES (NULL, :produto, :preco, :quantidade, :categoria)";
    // $stmt = $conexao->prepare($sql);
    // $resultSet = $stmt->execute($data);

    // if($resultSet){
    //     echo "Os dados foram inseridos com sucesso. <br>";
    // } 


    //////////////////////////////////////////////
        //DELETAR CONTEÚDO

        //FORMA 1 (sem proteção):
    // $sql = "DELETE FROM tb_produtos WHERE categoria = 'geladeira'";
    // $stmt = $conexao->prepare($sql);
    // $resultSet = $stmt->execute();

    // if($resultSet){
    //     echo "Os dados foram removidos com sucesso. <br>";
    // } 

        //FORMA 2 (com positional placeholders):
    // $data = ['geladeira'];
    // $sql = "DELETE FROM tb_produtos WHERE categoria = ?";
    // $stmt = $conexao->prepare($sql);
    // $resultSet = $stmt->execute($data);

    // if($resultSet){
    //     echo "Os dados foram removidos com sucesso. <br>";
    // } 

        //FORMA 3 (com named placeholders):
    // $data = ['categoria' => 'ventilador'];
    // $sql = "DELETE FROM tb_produtos WHERE categoria = :categoria";
    // $stmt = $conexao->prepare($sql);
    // $resultSet = $stmt->execute($data);

    // if($resultSet){
    //     echo "Os dados foram removidos com sucesso. <br>";
    // } 

    //////////////////////////////////////////////
        //ATUALIZAR

            //FORMA 1 (sem proteção):
    // $sql = "UPDATE tb_produtos SET preco = 1299.99 WHERE categoria = 'geladeira'";
    // $stmt = $conexao->prepare($sql);
    // $resultSet = $stmt->execute();

    // if($resultSet){
    //     echo "Os dados foram alterados com sucesso. <br>";
    // } 

        //FORMA 2 (com positional placeholders):
    // $data = ['1299.99','geladeira'];
    // $sql = "UPDATE tb_produtos SET preco = ? WHERE categoria = ?";
    // $stmt = $conexao->prepare($sql);
    // $resultSet = $stmt->execute($data);

    // if($resultSet){
    //     echo "Os dados foram alterados com sucesso. <br>";
    // } 

            //FORMA 3 (com named placeholders):
    // $data = [
    //     'preco' => '2299.99',
    //     'categoria' => 'geladeira',
    // ];
    // $sql = "UPDATE tb_produtos SET preco = :preco WHERE categoria = :categoria";
    // $stmt = $conexao->prepare($sql);
    // $resultSet = $stmt->execute($data);

    // if($resultSet){
    //     echo "Os dados foram alterados com sucesso. <br>";
    // } 
        


    //////////////////////////////////////////////
        //CONSULTAR

    //         FORMA 1 (sem proteção):
    // $sql = "SELECT * FROM tb_produtos WHERE categoria = 'tv'";
    // $stmt = $conexao->query($sql);
    // foreach ($stmt as $row) {
    //     echo $row['produto'] . "<br>";
    // }

    //         FORMA 2 (com positional placeholders):
    // $data = ['geladeira'];
    // $sql = "SELECT * FROM tb_produtos WHERE categoria = ?";
    // $stmt = $conexao->prepare($sql);
    // $resultSet = $stmt->execute($data);
    // foreach ($stmt as $row) {
    //     echo $row['produto'] . "<br>";
    // }

    //         FORMA 3 (com named placeholders):
    // $data = ['categoria' => 'geladeira'];
    // $sql = "SELECT * FROM tb_produtos WHERE categoria = :categoria";
    // $stmt = $conexao->prepare($sql);
    // $resultSet = $stmt->execute($data);
    // foreach ($stmt as $row) {
    //     echo $row['produto'] . "<br>";
    // }

    //         FORMA 4 (sem parametros):
    // $sql = "SELECT * FROM tb_produtos";
    // $stmt = $conexao->prepare($sql);
    // $stmt->execute();
    
    // $resultSet = $stmt->fetchAll();

    // if($resultSet) {
    //     foreach ($resultSet as $row) {
    //             echo $row['produto'] . "<br>";
    //     };
    // } else {
    //     echo "Sem registros. <br>";
    // };

        //         FORMA 5 (com positional placeholders):
    // $data = ['tv'];
    // $sql = "SELECT * FROM tb_produtos WHERE categoria = ?";
    // $stmt = $conexao->prepare($sql);
    // $stmt->execute($data);
    
    // $resultSet = $stmt->fetchAll();

    // if($resultSet) {
    //     foreach ($resultSet as $row) {
    //             echo $row['produto'] . "<br>";
    //     };
    // } else {
    //     echo "Sem registros. <br>";
    // };

    //////////////////////////////////////////////////////////////////







    ////////////////////////////////////////////////////////////////////

    echo "<a href='pdoteste.php'>VOLTAR</a>";

    // $stmt = null;              //*fechar statement do PDO
    // $conexao = null;           //*fechar conexão do PDO

    // $stmt->close();              //*fechar statement do mysqli
    // $conexao->close();           //*fechar conexão do mysqli

?>

