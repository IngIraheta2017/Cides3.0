<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * resultado
 *
 * @ORM\Table(name="resultado")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\resultadoRepository")
 */
class resultado
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
     * @ORM\Column(name="descripcion_resultado", type="text")
     */
    private $descripcionResultado;


    /**
     * @ORM\ManyToOne(targetEntity="indicador", inversedBy="resultado")
     */
    private $idResultado;


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
     * Set descripcionResultado
     *
     * @param string $descripcionResultado
     * @return resultado
     */
    public function setDescripcionResultado($descripcionResultado)
    {
        $this->descripcionResultado = $descripcionResultado;

        return $this;
    }

    /**
     * Get descripcionResultado
     *
     * @return string
     */
    public function getDescripcionResultado()
    {
        return $this->descripcionResultado;
    }

    /**
     * Set idResultado
     *
     * @param \SquirrelBundle\Entity\indicador $idResultado
     * @return resultado
     */
    public function setIdResultado(\SquirrelBundle\Entity\indicador $idResultado = null)
    {
        $this->idResultado = $idResultado;

        return $this;
    }

    /**
     * Get idResultado
     *
     * @return \SquirrelBundle\Entity\indicador 
     */
    public function getIdResultado()
    {
        return $this->idResultado;
    }
}
