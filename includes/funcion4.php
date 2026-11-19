<?php

if (isset($_POST["sent4"])) {
    $people = $_POST["number1"];
    $finishp = surveys($people);
}

/* 
primero abrí el <form> antes del ciclo para enviar todas las encuestas juntas en un solo $_POST y Cerramos php ?> 
después de abrir el CICLO FOR para escribir HTML limpio y cómodo con los <label>, <input> y <select>, luego
estructuré los datos por medio del name="encuestado[<?php echo $i; ?>][pregunta1]" es una matriz de array ya que 
al escribir simplemente en el name= "encuesta $i" lo que haría es que se sobre escribe cada respuesta borrando la anterior
y eso no es lo que queremos, queremos guardar y procesar todas las encuestas de los usuario y darle un tratamiento
a los datos que envian para sacarle promedios, mayores, menores, porcentajes%, preguntas correctas e incorrectas
entonces al usar dos corchetes de array [][] = [<?php $i; ?>][pregunta#] construimos una matriz (array bidimensional) 
donde el primer índice [<?php echo $i; ?>] nos identifica qué persona está respondiendo (Encuestado 1, Encuestado 2,
 etc.) y el segundo índice de array [pregunta1]: Identifica qué pregunta está respondiendo esa persona.

 [ Navegador (HTML generado por el for) ]
  ├── Encuesta #1 ($i = 1)
  │     ├── name="encuestado[1][pregunta1]"  ──► valor: "20"
  │     └── name="encuestado[1][pregunta2]"  ──► valor: "true"
  │
  └── Encuesta #2 ($i = 2)
        ├── name="encuestado[2][pregunta1]"  ──► valor: "17"
        └── name="encuestado[2][pregunta2]"  ──► valor: "false"
                        │
                        ▼  (Al presionar Enviar / method="POST")
[ Servidor PHP ($_POST["encuestado"]) ]
  encuestado (
      [1] => Array (                  // Fila 1: Datos del Encuestado #1
          ["pregunta1"] => "20",
          ["pregunta2"] => "true",
          ...
      ),
      [2] => (                              // Fila 2: Datos del Encuestado #2
                ["pregunta1"] => "17",
                ["pregunta2"] => "false",
          ...
      )
  )
                        │
                        ▼  (Procesamiento con foreach)
  foreach ($info as $indice => $informacion)
    └── Recorre fila por fila ($indice = 1, luego 2...) y el $indice es el que me dice el número de encuesta o
  persona que tuvo ese lugar ejemplo: $indice en el foreach toma el valor numérico 
  que generó $i en el formulario (es decir, 1, 2, 3...)
*/
function surveys($repeats)
{
?>
    <form action="" method="post">
        <?php
        for ($i = 1; $i <= $repeats; $i++) {
        ?>
            <h1>Survey # <?php echo $i ?></h1>

            <h5>Question 1</h5>
            <label for="text">Write your age</label>
            <input type="number" name="encuestado[<?php echo $i; ?>][pregunta1]" required>

            <h5>Question 2</h5>
            <label for="text">¿Ya habías estudiado antes algo relacionado con tecnología?</label>
            <select name="encuestado[<?php echo $i; ?>][pregunta2]" required>
                <option value="true">Sí</option>
                <option value="false">No</option>
            </select>

            <h5>Question 3</h5>
            <label for="text">¿Qué te ha gustado aprender más en ADSO?</label>
            <select name="encuestado[<?php echo $i; ?>][pregunta3]" required>
                <option value="analisis">Análisis</option>
                <option value="base_de_Datos">Base de datos</option>
                <option value="frontend">Frontend</option>
                <option value="backend">Backend</option>
            </select>

            <h5>Question 4</h5>
            <label for="text"> ¿HTML es un lenguaje de programación? </label>
            <select name="encuestado[<?php echo $i; ?>][pregunta4]" required>
                <option value="true">Verdadero</option>
                <option value="false">Falso</option>
            </select>

            <h5>Question 5</h5>
            <label for="text">¿Qué tipo de Bases de Datos te gustan más?</label>
            <select name="encuestado[<?php echo $i; ?>][pregunta5]" required>
                <option value="relacional">Relacional</option>
                <Option value="no_relacional">No Relacional</Option>
            </select>

            <h5>Question 6</h5>
            <label for="text">¿CSS se considera un lenguaje de programación?</label>
            <select name="encuestado[<?php echo $i; ?>][pregunta6]" required>
                <option value="true">Verdadero</option>
                <option value="false">Falso</option>
            </select>

            <h5>Question 7</h5>
            <label for="text">¿Git es un sistema de control de versiones distribuido?</label>
            <select name="encuestado[<?php echo $i; ?>][pregunta7]" required>
                <option value="true">Verdadero</option>
                <option value="false">Falso</option>
            </select>


            <h5>Question 8</h5>
            <label for="text">¿Qué tipo de metodología te gusta trabajar más?</label>
            <select name="encuestado[<?php echo $i; ?>][pregunta8]" required>
                <option value="agil">Ágil</option>
                <option value="tradicional">Tradicional</option>
            </select>

            <h5>Question 9</h5>
            <label for="text">¿JavaScript es un lenguaje únicamente para Frontend?</label>
            <select name="encuestado[<?php echo $i; ?>][pregunta9]" required>
                <option value="true">Verdadero</option>
                <option value="false">Falso</option>
            </select>

            <h5>Question 10</h5>
            <label for="text">¿MongoDB utiliza un modelo de datos de tipo?</label>
            <select name="encuestado[<?php echo $i; ?>][pregunta10]" required>
                <option value="clave_valor">Clave - Valor</option>
                <option value="documental">Documental</option>
                <option value="grafos">Grafos</option>

            </select>
        <?php
        }
        ?>
        <br>
        <br>
        <input type="submit" value="send" name="sent10">
    </form>
<?php
}

/*
Confirmamos que hayan enviado y presionado el botón de las encuestas con el $_POST["sent10"], luego le digo que cada 
encuestado (tiene su $i y dentro de cada $i tiene las respuestas de las preguntas) se va a guardar dentro de $info
o sea que $info almacena/guarda toda la matriz bidimensional de todos la cantidad de personas y respuestas de las encuestas
luego le fuí creando las $variables acumuladoras según las necesidades que iba ocupando más abajito para el procesamiento 
de los datos.
*/
if (isset($_POST["sent10"])) {
    $info = $_POST["encuestado"];
    //las 10 respuestas de cada persona están dentro de info. 

    $indice = 0;
    $suma_edades = 0;
    $mayor = 0;
    $menor = $info[1]["pregunta1"];
    $encuestados = count($info);
    $finish_si = 0;
    $finish_no = 0;
    $analisis_f = 0;
    $data_base_f = 0;
    $frontend_f = 0;
    $back_f = 0;
    $incorrecto = 0;
    $correcto = 0;
    $db_rela = 0;
    $db_no_rela = 0;
    $css_fail = 0;
    $css_si = 0;
    $git_si = 0;
    $git_no = 0;
    $g_agil = 0;
    $g_tradicional = 0;
    $front_negative = 0;
    $front_bakc = 0;
    $cv_ulti = 0;
    $document_ulti = 0; 
    $grafos_ulti = 0;


/*
Con un foreach recorro $info (que es la matriz donde están almacenadas todas las encuestas con sus respectivas 
respuestas) y la divido encuesta por encuesta usando $indice => $informacion: $indice: guarda el número de la 
encuesta actual que se está evaluando en esa vuelta (por ejemplo: 1, luego 2, etc.), lo cual me sirve para 
identificar a qué encuestado pertenece cada dato cuando aplico los filtros (como el mayor o el menor).
$informacion: no es todo $info renombrado, sino el paquete individual de respuestas únicamente de esa encuesta actual
($indice). Luego empiezo con la validación de cada respuesta específica: l
e digo que si ["pregunta1"] existe (isset) dentro de $informacion, entonces tome ese dato puntual 
($informacion["pregunta1"]) y lo guarde en la variable $edades. Como el ciclo avanza una encuesta a la vez, 
$edades va tomando un solo valor por vuelta y se va reemplazando en la siguiente:
Vuelta 1 ($indice = 1): $edades guarda 20 (el valor de $informacion["pregunta1"] de la encuesta 1).
Vuelta 2 ($indice = 2): $edades se actualiza y guarda 17 (el valor de $informacion["pregunta1"] de la encuesta 2).
Vuelta 3 ($indice = 3): $edades guarda 23, y así sucesivamente hasta terminar todas las encuestas.
y bueno sigo haciendo las validaciones correspondientes a cada pregunta comparando la respuesta de la pregunta con
el valor que tengo definido en el value del html para comprobar los datos. ejemplo:
<option value="clave_valor"
<option value="documental"
<option value="grafos"   ---> ese value de cada pregunta 
*/
    foreach ($info as $indice => $informacion) {
        if (isset($informacion["pregunta1"])) {
            $edades = $informacion["pregunta1"];
            $suma_edades = $suma_edades + $edades;
            if ($edades >= $mayor) {
                $mayor = $edades;
                $indice_mayor = $indice;
            }
            if ($edades <= $menor) {
                $menor = $edades;
                $indice_menor = $indice;
            }
        }
        if (isset($informacion["pregunta2"])) {
            $respuesta2 = $informacion["pregunta2"];
            if ($respuesta2 == "true") {
                $finish_si = $finish_si + 1;
            } else if ($respuesta2 == "false") {
                $finish_no = $finish_no + 1;
            }
        }
        if (isset($informacion["pregunta3"])) {
            $respuesta3 = $informacion["pregunta3"];
            if ($respuesta3 == "analisis") {
                $analisis_f = $analisis_f + 1;
            } else if ($respuesta3 == "base_de_Datos") {
                $data_base_f = $data_base_f + 1;
            } else if ($respuesta3 == "frontend") {
                $frontend_f = $frontend_f + 1;
            } else if ($respuesta3 == "backend") {
                $back_f = $back_f + 1;
            }
        }
        if (isset($informacion["pregunta4"])) {
            $respuesta4 = $informacion["pregunta4"];
            if ($respuesta4 == "true") {
                $incorrecto = $incorrecto + 1;
            } else if ($respuesta4 == "false") {
                $correcto = $correcto + 1;
            }
        }
        if (isset($informacion["pregunta5"])) {
            $respuesta5 = $informacion["pregunta5"];
            if ($respuesta5 == "relacional") {
                $db_rela = $db_rela + 1;
            } else if ($respuesta5 == "no_relacional") {
                $db_no_rela = $db_no_rela + 1;
            }
        }
        if (isset($informacion["pregunta6"])) {
            $respuesta6 = $informacion["pregunta6"];
            if ($respuesta6 == "true") {
                $css_fail = $css_fail + 1;
            } else if ($respuesta6 == "false") {
                $css_si = $css_si + 1;
            }
        }if (isset($informacion["pregunta7"])) {
            $respuesta7 = $informacion["pregunta7"];
            if ($respuesta7 == "true") {
                $git_si = $git_si + 1;
            } else if ($respuesta7 == "false") {
                $git_no = $git_no + 1;
            }
        }if (isset($informacion["pregunta8"])) {
            $respuesta8 = $informacion["pregunta8"];
            if ($respuesta8 == "agil") {
                $g_agil = $g_agil + 1;
            } else if ($respuesta8 == "tradicional") {
                $g_tradicional = $g_tradicional + 1;
            }
        }if (isset($informacion["pregunta9"])) {
            $respuesta9 = $informacion["pregunta9"];
            if ($respuesta9 == "true") {
                $front_negative = $front_negative + 1;
            } else if ($respuesta9 == "false") {
                $front_bakc = $front_bakc + 1;
            }
        }if (isset($informacion["pregunta10"])) {
            $respuesta10 = $informacion["pregunta10"];
            if ($respuesta10 == "clave_valor") {
                $cv_ulti = $cv_ulti + 1;
            } else if ($respuesta10 == "documental") {
                $document_ulti = $document_ulti + 1;
            } else if ($respuesta10 == "grafos"){
                $grafos_ulti = $grafos_ulti + 1;
            }
        }
    }

/*
acá lo que hago es sacar los promedios, porcentajes, respuestas correctas y validas. 
*/
    //Promedio de las edades.
    $promedio = ($suma_edades / $encuestados);

    //Resultados de estudios relacionados a tecnología.
    $porcentaje_si = ($finish_si / $encuestados) * 100;
    $porcentaje_no = ($finish_no / $encuestados) * 100;

    //Porcentajes de gustos.
    $total3 = ($analisis_f + $data_base_f + $frontend_f + $back_f);
    $analisis = ($analisis_f / $total3) * 100;
    $data_base = ($data_base_f / $total3) * 100;
    $frontend = ($frontend_f / $total3) * 100;
    $backend = ($back_f / $total3) * 100;

    //Pregunta 4 sobre el lenguaje de html
    $lenguaje_html = ($incorrecto / $encuestados) * 100;
    $no_lenguaje_html = ($correcto / $encuestados) * 100;

    //Pregunta 5 sobre gustos de DB relacional o no relacional.
    $db_rela_g = ($db_rela / $encuestados) * 100;
    $db_no_rela_g = ($db_no_rela / $encuestados) * 100;

    //Pregunta 6 sobre CSS lenguaje de programación. 
    $css_fail_f = ($css_fail / $encuestados) * 100;
    $css_si_yes = ($css_si / $encuestados) * 100;

    //Pregunta 7 sobre Git y su control de versionamiento. 
    $git_si_true = ($git_si / $encuestados) * 100;
    $git_no_false = ($git_no / $encuestados) * 100;

    //Pregunta 8 gustos sobre las métodologías
    $gustos_agil = ($g_agil / $encuestados) * 100;
    $gustos_tradi = ($g_tradicional / $encuestados) * 100;

    //Pregunta 9 JS únicamente para front?
    $no_solo_front = ($front_negative / $encuestados) * 100;
    $es_back_tmb = ($front_bakc / $encuestados) * 100;

    //Pregunta 10 mongo db y su modelo de datos
    $clave_valor = ($cv_ulti / $encuestados) * 100;
    $documental = ($document_ulti / $encuestados) * 100;
    $grafos = ($grafos_ulti / $encuestados) * 100; 


/* Acá imprimo los resultados */

    echo "ESTADÍSTICAS Y RESULTADOS" . "<br>" . "<br>";

    echo "Respuestas # " . "1" . "<br>" . "<br>";
    echo "El promedio de las edades es: " . $promedio . "<br>";
    echo "La edad mayor es " . $mayor . " de la encuesta # " . $indice_mayor . "<br>";
    echo "La edad menor es " . $menor . " de la encuesta # " . $indice_menor . "<br>" . "<br>";

    echo "Respuestas # " . "2" . "<br>" . "<br>";
    echo $porcentaje_si . "%" . " Personas que HAN estudiado antes relacionado a tecnología" . "<br>";
    echo $porcentaje_no . "%" . " Personas que NO han estudiado relacionado a tecnología" . "<br>" . "<br>";

    echo "Respuestas # " . "3" . "<br>" . "<br>";
    echo "Gustos de estudio: " . "<br>" . "Análisis: " . $analisis . " %" . "<br>" . "Base de Datos: " . $data_base . " %" .
        "<br>" . "Frontend: " . $frontend . " %" . "<br>" . "Backend: " . $backend . " %" . "<br>" . "<br>";

    echo "Respuestas # " . "4" . "<br>" . "<br>";
    echo "HTML NO ES un lenguaje de programación." . "<br>" . "Respuesta CORRECTA " . $no_lenguaje_html . " %"
        . "<br>" . "Respuesta incorrecta " . $lenguaje_html . " %" . "<br>" . "<br>";

    echo "Respuestas # " . "5" . "<br>" . "<br>";
    echo "Un " . $db_rela_g . "%" . " Les gusta DB relacional " . "<br>" . "Y un " . $db_no_rela_g
        . "%" . " Prefieren las BD NO relacional " . "<br>" . "<br>";

    echo "Respuestas # " . "6" . "<br>" . "<br>";
    echo "CSS NO ES un lenguaje de programación." . "<br>" . "Respuesta CORRECTA: " . $css_si_yes .
        "%" . "<br>" . "Respuesta INCORRECTA: " . $css_fail_f . "%" . "<br>"   . "<br>";

    echo "Respuestas # " . "7" . "<br>" . "<br>";
    echo  "GIT SÍ es un sistema de control de versiones distribuido. " . "<br>" . "Respuesta CORRECTA: " . $git_si_true .
        "%" . "<br>" . "Respuesta INCORRECTA: " . $git_no_false . "%" . "<br>" . "<br>";

    echo "Respuestas # " . "8" . "<br>" . "<br>";
    echo "Un " . $gustos_agil . "%" ." prefiere la metodología AGÍL" . "<br>" .
    "Un " . $gustos_tradi . "%" ." prefiere la metodología TRADICIONAL" . "<br>" . "<br>";

    echo "Respuestas # " . "9" . "<br>" . "<br>";
    echo "JS Es para Frontend y Backend." . "<br>" . "Respuesta CORRECTA: " . $es_back_tmb . 
        "%" . "<br>" . "Respuesta INCORRECTA: " . $no_solo_front . "%" . "<br>"  . "<br>";

    echo "Respuestas # " . "10" . "<br>" . "<br>";
    echo "EL modelo de datos No relacional como MONGO es: " . "<br>" . "Respuesta CORRECTA: " . $documental . "%" . " Documental" .
        "<br>" . "Respuesta INCORRECTA 1: " . $clave_valor . "%" .  " la Clave-valor es de redis" ."<br>" . 
        "Respuesta INCORRECTA 2: " . $grafos . "%" .  " Tipo grafos es de Neo4j" . "<br>";
}