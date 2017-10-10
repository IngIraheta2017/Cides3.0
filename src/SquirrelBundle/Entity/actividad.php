<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * actividad
 *
 * @ORM\Table(name="actividad")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\actividadRepository")
 */
class actividad
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
    * One actividad has Many subActividades.
    * @ORM\OneToMany(targetEntity="actividad", mappedBy="parent_actividad")
    */
   private $children_actividad;
   /**
    * Many subActividades have One Actividad.
    * @ORM\ManyToOne(targetEntity="actividad", inversedBy="children_actividad")
    * @ORM\JoinColumn(name="parent_actividad", referencedColumnName="id")
    */
   private $parent_actividad;

  //  segunda relacion reflexiva

  /**
  * One actividad has Many subActividades.
  * @ORM\OneToMany(targetEntity="actividad", mappedBy="parent_nivel")
  */
 private $children_nivel;
 /**
  * Many subActividades have One Actividad.
  * @ORM\ManyToOne(targetEntity="actividad", inversedBy="children_nivel")
  * @ORM\JoinColumn(name="parent_nivel", referencedColumnName="id")
  */
 private $parent_nivel;


   /**
    * Constructor
    */
   public function __construct()
   {
       $this->children_actividad = new \Doctrine\Common\Collections\ArrayCollection();
       $this->children_nivel = new \Doctrine\Common\Collections\ArrayCollection();
   }
    /**
     * @var string
     *
     * @ORM\Column(name="nombre_actividad", type="string", length=255)
     */
    private $nombreActividad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime")
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="datetime")
     */
    private $fechaFin;

    /**
     * @var int
     *
     * @ORM\Column(name="duracion", type="integer")
     */
    private $duracion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_actividad", type="text")
     */
    private $descripcionActividad;


    /**
    * @ORM\ManyToOne(targetEntity="proyecto", inversedBy="actividades")
    */
   private $idProyecto;

   /**
   * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="actividades")
   */
  private $idUsuario;

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
     * Set nombreActividad
     *
     * @param string $nombreActividad
     * @return actividad
     */
    public function setNombreActividad($nombreActividad)
    {
        $this->nombreActividad = $nombreActividad;

        return $this;
    }

    /**
     * Get nombreActividad
     *
     * @return string
     */
    public function getNombreActividad()
    {
        return $this->nombreActividad;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return actividad
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return actividad
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set duracion
     *
     * @param integer $duracion
     * @return actividad
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get duracion
     *
     * @return integer
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set descripcionActividad
     *
     * @param string $descripcionActividad
     * @return actividad
     */
    public function setDescripcionActividad($descripcionActividad)
    {
        $this->descripcionActividad = $descripcionActividad;

        return $this;
    }

    /**
     * Get descripcionActividad
     *
     * @return string
     */
    public function getDescripcionActividad()
    {
        return $this->descripcionActividad;
    }

    /**
     * Set idProyecto
     *
     * @param \SquirrelBundle\Entity\proyecto $idProyecto
     * @return actividad
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
     * Set idUsuario
     *
     * @param \SquirrelBundle\Entity\usuario $idUsuario
     * @return actividad
     */
    public function setIdUsuario(\SquirrelBundle\Entity\usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \SquirrelBundle\Entity\usuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Add children_actividad
     *
     * @param \SquirrelBundle\Entity\actividad $childrenActividad
     * @return actividad
     */
    public function addChildrenActividad(\SquirrelBundle\Entity\actividad $childrenActividad)
    {
        $this->children_actividad[] = $childrenActividad;

        return $this;
    }

    /**
     * Remove children_actividad
     *
     * @param \SquirrelBundle\Entity\actividad $childrenActividad
     */
    public function removeChildrenActividad(\SquirrelBundle\Entity\actividad $childrenActividad)
    {
        $this->children_actividad->removeElement($childrenActividad);
    }

    /**
     * Get children_actividad
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildrenActividad()
    {
        return $this->children_actividad;
    }

    /**
     * Set parent_actividad
     *
     * @param \SquirrelBundle\Entity\actividad $parentActividad
     * @return actividad
     */
    public function setParentActividad(\SquirrelBundle\Entity\actividad $parentActividad = null)
    {
        $this->parent_actividad = $parentActividad;

        return $this;
    }

    /**
     * Get parent_actividad
     *
     * @return \SquirrelBundle\Entity\actividad 
     */
    public function getParentActividad()
    {
        return $this->parent_actividad;
    }

    /**
     * Add children_nivel
     *
     * @param \SquirrelBundle\Entity\actividad $childrenNivel
     * @return actividad
     */
    public function addChildrenNivel(\SquirrelBundle\Entity\actividad $childrenNivel)
    {
        $this->children_nivel[] = $childrenNivel;

        return $this;
    }

    /**
     * Remove children_nivel
     *
     * @param \SquirrelBundle\Entity\actividad $childrenNivel
     */
    public function removeChildrenNivel(\SquirrelBundle\Entity\actividad $childrenNivel)
    {
        $this->children_nivel->removeElement($childrenNivel);
    }

    /**
     * Get children_nivel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildrenNivel()
    {
        return $this->children_nivel;
    }

    /**
     * Set parent_nivel
     *
     * @param \SquirrelBundle\Entity\actividad $parentNivel
     * @return actividad
     */
    public function setParentNivel(\SquirrelBundle\Entity\actividad $parentNivel = null)
    {
        $this->parent_nivel = $parentNivel;

        return $this;
    }

    /**
     * Get parent_nivel
     *
     * @return \SquirrelBundle\Entity\actividad 
     */
    public function getParentNivel()
    {
        return $this->parent_nivel;
    }
}
