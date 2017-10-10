<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * objetivo
 *
 * @ORM\Table(name="objetivo")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\objetivoRepository")
 */
class objetivo
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
     * @ORM\Column(name="descripcion_objetivo", type="text")
     */
    private $descripcionObjetivo;

    /**
    * @ORM\ManyToOne(targetEntity="proyecto", inversedBy="objetivos")
    */
   private $idProyecto;

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
     * Set descripcionObjetivo
     *
     * @param string $descripcionObjetivo
     * @return objetivo
     */
    public function setDescripcionObjetivo($descripcionObjetivo)
    {
        $this->descripcionObjetivo = $descripcionObjetivo;

        return $this;
    }

    /**
     * Get descripcionObjetivo
     *
     * @return string
     */
    public function getDescripcionObjetivo()
    {
        return $this->descripcionObjetivo;
    }

    /**
     * Set idProyecto
     *
     * @param \SquirrelBundle\Entity\proyecto $idProyecto
     * @return objetivo
     */
    public function setIdProyecto(\SquirrelBundle\Entity\proyecto $idProyecto = null)
    {
        $this->idProyecto = $idProyecto;

        return $this;
    }

    /**
     * Get idProyecto
     *
     * @return \SquirrelBundle\Entity\proyecto 
     */
    public function getIdProyecto()
    {
        return $this->idProyecto;
    }
}
