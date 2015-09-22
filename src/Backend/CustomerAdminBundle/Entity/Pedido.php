<?php
 
namespace Backend\CustomerAdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Table(name="pedido")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks 
 */
class Pedido 
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    

    /**
     * @ORM\Column(name="total", type="float")
     */
    private $total;
	
    /**
     * @ORM\ManyToOne(targetEntity="Sucursal", inversedBy="pedidos")
     * @ORM\JoinColumn(name="sucursal_id", referencedColumnName="id")
     */

    protected $sucursal;
	   
	 /**
     * @ORM\OneToMany(targetEntity="Detalle", mappedBy="pedido")
     */
    private $detalles;
   
    /**
     * @ORM\ManyToOne(targetEntity="\Backend\AdminBundle\Entity\PayMethod", inversedBy="pedidos")
     * @ORM\JoinColumn(name="pay_id", referencedColumnName="id")
     */
    private $paymethod;
    
    /**
     * @ORM\ManyToOne(targetEntity="Status", inversedBy="pedidos")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;
	
    /**
     * @ORM\ManyToOne(targetEntity="\Backend\CustomerBundle\Entity\Customer", inversedBy="pedidos")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;	
	
    /**
     * @ORM\ManyToOne(targetEntity="Direccion", inversedBy="pedidos")
     * @ORM\JoinColumn(name="direccion_id", referencedColumnName="id")
     */
    private $direccion;
		
	
    /**
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;
    
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
   
     /**
     * @ORM\Column(name="modified_at", type="datetime", nullable=true)
     */
    private $modifiedAt;	
    

    public function __construct() {
	
		  $this->alwaysAvailable = true;
		  $this->isActive = true;
		  $this->createdAt = new \DateTime('now');
		  $this->variedades = new \Doctrine\Common\Collections\ArrayCollection();
         
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
     * Set name
     *
     * @param string $name
     * @return Producto
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
     * Set code
     *
     * @param string $code
     * @return Producto
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set precio
     *
     * @param string $precio
     * @return Producto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set alwaysAvailable
     *
     * @param boolean $alwaysAvailable
     * @return Producto
     */
    public function setAlwaysAvailable($alwaysAvailable)
    {
        $this->alwaysAvailable = $alwaysAvailable;

        return $this;
    }

    /**
     * Get alwaysAvailable
     *
     * @return boolean 
     */
    public function getAlwaysAvailable()
    {
        return $this->alwaysAvailable;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Producto
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
     * Set modifiedAt
     *
     * @param \DateTime $modifiedAt
     * @return Producto
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime 
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }
    
    /**
     * Set categoria
     *
     * @param \Backend\AdminBundle\Entity\Categoria $categoria
     * @return Producto
     */
    public function setCategoria(\Backend\AdminBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }
 
    /**
     * Set description
     *
     * @param string $description
     * @return Producto
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add sucursales
     *
     * @param \Backend\CustomerAdminBundle\Entity\Sucursales $sucursales
     * @return Producto
     */
    public function addSucursal(\Backend\CustomerAdminBundle\Entity\Sucursal $sucursales)
    {
        $this->sucursales[] = $sucursales;
		$sucursales->addProducto($this);

        return $this;
    }

    /**
     * Remove sucursales
     *
     * @param \Backend\CustomerAdminBundle\Entity\Sucursales $sucursales
     */
    public function removeSucursal(\Backend\CustomerAdminBundle\Entity\Sucursal $sucursales)
    {
        $this->sucursales->removeElement($sucursales);
		$sucursales->removeProducto($this);
    }

    /**
     * Get sucursales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSucursales()
    {
        return $this->sucursales;
    }

    /**
     * Add variedades
     *
     * @param \Backend\CustomerAdminBundle\Entity\Variedad $variedades
     * @return Producto
     */
    public function addVariedades(\Backend\CustomerAdminBundle\Entity\Variedad $variedades)
    {
        $this->variedades[] = $variedades;

        return $this;
    }

    /**
     * Remove variedades
     *
     * @param \Backend\CustomerAdminBundle\Entity\Variedad $variedades
     */
    public function removeVariedades(\Backend\CustomerAdminBundle\Entity\Variedad $variedades)
    {
        $this->variedades->removeElement($variedades);
    }

    /**
     * Get variedades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVariedades()
    {
        return $this->variedades;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Producto
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
     * Add sucursales
     *
     * @param \Backend\CustomerAdminBundle\Entity\Sucursal $sucursales
     * @return Producto
     */
    public function addSucursale(\Backend\CustomerAdminBundle\Entity\Sucursal $sucursales)
    {
        $this->sucursales[] = $sucursales;

        return $this;
    }

    /**
     * Remove sucursales
     *
     * @param \Backend\CustomerAdminBundle\Entity\Sucursal $sucursales
     */
    public function removeSucursale(\Backend\CustomerAdminBundle\Entity\Sucursal $sucursales)
    {
        $this->sucursales->removeElement($sucursales);
    }

    /**
     * Add variedades
     *
     * @param \Backend\CustomerAdminBundle\Entity\Variedad $variedades
     * @return Producto
     */
    public function addVariedade(\Backend\CustomerAdminBundle\Entity\Variedad $variedades)
    {
        $this->variedades[] = $variedades;

        return $this;
    }

    /**
     * Remove variedades
     *
     * @param \Backend\CustomerAdminBundle\Entity\Variedad $variedades
     */
    public function removeVariedade(\Backend\CustomerAdminBundle\Entity\Variedad $variedades)
    {
        $this->variedades->removeElement($variedades);
    }

    

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Producto
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return Pedido
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Pedido
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set sucursales
     *
     * @param \Backend\CustomerAdminBundle\Entity\Sucursal $sucursales
     * @return Pedido
     */
    public function setSucursales(\Backend\CustomerAdminBundle\Entity\Sucursal $sucursales = null)
    {
        $this->sucursales = $sucursales;

        return $this;
    }

    /**
     * Add productos
     *
     * @param \Backend\CustomerAdminBundle\Entity\Producto $productos
     * @return Pedido
     */
    public function addProducto(\Backend\CustomerAdminBundle\Entity\Producto $productos)
    {
        $this->productos[] = $productos;

        return $this;
    }

    /**
     * Remove productos
     *
     * @param \Backend\CustomerAdminBundle\Entity\Producto $productos
     */
    public function removeProducto(\Backend\CustomerAdminBundle\Entity\Producto $productos)
    {
        $this->productos->removeElement($productos);
    }

    /**
     * Get productos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Set paymethod
     *
     * @param \Backend\AdminBundle\Entity\PayMethod $paymethod
     * @return Pedido
     */
    public function setPaymethod(\Backend\AdminBundle\Entity\PayMethod $paymethod = null)
    {
        $this->paymethod = $paymethod;

        return $this;
    }

    /**
     * Get paymethod
     *
     * @return \Backend\AdminBundle\Entity\PayMethod 
     */
    public function getPaymethod()
    {
        return $this->paymethod;
    }

    /**
     * Set status
     *
     * @param \Backend\CustomerAdminBundle\Entity\Status $status
     * @return Pedido
     */
    public function setStatus(\Backend\CustomerAdminBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \Backend\CustomerAdminBundle\Entity\Status 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set customer
     *
     * @param \Backend\CustomerBundle\Entity\Customer $customer
     * @return Pedido
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
     * Set sucursal
     *
     * @param \Backend\CustomerAdminBundle\Entity\Sucursal $sucursal
     * @return Pedido
     */
    public function setSucursal(\Backend\CustomerAdminBundle\Entity\Sucursal $sucursal = null)
    {
        $this->sucursal = $sucursal;

        return $this;
    }

    /**
     * Get sucursal
     *
     * @return \Backend\CustomerAdminBundle\Entity\Sucursal 
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }

    /**
     * Set direccion
     *
     * @param \Backend\CustomerAdminBundle\Entity\Direccion $direccion
     * @return Pedido
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
     * Add detalles
     *
     * @param \Backend\CustomerAdminBundle\Entity\Detalle $detalles
     * @return Pedido
     */
    public function addDetalle(\Backend\CustomerAdminBundle\Entity\Detalle $detalles)
    {
        $this->detalles[] = $detalles;

        return $this;
    }

    /**
     * Remove detalles
     *
     * @param \Backend\CustomerAdminBundle\Entity\Detalle $detalles
     */
    public function removeDetalle(\Backend\CustomerAdminBundle\Entity\Detalle $detalles)
    {
        $this->detalles->removeElement($detalles);
    }

    /**
     * Get detalles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDetalles()
    {
        return $this->detalles;
    }
}
