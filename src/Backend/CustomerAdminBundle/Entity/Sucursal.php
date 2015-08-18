<?php
 
namespace Backend\CustomerAdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="sucursal")
 * @ORM\Entity()
 */
class Sucursal 
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(name="phone", type="string", length=100)
     */
    private $phone;
	
    /**
     * @ORM\Column(name="email", type="string", length=100,nullable=true)
     */
    private $email;
	
    /**
     * @ORM\Column(name="website", type="string", length=100,nullable=true)
     */
    private $website;
	
    /**
     * @ORM\Column(name="cuit", type="string", length=100)
     */
    private $cuit;
    
    /**
     * @ORM\Column(name="is_unica", type="boolean",nullable=true)
     */
    private $is_unica;	
	
    /**
     * @ORM\Column(name="open", type="boolean",nullable=true)
     */
    private $open;	
	
    /**
     * @ORM\ManyToOne(targetEntity="\Backend\CustomerBundle\Entity\Customer", inversedBy="sucursales")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
   
    private $customer;	
	
    /**
     * @ORM\OneToOne(targetEntity="Direccion", inversedBy="sucursal")
     * @ORM\JoinColumn(name="direccion_id", referencedColumnName="id")
     */
   
    private $direccion;	
	
    /**
     * @ORM\ManyToMany(targetEntity="\Backend\AdminBundle\Entity\Categoria", inversedBy="sucursales")
     */
    protected $categorias;
	
    /**
     * @ORM\ManyToOne(targetEntity="\Backend\AdminBundle\Entity\Horario", inversedBy="sucursales")
     * @ORM\JoinColumn(name="horario_id", referencedColumnName="id")
     */
    private $horario;
		
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
	
    private $createdAt;
	
    /**
     * @ORM\Column(name="is_active", type="boolean",nullable=true)
     */
    private $is_active;
		
    
    public function __construct() {
	
		$this->createdAt = new \DateTime('now');
		$this->open = false;
		$this->active = true;
         
    }
    
    public function __toString()
    {
          return $this->name;
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
     * Set phone
     *
     * @param string $phone
     * @return Sucursal
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set cuit
     *
     * @param string $cuit
     * @return Sucursal
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;

        return $this;
    }

    /**
     * Get cuit
     *
     * @return string 
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * Set is_unica
     *
     * @param boolean $isUnica
     * @return Sucursal
     */
    public function setIsUnica($isUnica)
    {
        $this->is_unica = $isUnica;

        return $this;
    }

    /**
     * Get is_unica
     *
     * @return boolean 
     */
    public function getIsUnica()
    {
        return $this->is_unica;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Sucursal
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
     * Set is_active
     *
     * @param boolean $isActive
     * @return Sucursal
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set customer
     *
     * @param \Backend\CustomerBundle\Entity\Customer $customer
     * @return Sucursal
     */
    public function setCustomer(\Backend\CustomerBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Backend\CustomerBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set zona
     *
     * @param \Backend\AdminBundle\Entity\Zona $zona
     * @return Sucursal
     */
    public function setZona(\Backend\AdminBundle\Entity\Zona $zona = null)
    {
        $this->zona = $zona;

        return $this;
    }

    /**
     * Get zona
     *
     * @return \Backend\AdminBundle\Entity\Zona 
     */
    public function getZona()
    {
        return $this->zona;
    }

    /**
     * Set barrio
     *
     * @param \Backend\AdminBundle\Entity\Barrio $barrio
     * @return Sucursal
     */
    public function setBarrio(\Backend\AdminBundle\Entity\Barrio $barrio = null)
    {
        $this->barrio = $barrio;

        return $this;
    }

    /**
     * Get barrio
     *
     * @return \Backend\AdminBundle\Entity\Barrio 
     */
    public function getBarrio()
    {
        return $this->barrio;
    }

    /**
     * Set direccion
     *
     * @param \Backend\CustomerAdminBundle\Entity\Direccion $direccion
     * @return Sucursal
     */
    public function setDireccion(\Backend\CustomerAdminBundle\Entity\Direccion $direccion = null)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return \Backend\CustomerAdminBundle\Entity\Direccion 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Add categorias
     *
     * @param \Backend\AdminBundle\Entity\Categoria $categorias
     * @return Sucursal
     */
    public function addCategoria(\Backend\AdminBundle\Entity\Categoria $categorias)
    {
        $this->categorias[] = $categorias;

        return $this;
    }

    /**
     * Remove categorias
     *
     * @param \Backend\AdminBundle\Entity\Categoria $categorias
     */
    public function removeCategoria(\Backend\AdminBundle\Entity\Categoria $categorias)
    {
        $this->categorias->removeElement($categorias);
    }

    /**
     * Get categorias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Sucursal
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set open
     *
     * @param boolean $open
     * @return Sucursal
     */
    public function setOpen($open)
    {
        $this->open = $open;

        return $this;
    }

    /**
     * Get open
     *
     * @return boolean 
     */
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Sucursal
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
     * Set website
     *
     * @param string $website
     * @return Sucursal
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set horario
     *
     * @param \Backend\AdminBundle\Entity\Horario $horario
     * @return Sucursal
     */
    public function setHorario(\Backend\AdminBundle\Entity\Horario $horario = null)
    {
        $this->horario = $horario;

        return $this;
    }

    /**
     * Get horario
     *
     * @return \Backend\AdminBundle\Entity\Horario 
     */
    public function getHorario()
    {
        return $this->horario;
    }
}