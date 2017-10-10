<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * asignacion
 *
 * @ORM\Table(name="asignacion")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\asignacionRepository")
 */
class asignacion
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;


    /**
    * @ORM\ManyToOne(targetEntity="proyecto", inversedBy="asignaciones")
    */
   private $idProyecto;

   /**
   * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="asignacionesUser")
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return asignacion
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return asignacion
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set idProyecto
     *
     * @param \SquirrelBundle\Entity\proyecto $idProyecto
     * @return asignacion
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
     * @param \SquirrelBundle\Entity\Usuario $idUsuario
     * @return asignacion
     */
    public function setIdUsuario(\SquirrelBundle\Entity\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \SquirrelBundle\Entity\Usuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set idRol
     *
     * @param \SquirrelBundle\Entity\rol $idRol
     * @return asignacion
     */
    public function setIdRol(\SquirrelBundle\Entity\rol $idRol = null)
    {
        $this->idRol = $idRol;

        return $this;
    }

    /**
     * Get idRol
     *
     * @return \SquirrelBundle\Entity\rol
     */
    public function getIdRol()
    {
        return $this->idRol;
    }
}
