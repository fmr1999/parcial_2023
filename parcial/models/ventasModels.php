<?php 



class ventasModels{

    private $db;

    public function __construct(){

        $this->db = $this->connect();
    }


    private function connect() {
        $db = new PDO ('mysql:host=localhost;dbname=parcial_2023;charset=utf8', 'root', '');		
        return $db;
    }

    function getAllventas($dia){
        $query = $this->db->prepare('SELECT * FROM ventas WHERE fecha_compra = ?');
        $query->execute([$dia]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function obtenerFechayEvento($dia, $idEvento){
        $query = $this->db->prepare('SELECT id, cant_entradas FROM ventas WHERE fecha_compra = ? AND id_evento = ?');
        $query->execute([$dia, $idEvento]);

        return $query->fetchAll(PDO::FETCH_OBJ);

    }
 
}

?>