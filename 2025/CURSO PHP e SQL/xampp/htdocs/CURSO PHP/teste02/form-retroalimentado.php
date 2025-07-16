<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>
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


    </h2>
</body>
</html>