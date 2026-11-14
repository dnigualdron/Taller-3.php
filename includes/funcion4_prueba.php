<?php

if (isset($_POST["enviar"])) {
    $surveys_people = $_POST["numbers"];
    $functions_results = encuestas($surveys_people);
}



function encuestas($people_number){

    for ($i = 1; $i <= $people_number; $i++) {
?> <h3>Encuesta</h3>
        <h3><?php echo "# " . $i; ?> </h3>

        <form action="./includes/funcion4.php" method="post">
            <h4>Question 1</h4>
            <label for="text">¿Cúantos años tenés?</label>
            <input type="number" name="years[]" required>

            <h4>Question 2</h4>
            <label for="text">¿Ya habías estudiado antes algo relacionado con tecnología?</label>
            <select name="respuesta2[]" required>
                <option value="true">Sí</option>
                <option value="false">No</option>
            </select>

            <h4>Question 3</h4>
            <label for="text">¿Qué te ha gustado aprender más en ADSO?</label>
            <select name="respuesta3[]" required>
                <option value="analisis">Análisis</option>
                <option value="base_de_Datos">Base de datos</option>
                <option value="frontend">Frontend</option>
                <option value="Backend">Backend</option>
            </select>

            <h4>Question 4</h4>
            <label for="text"> ¿HTML es un lenguaje de programación? </label>
            <select name="respuesta4[]" required>
                <option value="true">Verdadero</option>
                <option value="false">Falso</option>
            </select>

            <h4>Question 5</h4>
            <label for="text">¿Qué tipo de Bases de Datos te gustan más?</label>
            <select name="respuesta5[]" required>
                <option value="relacional">Relacional</option>
                <Option value="no_relacional">No Relacional</Option>
            </select>

            <h4>Question 6</h4>
            <label for="text">¿CSS se considera un lenguaje de programación?</label>
            <select name="respuesta6[]" required>
                <option value="true">Verdadero</option>
                <option value="false">Falso</option>
            </select>

            <h4>Question 7</h4>
            <label for="text">¿Git es un sistema de control de versiones distribuido?</label>
            <select name="respuesta7[]" required>
                <option value="true">Verdadero</option>
                <option value="false">Falso</option>
            </select>


            <h4>Question 8</h4>
            <label for="text">¿Qué tipo de metodología te gusta trabajar más?</label>
            <select name="respuesta8[]" required>
                <option value="agil">Ágil</option>
                <option value="tradicional">Tradicional</option>
            </select>

            <h4>Question 9</h4>
            <label for="text">¿JavaScript es un lenguaje únicamente para Frontend?</label>
            <select name="respuesta9[]" required>
                <option value="true">Verdadero</option>
                <option value="false">Falso</option>
            </select>

            <h4>Question 10</h4>
            <label for="text">¿MongoDB utiliza un modelo de datos de tipo?</label>
            <select name="respuesta10[]" required>
                <option value="clave_valor">Clave - Valor</option>
                <option value="documental">Documental</option>
                <option value="grafos">Grafos</option>

            </select>
        </form>
        <br>

    <?php

    }
    ?>
    <br>
    <input type="submit" value="send" name="send1"> <?php

    if (isset($_POST["send1"])) {
        $respuestas = [
            "años" => $_POST["years"],
            "respuesta2" => $_POST["respuesta2"],
            "respuesta3" => $_POST["respuesta3"],
            "respuesta4" => $_POST["respuesta4"],
            "respuesta5" => $_POST["respuesta5"],
            "respuesta6" => $_POST["respuesta6"],
            "respuesta7" => $_POST["respuesta7"],
            "respuesta8" => $_POST["respuesta8"],
            "respuesta9" => $_POST["respuesta9"],
            "respuesta10" => $_POST["respuesta10"]
        ];

        $promedios_años = [];

    foreach ($respuestas as $llave => $valor) {

            if ($llave === "años") {
                $cantidades = ($valor + $valor);
                $promedio_años = $cantidades;

            } elseif ($llave === "respuesta2") {

            } elseif ($llave === "respuesta3") {

            }elseif ($llave === "respuesta4") {

            }elseif ($llave === "respuesta5") {

            }elseif ($llave === "respuesta6") {

            }elseif ($llave === "respuesta7") {

            }elseif ($llave === "respuesta8") {

            }elseif ($llave === "respuesta9") {

            }elseif ($llave === "respuesta10") {

            } else {
                echo "No HAY historial de esa respuesta" ;
            }
        }
    }

}
