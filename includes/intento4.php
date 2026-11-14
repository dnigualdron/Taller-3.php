<?php
if(isset($_POST["envio"])){
    $encuestados = $_POST["acu_encuesta"];
    $edad_suma = 0;
    $edades = [];

    for ($i = 1; $i <= $encuestados; $i++) {
        $edad_suma = $edad_suma + $_POST["años".$i];
        $edades[] = $_POST["años".$i];
    }

    $promedio = ($edad_suma / $encuestados);
    $edad_min = min($edades);
    $edad_max = max($edades);

    echo "Este es el promedio de edades: " . $promedio . "<br>";
    echo "Esta es la Máxima edad de las encuestas: " . $edad_max . "<br>";
    echo "Esta es la Miníma edad de las encuestas: " . $edad_min . "<br>";
}
?>