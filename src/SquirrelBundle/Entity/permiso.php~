<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * permiso
 *
 * @ORM\Table(name="permiso")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\permisoRepository")
 */
class permiso
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
      * @ORM\ManyToOne(targetEntity="rol", inversedBy="permisos")
      */
     private $idRol;


     /**
       * @ORM\ManyToOne(targetEntity="menuItem", inversedBy="permisos")
       */
      private $idMenuItem;


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
     * Set idRol
     *
     * @param \SquirrelBundle\Entity\Rol $idRol
     * @return permiso
     */
    public function setIdRol(\SquirrelBundle\Entity\Rol $idRol = null)
    {
        $this->idRol = $idRol;

        return $this;
    }

    /**
     * Get idRol
     *
     * @return \SquirrelBundle\Entity\Rol
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * Set idMenuItem
     *
     * @param \SquirrelBundle\Entity\menuItem $idMenuItem
     * @return permiso
     */
    public function setIdMenuItem(\SquirrelBundle\Entity\menuItem $idMenuItem = null)
    {
        $this->idMenuItem = $idMenuItem;

        return $this;
    }

    /**
     * Get idMenuItem
     *
     * @return \SquirrelBundle\Entity\menuItem
     */
    public function getIdMenuItem()
    {
        return $this->idMenuItem;
    }
}
