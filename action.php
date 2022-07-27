
<?php

crearFrase();

$frase = $_GET['frase'];

function buscaPalabraMasLarga($frase)
{
    //$string = 'hola mundo buenos val';

    $palabras = explode(' ', $frase);

    usort(
        $palabras,
        function ($a, $b) {
            return strlen($b) - strlen($a);
        }
    );

    $largo = $palabras[0];

    //echo $largo;
    return strlen($largo);
}

function crearFrase()
{
    $frase = $_GET['frase'];
    echo str_repeat("<b>*</b>", buscaPalabraMasLarga($frase) + 2);
    $token = strtok($frase, " \n\t");
    echo "<br>";
    while ($token !== false) {
        //echo "* " . $token . " * <br>";

        if (strlen($token) < buscaPalabraMasLarga($frase)) {
            $caracteresDiferencia = buscaPalabraMasLarga($frase) - strlen($token);
            echo "<b> * " . $token   . str_repeat('&nbsp; ', $caracteresDiferencia) . " *<br> </b>";
        } else {
            echo "<b> * " . $token . " * <br> </b>";
            //echo "<b> * " . $token   . str_repeat ('&nbsp; ', 3) ." *<br> </b>";
        }

        $token = strtok(" \n\t");
    }
    echo str_repeat("<b>*</b>", buscaPalabraMasLarga($frase) + 2);
}
