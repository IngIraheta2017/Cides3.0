<?php

namespace SquirrelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;


/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="SquirrelBundle\Repository\UsuarioRepository")
 */
class Usuario  implements AdvancedUserInterface, \Serializable
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
     * @ORM\Column(name="nombre_completo", type="string", length=64)
     */
    private $nombreCompleto;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo_institucional", type="string", length=64,nullable=true)
     */
    private $cargoInstitucional;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=64)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=64)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="facultad_pertenece", type="string", length=64,nullable=true)
     */
    private $facultadPertenece;

    /**
     * @var string
     *
     * @ORM\Column(name="idioma", type="string", length=255,nullable=true)
     */
    private $idioma;

    /**
     * @var string
     *
     * @ORM\Column(name="preparacion_academica", type="string", length=1024,nullable=true)
     */
    private $preparacionAcademica;

    /**
     * @var string
     *
     * @ORM\Column(name="capacitacion", type="text",nullable=true)
     */
    private $capacitacion;

    /**
     * @var string
     *
     * @ORM\Column(name="publicacion", type="text",nullable=true)
     */
    private $publicacion;

    /**
    * @var bool
    *
    * @ORM\Column(name="is_active", type="boolean")
    */
   private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime",nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime",nullable=true)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="ponencia", type="text",nullable=true)
     */
    private $ponencia;

    /**
     * @ORM\OneToMany(targetEntity="actividad", mappedBy="idUsuario")
     */
    private $actividades;
    /**
     * @ORM\OneToMany(targetEntity="asignacion", mappedBy="idUsuario")
     */
    private $asignacionesUser;
    /**
   * One Usuario has One Rol.
   * @ORM\ManyToOne(targetEntity="rol")
   * @ORM\JoinColumn(name="idRol_id", referencedColumnName="id")
   */
   private $idRol;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actividades = new \Doctrine\Common\Collections\ArrayCollection();
        $this->asignaciones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->isActive = true;
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
     * Set nombreCompleto
     *
     * @param string $nombreCompleto
     * @return Usuario
     */
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;

        return $this;
    }

    /**
     * Get nombreCompleto
     *
     * @return string
     */
    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }

    /**
     * Set cargoInstitucional
     *
     * @param string $cargoInstitucional
     * @return Usuario
     */
    public function setCargoInstitucional($cargoInstitucional)
    {
        $this->cargoInstitucional = $cargoInstitucional;

        return $this;
    }

    /**
     * Get cargoInstitucional
     *
     * @return string
     */
    public function getCargoInstitucional()
    {
        return $this->cargoInstitucional;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Usuario
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set facultadPertenece
     *
     * @param string $facultadPertenece
     * @return Usuario
     */
    public function setFacultadPertenece($facultadPertenece)
    {
        $this->facultadPertenece = $facultadPertenece;

        return $this;
    }

    /**
     * Get facultadPertenece
     *
     * @return string
     */
    public function getFacultadPertenece()
    {
        return $this->facultadPertenece;
    }

    /**
     * Set idioma
     *
     * @param string $idioma
     * @return Usuario
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get idioma
     *
     * @return string
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Set preparacionAcademica
     *
     * @param string $preparacionAcademica
     * @return Usuario
     */
    public function setPreparacionAcademica($preparacionAcademica)
    {
        $this->preparacionAcademica = $preparacionAcademica;

        return $this;
    }

    /**
     * Get preparacionAcademica
     *
     * @return string
     */
    public function getPreparacionAcademica()
    {
        return $this->preparacionAcademica;
    }

    /**
     * Set capacitacion
     *
     * @param string $capacitacion
     * @return Usuario
     */
    public function setCapacitacion($capacitacion)
    {
        $this->capacitacion = $capacitacion;

        return $this;
    }

    /**
     * Get capacitacion
     *
     * @return string
     */
    public function getCapacitacion()
    {
        return $this->capacitacion;
    }

    /**
     * Set publicacion
     *
     * @param string $publicacion
     * @return Usuario
     */
    public function setPublicacion($publicacion)
    {
        $this->publicacion = $publicacion;

        return $this;
    }

    /**
     * Get publicacion
     *
     * @return string
     */
    public function getPublicacion()
    {
        return $this->publicacion;
    }



    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Usuario
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
     * @return Usuario
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
     * Set ponencia
     *
     * @param string $ponencia
     * @return Usuario
     */
    public function setPonencia($ponencia)
    {
        $this->ponencia = $ponencia;

        return $this;
    }

    /**
     * Get ponencia
     *
     * @return string
     */
    public function getPonencia()
    {
        return $this->ponencia;
    }


    /**
     * Add actividades
     *
     * @param \SquirrelBundle\Entity\actividad $actividades
     * @return Usuario
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
     * Add asignacionesUser
     *
     * @param \SquirrelBundle\Entity\asignacion $asignacionesUser
     * @return Usuario
     */
    public function addAsignacionesUser(\SquirrelBundle\Entity\asignacion $asignacionesUser)
    {
        $this->asignacionesUser[] = $asignacionesUser;

        return $this;
    }

    /**
     * Remove asignacionesUser
     *
     * @param \SquirrelBundle\Entity\asignacion $asignacionesUser
     */
    public function removeAsignacionesUser(\SquirrelBundle\Entity\asignacion $asignacionesUser)
    {
        $this->asignacionesUser->removeElement($asignacionesUser);
    }

    /**
     * Get asignacionesUser
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAsignacionesUser()
    {
        return $this->asignacionesUser;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Usuario
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }


    /**
     * Set idRol
     *
     * @param \SquirrelBundle\Entity\rol $idRol
     * @return Usuario
     */
    public function setIdRol(\SquirrelBundle\Entity\rol $idRol = null)
    {
        $this->idRol = $idRol;

        return $this;
    }


    public function getIdRol()
    {
        return $this->idRol;
    }

    public function getRoles()
   {
     if(($this->idRol->getId()) == 1){
      return array('ROLE_ADMIN');
    }elseif (($this->idRol->getId()) == 2) {
      return  array('ROLE_USER');
    }

   }
      public function getSalt()
   {
       return null;
   }
   public function eraseCredentials()
   {
   }
     /** @see \Serializable::serialize() */
     public function serialize()
     {
         return serialize(array(
             $this->id,
             $this->username,
             $this->password,
             $this->isActive
         ));
     }
     /** @see \Serializable::unserialize() */
     public function unserialize($serialized)
     {
         list (
             $this->id,
             $this->username,
             $this->password,
             $this->isActive
         ) = unserialize($serialized);
     }
     public function isAccountNonExpired()
     {
         return true;
     }
     public function isAccountNonLocked()
     {
         return true;
     }
     public function isCredentialsNonExpired()
     {
         return true;
     }
     public function isEnabled()
     {
         return $this->isActive;
     }
}
