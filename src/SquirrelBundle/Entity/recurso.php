<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * recurso
 *
 * @ORM\Table(name="recurso")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\recursoRepository")
 */
class recurso
{
  /**
   * @ORM\OneToMany(targetEntity="necesita", mappedBy="idRecurso")
   */
  private $necesita;

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
     * @ORM\Column(name="nombre_recurso", type="string", length=255)
     */
    private $nombreRecurso;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_recurso", type="string", length=1024)
     */
    private $descripcionRecurso;



    /**
     * @ORM\ManyToOne(targetEntity="tipoRecurso", inversedBy="recursos")
     */
    private $idTipoRecurso;
    

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
     * Set nombreRecurso
     *
     * @param string $nombreRecurso
     * @return recurso
     */
    public function setNombreRecurso($nombreRecurso)
    {
        $this->nombreRecurso = $nombreRecurso;

        return $this;
    }

    /**
     * Get nombreRecurso
     *
     * @return string
     */
    public function getNombreRecurso()
    {
        return $this->nombreRecurso;
    }

    /**
     * Set descripcionRecurso
     *
     * @param string $descripcionRecurso
     * @return recurso
     */
    public function setDescripcionRecurso($descripcionRecurso)
    {
        $this->descripcionRecurso = $descripcionRecurso;

        return $this;
    }

    /**
     * Get descripcionRecurso
     *
     * @return string
     */
    public function getDescripcionRecurso()
    {
        return $this->descripcionRecurso;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->necesita = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add necesita
     *
     * @param \SquirrelBundle\Entity\necesita $necesita
     * @return recurso
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
     * Set idTipoRecurso
     *
     * @param \SquirrelBundle\Entity\tipoRecurso $idTipoRecurso
     * @return recurso
     */
    public function setIdTipoRecurso(\SquirrelBundle\Entity\tipoRecurso $idTipoRecurso = null)
    {
        $this->idTipoRecurso = $idTipoRecurso;

        return $this;
    }

    /**
     * Get idTipoRecurso
     *
     * @return \SquirrelBundle\Entity\tipoRecurso
     */
    public function getIdTipoRecurso()
    {
        return $this->idTipoRecurso;
    }
}
