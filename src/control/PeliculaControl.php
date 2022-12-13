<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of LoginCont
 *
 * @author Yeoshua
 */
require_once(__ROOT__ . "/servicio/PeliculaServicio.php");
require_once(__ROOT__ . "/servicio/SoporteServicio.php");
require_once(__ROOT__ . "/servicio/GeneroServicio.php");

class PeliculaControl {

    private $error;

    public function getError() {
        return $this->error;
    }

    public function setError($error): void {
        $this->error = $error;
    }

    public function getCatalogoPelicula() {
    $pelicula = new PeliculaServicio();
        return $pelicula->get_pelicula();
    }
    
    public function getCatalogoSoporte() {
    $soporte = new SoporteServicio();
        return $soporte->get_soporte();
    }
    
    public function getCatalogoGenero() {
    $genero = new GeneroServicio();
        return $genero->get_genero();
    }

    public function printPelicula($pelicula) {
        echo '<table cellpadding="0" cellspacing="0" class="center">';
        echo '<tr><th>Opción</th><th>Nombre</th><th>Soporte</th><th>Genero</th></tr>', "\n";
        foreach ($pelicula as $value) {
            echo '<tr id="_' . $value->getId() . '">';
            echo '<td>', '<input type="radio" id="pelicula" name="pelicula" value="' . $value->getId() . '">', '</td>';
            echo '<td>', $value->getTitulo(), '</td>';
            echo '<td>', $value->getNombreSoporte(), '</td>';
            echo '<td>', $value->getNombreGenero(), '</td>';
            echo '</tr>', "\n";
        }
        echo '</table><br />';
    }
    public function printSoporte($soporte) {
        echo '<select id="list-soporte" onchange="seleccionSop();" disabled>';
        foreach ($soporte as $value) { 
            echo '<option id="sop"value="' . $value->getId() . '">',$value->getNombre(),'</option>';       
        }
        echo '</select>';
    }
    
    public function printGenero($genero) {
        echo '<select id="list-genero" onchange="seleccionGen();" disabled>';
        foreach ($genero as $value) { 
            echo '<option id="gen"value="' . $value->getId() . '">',$value->getDescripcion(),'</option>';       
        }
        echo '</select>';
    }

    public function createOrUpdate() {
        if (isset($_POST['submit'])) {
            if (empty($_POST['titulo']) || empty($_POST['idsoporte']) || empty($_POST['idgenero'])) {
                $this->setError("El nombre del catalogo o la descripcion no son validos");
            } else {

                $escapedPost = $_POST;
                $escapedPost = array_map('html_entity_decode', $escapedPost);
                $titulo = $escapedPost['titulo'];
                $idsoporte = $escapedPost['idsoporte'];
                $idgenero = $escapedPost['idgenero'];
                $idpelicula = $escapedPost['idpelicula'];

                $servicio = new PeliculaServicio();
                $test = $servicio->createOrUpdatePelicula($idpelicula, $titulo, $idsoporte, $idgenero);

                if ($test) {
                    header("Location:pelicula.php");
                } else {
                    $this->setError("No se actualizo el registro");
                }
            }
        }
    }

}
