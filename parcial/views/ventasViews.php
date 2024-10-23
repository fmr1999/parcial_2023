<?php 

class ventasViews{

function mostrarVentas($ventas, $evento){
    require_once './templates/listaVentas.phtml';
}

function showError($error){
    require_once './templates/error.phtml';
}

}

?>