<?php


require_once './models/ventasModels.php';
require_once './models/eventosModels.php';
require_once './views/ventasViews.php';

class ventasControllers{
    private $ventasModel;
    private $eventoModel;
    private $view;

    function __construct(){
        $this->eventoModel = new eventosModels();
        $this->ventasModel = new ventasModels();
        $this->view = new ventasViews();
    }

    function showVentas(){
       

        if(!isset($_POST['dia']) || empty($_POST['dia'])) {
            return $this->view->showError("Por favor, completar ambos campos.");
        }

        if(!isset($_POST['id_evento']) || empty($_POST['id_evento'])) {
            return $this->view->showError("Por favor, completar ambos campos.");
        }
    
    
        $dia = $_POST["dia"];
        $id_evento = $_POST["id_evento"];
    
        $evento = $this->eventoModel->obtenerEvento($id_evento);
    
        if (empty($evento)) {
            return $this->view->showError('No existe el evento solicitado.');
            
        }
    
        $ventas = $this->ventasModel->obtenerFechayEvento($dia, $id_evento);
        
        if (empty($ventas)) {
            return $this->view->showError('No se encontraron ventas para el evento en la fecha especificada.');
           
        }
    
        $this->view->mostrarVentas($ventas, $evento); 
        
    } 
}
?>