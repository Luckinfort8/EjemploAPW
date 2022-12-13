<?php

require_once(__ROOT__ . "/db/Conexion.php");
require_once(__ROOT__ . "/modelo/PeliculaModelo.php");

class PeliculaServicio extends Conexion {

    public function __construct() {
        parent::__construct();
    }

    public function get_pelicula() {
        $sql = "SELECT peli.id, peli.titulo, sop.nombre, gen.descripcion FROM pelicula AS peli INNER JOIN soporte AS sop INNER JOIN genero AS gen ON peli.idsoporte=sop.id AND peli.idgenero=gen.id;";
        $result = $this->_db->query($sql);
        if ($result) {
            $data = [];
            while ($row = $result->fetch_object('PeliculaModelo')) {
                $data[] = $row;
            }
            return $data;
        } else {
            die("Error en la ejecución del query: " . print_r($this->_db->error, true));
        }
    }

    public function createOrUpdatePelicula($idpelicula, $titulo, $idsoporte, $idgenero) {
        $insert = " INSERT INTO pelicula(titulo, idsoporte, idgenero) VALUES('$titulo','$idsoporte','$idgenero')";
        $update = "UPDATE pelicula SET titulo = '$titulo' , idsoporte = '$idsoporte' , idgenero = '$idgenero'  WHERE id = $idpelicula";

        $sql = empty($idpelicula) ? $insert : $update;
        $result = $this->_db->query($sql);
        if ($result) {            
            return true;
        } else {
            die("Error en la ejecución del query: " . print_r($this->_db->error, true));
        }
    }

}

?>