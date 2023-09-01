<?php 

 function generarPwd($texto)
{
    $letra=strtoupper(substr($texto, 0,1));
    $nombreTexto=substr($texto, 1,strlen($texto)-1);
    $numero = random_int(10, 99);

    $arreglo = array("@", "*", "+", "$", "&");

// Acceso aleatorio a un elemento del arreglo
        $indiceAleatorio = rand(0, count($arreglo) - 1);
        $caracter = $arreglo[$indiceAleatorio];

       $pwd=$letra.$nombreTexto.random_int(10, 99).$arreglo[rand(0, count($arreglo) - 1)];
       if(strlen($pwd)<8){
                $pwd=$pwd.$arreglo[rand(0, count($arreglo) - 1)].random_int(10, 99);
                return $pwd; 
       }
       return $pwd; 
}

function generarUsuario($texto){
        return trim(strtolower($texto));
}
function letraCapital($texto){
        return ucfirst(strtolower($texto));
}

?>

