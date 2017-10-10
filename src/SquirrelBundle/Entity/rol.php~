<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * rol
 *
 * @ORM\Table(name="rol")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\rolRepository")
 */
class rol
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
     * @ORM\Column(name="nombre_rol", type="string", length=64)
     */
    private $nombreRol;

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
     * @ORM\OneToMany(targetEntity="permiso", mappedBy="idRol")
     */
    private $permisos;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->permisos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombreRol
     *
     * @param string $nombreRol
     * @return rol
     */
    public function setNombreRol($nombreRol)
    {
        $this->nombreRol = $nombreRol;

        return $this;
    }

    /**
     * Get nombreRol
     *
     * @return string
     */
    public function getNombreRol()
    {
        return $this->nombreRol;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return rol
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
     * @return rol
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
     * Add permisos
     *
     * @param \SquirrelBundle\Entity\permiso $permisos
     * @return rol
     */
    public function addPermiso(\SquirrelBundle\Entity\permiso $permisos)
    {
        $this->permisos[] = $permisos;

        return $this;
    }

    /**
     * Remove permisos
     *
     * @param \SquirrelBundle\Entity\permiso $permisos
     */
    public function removePermiso(\SquirrelBundle\Entity\permiso $permisos)
    {
        $this->permisos->removeElement($permisos);
    }

    /**
     * Get permisos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPermisos()
    {
        return $this->permisos;
    }

    /**
     * Add asignacionRol
     *
     * @param \SquirrelBundle\Entity\asignacion $asignacionRol
     * @return rol
     */
    public function addAsignacionRol(\SquirrelBundle\Entity\asignacion $asignacionRol)
    {
        $this->asignacionRol[] = $asignacionRol;

        return $this;
    }

    /**
     * Remove asignacionRol
     *
     * @param \SquirrelBundle\Entity\asignacion $asignacionRol
     */
    public function removeAsignacionRol(\SquirrelBundle\Entity\asignacion $asignacionRol)
    {
        $this->asignacionRol->removeElement($asignacionRol);
    }

    /**
     * Get asignacionRol
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAsignacionRol()
    {
        return $this->asignacionRol;
    }
}
