<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>
        <?php

            $nome = $_REQUEST["nome"] ?? "Sem nome";   
            $sobrenome = $_REQUEST["sobrenome"] ?? "Sem sobrenome";   

            echo "<div>Nome: $nome  <br>
                       Sobrenome: $sobrenome</div>";

            
           
        ?>
    </h2>
</body>
</html>