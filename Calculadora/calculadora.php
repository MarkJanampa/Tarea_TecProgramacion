<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <br><br>
    <!-- Contenedor de la calculadora-->
    <div class="calculadora">
        <h2>Calculadora</h2>
        <form action="<?php $_SERVER ['PHP_SELF'];?>" method="post" >
        <!-- Ingreso de datos -->
            <input type="text" name="num1" placeholder="Ingrese un número" required>
            <input type="text" name="num2" placeholder="Ingrese un número" required>
        <!-- Menú de operaciones -->
            <select name="operacion">
                <option value="sumar">Suma</option>
                <option value="restar">Resta</option>
                <option value="multiplicar">Multiplicación</option>
                <option value="dividir">División</option>
                <option value="primo">Número Primo</option>
            </select>
        <!-- Botón para calcular -->
            <button type="submit">Calcular</button>
        </form>
         <!-- Ejecucuión de operaciones-->
        <div class="resultado">
            <p>Resultado: 
                <?php
                if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operacion'])) {
                    $num1 = $_POST['num1'];
                    $num2 = $_POST['num2'];
                    $operacion = $_POST['operacion'];
                    switch ($operacion) {
                        case 'sumar':
                            $resultado = $num1 + $num2;
                            break;
                        case 'restar':
                            $resultado = $num1 - $num2;
                            break;
                        case 'multiplicar':
                            $resultado = $num1 * $num2;
                            break;
                        case 'dividir':
                            if ($num2 != 0) {
                                $resultado = $num1 / $num2;
                            } else {
                                $resultado = "No se puede dividir entre 0.";
                            }
                            break;
                        case 'primo':
                            function esPrimo($n) {
                                if ($n <= 1) return false;
                                for ($i = 2; $i * $i <= $n; $i++) {
                                    if ($n % $i == 0) return false;
                                }
                                return true;
                            }
                            $resultado = esPrimo($num1) ? "$num1 es un número primo" : 
                            "$num1 no es un número primo";
                            break;
                        default:
                            $resultado = "Operación incorrecta.";
                            break;
                    }
                    echo $resultado;
                }
                ?>
            </p>
        </div>
    </div>
</body>
</html>
