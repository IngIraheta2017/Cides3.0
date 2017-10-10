<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * indicador
 *
 * @ORM\Table(name="indicador")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\indicadorRepository")
 */
class indicador
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
     * @ORM\Column(name="descripcion_indicador", type="text")
     */
    private $descripcionIndicador;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_indicador", type="string", length=255)
     */
    private $tipoIndicador;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_indicador", type="string", length=255)
     */
    private $nombreIndicador;



    /**
     * @ORM\ManyToOne(targetEntity="proyecto", inversedBy="indicador")
     */
    private $idProyecto;

    /**
       * @ORM\OneToMany(targetEntity="resultado", mappedBy="idResultado")
       */
      private $resultado;

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
     * Set descripcionIndicador
     *
     * @param string $descripcionIndicador
     * @return indicador
     */
    public function setDescripcionIndicador($descripcionIndicador)
    {
        $this->descripcionIndicador = $descripcionIndicador;

        return $this;
    }

    /**
     * Get descripcionIndicador
     *
     * @return string
     */
    public function getDescripcionIndicador()
    {
        return $this->descripcionIndicador;
    }

    /**
     * Set tipoIndicador
     *
     * @param string $tipoIndicador
     * @return indicador
     */
    public function setTipoIndicador($tipoIndicador)
    {
        $this->tipoIndicador = $tipoIndicador;

        return $this;
    }

    /**
     * Get tipoIndicador
     *
     * @return string
     */
    public function getTipoIndicador()
    {
        return $this->tipoIndicador;
    }

    /**
     * Set nombreIndicador
     *
     * @param string $nombreIndicador
     * @return indicador
     */
    public function setNombreIndicador($nombreIndicador)
    {
        $this->nombreIndicador = $nombreIndicador;

        return $this;
    }

    /**
     * Get nombreIndicador
     *
     * @return string
     */
    public function getNombreIndicador()
    {
        return $this->nombreIndicador;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->resultado = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set idProyecto
     *
     * @param \SquirrelBundle\Entity\proyecto $idProyecto
     * @return indicador
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
     * Add resultado
     *
     * @param \SquirrelBundle\Entity\Resultado $resultado
     * @return indicador
     */
    public function addResultado(\SquirrelBundle\Entity\Resultado $resultado)
    {
        $this->resultado[] = $resultado;

        return $this;
    }

    /**
     * Remove resultado
     *
     * @param \SquirrelBundle\Entity\Resultado $resultado
     */
    public function removeResultado(\SquirrelBundle\Entity\Resultado $resultado)
    {
        $this->resultado->removeElement($resultado);
    }

    /**
     * Get resultado
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResultado()
    {
        return $this->resultado;
    }
}
