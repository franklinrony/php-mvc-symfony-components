<?php
/**
 * Creado por equipo de desarrollo RE.
 * Fecha: 17/02/2019
 * Hora: 09:20 PM
 * Editado por:
 * Fecha:
 * Editado por:
 * Fecha:
 */

namespace pdes\paquete_a;


class ArchivoA
{
    private  $name;
    private $apellidos;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }



}

?>