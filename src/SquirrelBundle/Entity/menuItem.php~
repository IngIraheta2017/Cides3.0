<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * menuItem
 *
 * @ORM\Table(name="menu_item")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\menuItemRepository")
 */
class menuItem
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
    * One Category has Many Categories.
    * @ORM\OneToMany(targetEntity="menuItem", mappedBy="parent_menu")
    */
   private $children_menu;
   /**
    * Many Categories have One Category.
    * @ORM\ManyToOne(targetEntity="menuItem", inversedBy="children_menu")
    * @ORM\JoinColumn(name="parent_menu_id", referencedColumnName="id")
    */
   private $parent_menu;
   
   /**
    * Constructor
    */
   public function __construct()
   {
       $this->permisos = new \Doctrine\Common\Collections\ArrayCollection();
       $this->children_menu = new \Doctrine\Common\Collections\ArrayCollection();
   }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \string
     *
     * @ORM\Column(name="nombre_menu", type="string", length=64)
     */
    private $nombremenu;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;


    /**
     * @ORM\OneToMany(targetEntity="permiso", mappedBy="idMenuItem")
     */
    private $permisos;

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
     * @return menuItem
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
     * @return menuItem
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
     * @return menuItem
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
     * Set nombremenu
     *
     * @param string $nombremenu
     * @return menuItem
     */
    public function setNombremenu($nombremenu)
    {
        $this->nombremenu = $nombremenu;

        return $this;
    }

    /**
     * Get nombremenu
     *
     * @return string 
     */
    public function getNombremenu()
    {
        return $this->nombremenu;
    }

    /**
     * Add children_menu
     *
     * @param \SquirrelBundle\Entity\menuItem $childrenMenu
     * @return menuItem
     */
    public function addChildrenMenu(\SquirrelBundle\Entity\menuItem $childrenMenu)
    {
        $this->children_menu[] = $childrenMenu;

        return $this;
    }

    /**
     * Remove children_menu
     *
     * @param \SquirrelBundle\Entity\menuItem $childrenMenu
     */
    public function removeChildrenMenu(\SquirrelBundle\Entity\menuItem $childrenMenu)
    {
        $this->children_menu->removeElement($childrenMenu);
    }

    /**
     * Get children_menu
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildrenMenu()
    {
        return $this->children_menu;
    }

    /**
     * Set parent_menu
     *
     * @param \SquirrelBundle\Entity\menuItem $parentMenu
     * @return menuItem
     */
    public function setParentMenu(\SquirrelBundle\Entity\menuItem $parentMenu = null)
    {
        $this->parent_menu = $parentMenu;

        return $this;
    }

    /**
     * Get parent_menu
     *
     * @return \SquirrelBundle\Entity\menuItem 
     */
    public function getParentMenu()
    {
        return $this->parent_menu;
    }
}
