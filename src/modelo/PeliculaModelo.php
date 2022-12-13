<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Genero
 *
 * @author Yeoshua
 */
class PeliculaModelo {
    
    //put your code here
    private $id;
    private $titulo;
    private $nombre;
    private $descripcion;
    private $idSoporte;
    private $idGenero;
    
    
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }
    
    public function getNombreSoporte() {
        return $this->nombre;
    }
    
    public function getNombreGenero() {
        return $this->descripcion;
    }

    public function getIdSoporte() {
        return $this->idSoporte;
    }
    
    public function getIdGenero() {
        return $this->idGenero;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }
    
     public function setNombreSoporte($nombre): void {
        $this->nombre = $nombre;
    }
    
     public function setNombreGenero($descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function setIdSoporte($idSoporte): void {
        $this->idSoporte = $idSoporte;
    }
    
    public function setIdGenero($idGenero): void {
        $this->idGenero = $idGenero;
    }


}
