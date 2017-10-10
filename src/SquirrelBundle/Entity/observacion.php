<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * observacion
 *
 * @ORM\Table(name="observacion")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\observacionRepository")
 */
class observacion
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
     * @ORM\Column(name="titulo_observacion", type="string", length=64)
     */
    private $tituloObservacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_observacion", type="string", length=1024)
     */
    private $descripcionObservacion;

    /**
    * @ORM\ManyToOne(targetEntity="proyecto", inversedBy="observaciones")
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
     * Set tituloObservacion
     *
     * @param string $tituloObservacion
     * @return observacion
     */
    public function setTituloObservacion($tituloObservacion)
    {
        $this->tituloObservacion = $tituloObservacion;

        return $this;
    }

    /**
     * Get tituloObservacion
     *
     * @return string
     */
    public function getTituloObservacion()
    {
        return $this->tituloObservacion;
    }

    /**
     * Set descripcionObservacion
     *
     * @param string $descripcionObservacion
     * @return observacion
     */
    public function setDescripcionObservacion($descripcionObservacion)
    {
        $this->descripcionObservacion = $descripcionObservacion;

        return $this;
    }

    /**
     * Get descripcionObservacion
     *
     * @return string
     */
    public function getDescripcionObservacion()
    {
        return $this->descripcionObservacion;
    }

    /**
     * Set idProyecto
     *
     * @param \SquirrelBundle\Entity\proyecto $idProyecto
     * @return observacion
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
