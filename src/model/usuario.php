<?php
/**
 * Creado por equipo de desarrollo RE.
 * Fecha: 20/02/2019
 * Hora: 10:57 PM
 * Editado por:
 * Fecha:
 * Editado por:
 * Fecha:
 */

namespace pdes\model;


class usuario
{
    private $nombre;
    private $edad;
    private $direccion;

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * @param mixed $edad
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }


}

?>