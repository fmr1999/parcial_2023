<?php 


class eventosModels{

    private $db;

    public function __construct(){

        $this->db = $this->connect();
    }


    private function connect() {
        $db = new PDO ('mysql:host=localhost;dbname=parcial_2023;charset=utf8', 'root', '');		
        return $db;
    }

    function obtenerEvento($id_evento){
        $query = $this->db->prepare('SELECT * FROM eventos WHERE id = ?');
        $query->execute($id_evento);
        return $query->fetch(PDO::FETCH_OBJ);

    }
}
?>