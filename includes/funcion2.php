<?php

    // Validaciones de si le dan enviar o no.
    //Los números que me mandaron los guardo dentro de una variable llamada $value 
    // creo otra variable llamada $values_reve en donde le paso mi funcion y le paso el número que me pasó el usuario $value
    //le imprimo todo lo que la función hizo, junto con un mensajito. 

    if (isset($_POST["enviar"])){
        $value = $_POST["numeros"];
        $values_reve =  revers($value);
        echo "Este es el número original: " . $value . "<br>";
        echo "Este es el número al revés " . $values_reve;
    }

    //le creo la funcion con nombre 'revers' y le mando una nueva variable que la voy a usar dentro llamada $numeros

    function revers ($numeros){
        $string_number = strval($numeros); //le paso mi variable $numeros para convertirla en un string con strval = string valor y se guarda en la variable nueva
        $revers = strrev($string_number); // le paso luego esa variable en donde la convertí en string para poner al revés el número y la guardo 

        //le creo un ciclo for para empezar las validaciones, empieza mi variable $i = 2 pq el 1 no es primo entonces inicio en 2
        // le digo que empiece a validar desde el 2 hasta el número que le pasen y se vaya incrementando de 1 en 1 hasta llegar al número

        for ($i = 2; $i <= $numeros; $i ++){

            $es_primo = true; //le hago una variable en donde le digo que todos los que ingresen son primos antes de que pasen al siguiente filtro 

            //acá con este siguiente ciclo for le digo que p=2 < $i =(cada numero de arriba que paso por el filtro) y se incremente de 1 en 1
            // le decimos que inicia p = 2 y que si entra un 4 entonces p es evaluado 2 y 3 antes de llegar al $i = 4
            //si es 10 entonces p evalua de 2 a 9 (2-3-4-5-6-7-8-9) y verifica cada uno con los flujos de abajo 
            for ($p = 2; $p < $i; $p ++){

                //si es válido entonces verifique que ejemplo: $i = 4 % $p= 2 === 0  
                //si es asi entonces es falso, no es primo 
                if ($i % $p === 0){
                    $es_primo = false;
                }
                //si no entra en ese ciclo entonces

            //si es primo     
            } if ($es_primo){
                echo "Es primo " . $i . "<br>";
            }
        }

        return ($revers);
    } 