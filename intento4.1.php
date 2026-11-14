<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
</head>
<body>
    <!-- Paso 1: Pedir el número de encuestados -->
    <form action="" method="post">
        <h1>Surveys</h1>
        <label for="text">Write the number of people for the Survey</label>
        <input type="number" name="numbers_surveys" required>
        <input type="submit" value="Enviar" name="sent">
    </form>

    <?php
    // Si se envió el primer formulario, generamos los inputs de las edades
    if(isset($_POST["sent"])){
        $values_numbers = $_POST["numbers_surveys"];
    ?>
    
    <hr>
    <!-- Este formulario se envía a sí mismo (action="") -->
    <form action="" method="post">
        <input type="hidden" name="acu_encuesta" value="<?php echo $values_numbers; ?>">

        <?php
        for ($i = 1; $i <= $values_numbers; $i++) {
        ?>
            <div>
                <h5>Question <?php echo $i; ?></h5>
                <label for="text">Write your age</label>
                <input type="number" name="años<?php echo $i; ?>" required>
            </div>
        <?php
        }
        ?>

        <br>
        <input type="submit" value="Enviar Encuesta(s)" name="envio">
    </form>

    <?php
    }

    // Paso 2: Si ya se enviaron las edades, procesamos los resultados aquí mismo
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

        echo "<hr>";
        echo "<h3>Resultados:</h3>";
        echo "Este es el promedio de edades: " . $promedio . "<br>";
        echo "Esta es la Máxima edad de las encuestas: " . $edad_max . "<br>";
        echo "Esta es la Mínima edad de las encuestas: " . $edad_min . "<br>";
    }
    ?>
</body>
</html>