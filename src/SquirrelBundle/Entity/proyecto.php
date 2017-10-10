<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * proyecto
 *
 * @ORM\Table(name="proyecto")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\proyectoRepository")
 */
class proyecto
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
     * @ORM\Column(name="nombre_proyecto", type="string", length=255)
     */
    private $nombreProyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="tema_proyecto", type="string", length=255)
     */
    private $temaProyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="justificacion_proyecto", type="text")
     */
    private $justificacionProyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="resultados_esperados", type="text")
     */
    private $resultadosEsperados;

    /**
     * @var string
     *
     * @ORM\Column(name="presupuesto", type="text")
     */
    private $presupuesto;

    /**
     * @var \SquirrelBundle\Entity\estadoProyecto
     *
     * @ORM\ManyToOne(targetEntity="SquirrelBundle\Entity\estadoProyecto", inversedBy="proyectos")
     */
    private $idEstadoProyecto;


    /**
     * @ORM\OneToMany(targetEntity="necesita", mappedBy="idProyecto")
     */
    private $necesita;

    /**
     * @ORM\OneToMany(targetEntity="objetivo", mappedBy="idProyecto")
     */
    private $objetivos;

    /**
     * @ORM\OneToMany(targetEntity="asignacion", mappedBy="idProyecto")
     */
    private $asignaciones;

    /**
     * @ORM\OneToMany(targetEntity="observacion", mappedBy="idProyecto")
     */
    private $observaciones;

    /**
     * @ORM\OneToMany(targetEntity="actividad", mappedBy="idProyecto")
     */
    private $actividades;


    /**
     * @ORM\OneToMany(targetEntity="indicador", mappedBy="idProyecto")
     */
    private $indicador;

    /**
   * @ORM\ManyToOne(targetEntity="categoriaProyecto", inversedBy="proyectos")
   */
    private $idCategoriaProyecto;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->necesita = new \Doctrine\Common\Collections\ArrayCollection();
        $this->objetivos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->asignaciones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->observaciones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->actividades = new \Doctrine\Common\Collections\ArrayCollection();
        $this->indicador = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombreProyecto
     *
     * @param string $nombreProyecto
     * @return proyecto
     */
    public function setNombreProyecto($nombreProyecto)
    {
        $this->nombreProyecto = $nombreProyecto;

        return $this;
    }

    /**
     * Get nombreProyecto
     *
     * @return string
     */
    public function getNombreProyecto()
    {
        return $this->nombreProyecto;
    }

    /**
     * Set temaProyecto
     *
     * @param string $temaProyecto
     * @return proyecto
     */
    public function setTemaProyecto($temaProyecto)
    {
        $this->temaProyecto = $temaProyecto;

        return $this;
    }

    /**
     * Get temaProyecto
     *
     * @return string
     */
    public function getTemaProyecto()
    {
        return $this->temaProyecto;
    }

    /**
     * Set justificacionProyecto
     *
     * @param string $justificacionProyecto
     * @return proyecto
     */
    public function setJustificacionProyecto($justificacionProyecto)
    {
        $this->justificacionProyecto = $justificacionProyecto;

        return $this;
    }

    /**
     * Get justificacionProyecto
     *
     * @return string
     */
    public function getJustificacionProyecto()
    {
        return $this->justificacionProyecto;
    }

    /**
     * Set resultadosEsperados
     *
     * @param string $resultadosEsperados
     * @return proyecto
     */
    public function setResultadosEsperados($resultadosEsperados)
    {
        $this->resultadosEsperados = $resultadosEsperados;

        return $this;
    }

    /**
     * Get resultadosEsperados
     *
     * @return string
     */
    public function getResultadosEsperados()
    {
        return $this->resultadosEsperados;
    }

    /**
     * Set presupuesto
     *
     * @param string $presupuesto
     * @return proyecto
     */
    public function setPresupuesto($presupuesto)
    {
        $this->presupuesto = $presupuesto;

        return $this;
    }

    /**
     * Get presupuesto
     *
     * @return string
     */
    public function getPresupuesto()
    {
        return $this->presupuesto;
    }


    /**
     * Set idEstadoProyecto
     *
     * @param \SquirrelBundle\Entity\estadoProyecto $idEstadoProyecto
     * @return proyecto
     */
    public function setIdEstadoProyecto(\SquirrelBundle\Entity\estadoProyecto $idEstadoProyecto = null)
    {
        $this->idEstadoProyecto = $idEstadoProyecto;

        return $this;
    }

    /**
     * Get idEstadoProyecto
     *
     * @return \SquirrelBundle\Entity\estadoProyecto
     */
    public function getIdEstadoProyecto()
    {
        return $this->idEstadoProyecto;
    }

    /**
     * Add necesita
     *
     * @param \SquirrelBundle\Entity\necesita $necesita
     * @return proyecto
     */
    public function addNecesitum(\SquirrelBundle\Entity\necesita $necesita)
    {
        $this->necesita[] = $necesita;

        return $this;
    }

    /**
     * Remove necesita
     *
     * @param \SquirrelBundle\Entity\necesita $necesita
     */
    public function removeNecesitum(\SquirrelBundle\Entity\necesita $necesita)
    {
        $this->necesita->removeElement($necesita);
    }

    /**
     * Get necesita
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNecesita()
    {
        return $this->necesita;
    }

    /**
     * Add objetivos
     *
     * @param \SquirrelBundle\Entity\objetivo $objetivos
     * @return proyecto
     */
    public function addObjetivo(\SquirrelBundle\Entity\objetivo $objetivos)
    {
        $this->objetivos[] = $objetivos;

        return $this;
    }

    /**
     * Remove objetivos
     *
     * @param \SquirrelBundle\Entity\objetivo $objetivos
     */
    public function removeObjetivo(\SquirrelBundle\Entity\objetivo $objetivos)
    {
        $this->objetivos->removeElement($objetivos);
    }

    /**
     * Get objetivos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObjetivos()
    {
        return $this->objetivos;
    }

    /**
     * Add asignaciones
     *
     * @param \SquirrelBundle\Entity\asignacion $asignaciones
     * @return proyecto
     */
    public function addAsignacione(\SquirrelBundle\Entity\asignacion $asignaciones)
    {
        $this->asignaciones[] = $asignaciones;

        return $this;
    }

    /**
     * Remove asignaciones
     *
     * @param \SquirrelBundle\Entity\asignacion $asignaciones
     */
    public function removeAsignacione(\SquirrelBundle\Entity\asignacion $asignaciones)
    {
        $this->asignaciones->removeElement($asignaciones);
    }

    /**
     * Get asignaciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAsignaciones()
    {
        return $this->asignaciones;
    }

    /**
     * Add observaciones
     *
     * @param \SquirrelBundle\Entity\observacion $observaciones
     * @return proyecto
     */
    public function addObservacione(\SquirrelBundle\Entity\observacion $observaciones)
    {
        $this->observaciones[] = $observaciones;

        return $this;
    }

    /**
     * Remove observaciones
     *
     * @param \SquirrelBundle\Entity\observacion $observaciones
     */
    public function removeObservacione(\SquirrelBundle\Entity\observacion $observaciones)
    {
        $this->observaciones->removeElement($observaciones);
    }

    /**
     * Get observaciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Add actividades
     *
     * @param \SquirrelBundle\Entity\actividad $actividades
     * @return proyecto
     */
    public function addActividade(\SquirrelBundle\Entity\actividad $actividades)
    {
        $this->actividades[] = $actividades;

        return $this;
    }

    /**
     * Remove actividades
     *
     * @param \SquirrelBundle\Entity\actividad $actividades
     */
    public function removeActividade(\SquirrelBundle\Entity\actividad $actividades)
    {
        $this->actividades->removeElement($actividades);
    }

    /**
     * Get actividades
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActividades()
    {
        return $this->actividades;
    }

    /**
     * Add indicador
     *
     * @param \SquirrelBundle\Entity\indicador $indicador
     * @return proyecto
     */
    public function addIndicador(\SquirrelBundle\Entity\indicador $indicador)
    {
        $this->indicador[] = $indicador;

        return $this;
    }

    /**
     * Remove indicador
     *
     * @param \SquirrelBundle\Entity\indicador $indicador
     */
    public function removeIndicador(\SquirrelBundle\Entity\indicador $indicador)
    {
        $this->indicador->removeElement($indicador);
    }

    /**
     * Get indicador
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIndicador()
    {
        return $this->indicador;
    }

    /**
     * Set idCategoriaProyecto
     *
     * @param \SquirrelBundle\Entity\categoriaProyecto $idCategoriaProyecto
     * @return proyecto
     */
    public function setIdCategoriaProyecto(\SquirrelBundle\Entity\categoriaProyecto $idCategoriaProyecto = null)
    {
        $this->idCategoriaProyecto = $idCategoriaProyecto;

        return $this;
    }

    /**
     * Get idCategoriaProyecto
     *
     * @return \SquirrelBundle\Entity\categoriaProyecto
     */
    public function getIdCategoriaProyecto()
    {
        return $this->idCategoriaProyecto;
    }
}
