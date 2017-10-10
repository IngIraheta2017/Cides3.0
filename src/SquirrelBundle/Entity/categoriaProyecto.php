<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * categoriaProyecto
 *
 * @ORM\Table(name="categoria_proyecto")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\categoriaProyectoRepository")
 */
class categoriaProyecto
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
     * @ORM\Column(name="nombre_categoria", type="string", length=64)
     */
    private $nombreCategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_categoria", type="string", length=1024)
     */
    private $descripcionCategoria;


    /**
     * @ORM\OneToMany(targetEntity="proyecto", mappedBy="idCategoriaProyecto")
     */
    private $proyectos;



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
     * Set nombreCategoria
     *
     * @param string $nombreCategoria
     * @return categoriaProyecto
     */
    public function setNombreCategoria($nombreCategoria)
    {
        $this->nombreCategoria = $nombreCategoria;

        return $this;
    }

    /**
     * Get nombreCategoria
     *
     * @return string
     */
    public function getNombreCategoria()
    {
        return $this->nombreCategoria;
    }

    /**
     * Set descripcionCategoria
     *
     * @param string $descripcionCategoria
     * @return categoriaProyecto
     */
    public function setDescripcionCategoria($descripcionCategoria)
    {
        $this->descripcionCategoria = $descripcionCategoria;

        return $this;
    }

    /**
     * Get descripcionCategoria
     *
     * @return string
     */
    public function getDescripcionCategoria()
    {
        return $this->descripcionCategoria;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proyectos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add proyectos
     *
     * @param \SquirrelBundle\Entity\proyecto $proyectos
     * @return categoriaProyecto
     */
    public function addProyecto(\SquirrelBundle\Entity\proyecto $proyectos)
    {
        $this->proyectos[] = $proyectos;

        return $this;
    }

    /**
     * Remove proyectos
     *
     * @param \SquirrelBundle\Entity\proyecto $proyectos
     */
    public function removeProyecto(\SquirrelBundle\Entity\proyecto $proyectos)
    {
        $this->proyectos->removeElement($proyectos);
    }

    /**
     * Get proyectos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProyectos()
    {
        return $this->proyectos;
    }
}
