<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * necesita
 *
 * @ORM\Table(name="necesita")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\necesitaRepository")
 */
class necesita
{
  /**
   * @var string
   *
   * @ORM\Column(name="descripcion_recurso_solicitar", type="text")
   */
  private $descripcion_recurso_solicitar;

  /**
   * @var int
   *
   * @ORM\Column(name="cantidad_recurso_solicitar", type="integer")
   */
  private $cantidad_recurso_solicitar;


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var \SquirrelBundle\Entity\proyecto
     *
     * @ORM\ManyToOne(targetEntity="SquirrelBundle\Entity\proyecto", inversedBy="necesita")
     */
    private $idProyecto;

    /**
     * @var \SquirrelBundle\Entity\recurso
     *
     * @ORM\ManyToOne(targetEntity="SquirrelBundle\Entity\recurso", inversedBy="necesita")
     */
    private $idRecurso;


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
     * Set descripcion_recurso_solicitar
     *
     * @param string $descripcionRecursoSolicitar
     * @return necesita
     */
    public function setDescripcionRecursoSolicitar($descripcionRecursoSolicitar)
    {
        $this->descripcion_recurso_solicitar = $descripcionRecursoSolicitar;

        return $this;
    }

    /**
     * Get descripcion_recurso_solicitar
     *
     * @return string
     */
    public function getDescripcionRecursoSolicitar()
    {
        return $this->descripcion_recurso_solicitar;
    }

    /**
     * Set cantidad_recurso_solicitar
     *
     * @param integer $cantidadRecursoSolicitar
     * @return necesita
     */
    public function setCantidadRecursoSolicitar($cantidadRecursoSolicitar)
    {
        $this->cantidad_recurso_solicitar = $cantidadRecursoSolicitar;

        return $this;
    }

    /**
     * Get cantidad_recurso_solicitar
     *
     * @return integer
     */
    public function getCantidadRecursoSolicitar()
    {
        return $this->cantidad_recurso_solicitar;
    }

    /**
     * Set idProyecto
     *
     * @param \SquirrelBundle\Entity\proyecto $idProyecto
     * @return necesita
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

    /**
     * Set idRecurso
     *
     * @param \SquirrelBundle\Entity\recurso $idRecurso
     * @return necesita
     */
    public function setIdRecurso(\SquirrelBundle\Entity\recurso $idRecurso = null)
    {
        $this->idRecurso = $idRecurso;

        return $this;
    }

    /**
     * Get idRecurso
     *
     * @return \SquirrelBundle\Entity\recurso
     */
    public function getIdRecurso()
    {
        return $this->idRecurso;
    }
}
