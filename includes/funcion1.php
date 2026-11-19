<?php

    if (isset($_POST["enviar"])){
        $written_name = $_POST["texto"];
        $change_name = strtolower($written_name);
        if ($change_name === "fabio" || $change_name === "fabito") {
            echo "Hola instructor " . $change_name;
        } else if (!empty($change_name)){
            echo  "<br>" . "Hola intruso " . $written_name ;
        } else {
            echo "<br>" . "No existe ningún nombre" ;
        }
    } else {
        echo "No ha presionado el botón" ;
    }