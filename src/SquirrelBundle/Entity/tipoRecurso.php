<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * tipoRecurso
 *
 * @ORM\Table(name="tipo_recurso")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\tipoRecursoRepository")
 */
class tipoRecurso
{

  /**
     * @ORM\OneToMany(targetEntity="recurso", mappedBy="idTipoRecurso")
     */
    private $recursos;

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
     * @ORM\Column(name="nombre_tipo", type="string", length=255)
     */
    private $nombreTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_tipo", type="text")
     */
    private $descripcionTipo;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recursos = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nombreTipo
     *
     * @param string $nombreTipo
     * @return tipoRecurso
     */
    public function setNombreTipo($nombreTipo)
    {
        $this->nombreTipo = $nombreTipo;

        return $this;
    }

    /**
     * Get nombreTipo
     *
     * @return string
     */
    public function getNombreTipo()
    {
        return $this->nombreTipo;
    }

    /**
     * Set descripcionTipo
     *
     * @param string $descripcionTipo
     * @return tipoRecurso
     */
    public function setDescripcionTipo($descripcionTipo)
    {
        $this->descripcionTipo = $descripcionTipo;

        return $this;
    }

    /**
     * Get descripcionTipo
     *
     * @return string
     */
    public function getDescripcionTipo()
    {
        return $this->descripcionTipo;
    }


    /**
     * Add recursos
     *
     * @param \SquirrelBundle\Entity\Recurso $recursos
     * @return tipoRecurso
     */
    public function addRecurso(\SquirrelBundle\Entity\Recurso $recursos)
    {
        $this->recursos[] = $recursos;

        return $this;
    }

    /**
     * Remove recursos
     *
     * @param \SquirrelBundle\Entity\Recurso $recursos
     */
    public function removeRecurso(\SquirrelBundle\Entity\Recurso $recursos)
    {
        $this->recursos->removeElement($recursos);
    }

    /**
     * Get recursos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRecursos()
    {
        return $this->recursos;
    }
}
