<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * estadoProyecto
 *
 * @ORM\Table(name="estado_proyecto")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\estadoProyectoRepository")
 */
class estadoProyecto
{


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_estado", type="string", length=64)
     */
    private $nombreEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_estado", type="string", length=1024)
     */
    private $descripcionEstado;


        /**
         * @ORM\OneToMany(targetEntity="proyecto", mappedBy="idEstadoProyecto")
         */
        private $proyectos;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombreEstado
     *
     * @param string $nombreEstado
     * @return estadoProyecto
     */
    public function setNombreEstado($nombreEstado)
    {
        $this->nombreEstado = $nombreEstado;

        return $this;
    }

    /**
     * Get nombreEstado
     *
     * @return string
     */
    public function getNombreEstado()
    {
        return $this->nombreEstado;
    }

    /**
     * Set descripcionEstado
     *
     * @param string $descripcionEstado
     * @return estadoProyecto
     */
    public function setDescripcionEstado($descripcionEstado)
    {
        $this->descripcionEstado = $descripcionEstado;

        return $this;
    }

    /**
     * Get descripcionEstado
     *
     * @return string
     */
    public function getDescripcionEstado()
    {
        return $this->descripcionEstado;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proyectos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add proyectos
     *
     * @param \SquirrelBundle\Entity\proyecto $proyectos
     * @return estadoProyecto
     */
    public function addProyecto(\SquirrelBundle\Entity\proyecto $proyectos)
    {
        $this->proyectos[] = $proyectos;

        return $this;
    }

    /**
     * Remove proyectos
     *
     * @param \SquirrelBundle\Entity\proyecto $proyectos
     */
    public function removeProyecto(\SquirrelBundle\Entity\proyecto $proyectos)
    {
        $this->proyectos->removeElement($proyectos);
    }

    /**
     * Get proyectos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProyectos()
    {
        return $this->proyectos;
    }
}
