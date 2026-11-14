<!-- Crear una página donde nos muestre la tabla de multiplicar del 4. Emplear el for,
luego el while. La estructura FOR debe permitir incrementar una variable de 2 en
2: -->

<?php

if (isset($_POST["enviar"])) {
    $sent_number = $_POST["number_table"];
    $finish_table = tables($sent_number);
}

function tables($function_numeros){
    ?> 
    <h2>Table with FOR of number <?php echo " = " . $function_numeros ?> </h2>
    <?php
    for ($i = 2; $i <= 10; $i += 2) {
        $result = $function_numeros * $i;
        echo $function_numeros . " X " . $i . " = " . $result . "<br>";
    }


    ?> 
    <h2>Table with WHILE of number <?php echo " = " . $function_numeros ?> </h2>
    <?php
    $i = 1;

    while($i <= 10){
    $result = $function_numeros * $i;
    echo $function_numeros . " X " . $i . " = " . $result . "<br>";
    $i ++;
    }
} 