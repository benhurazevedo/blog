<?php 
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="Posts")
*/
class Post 
{
	/**
	* @ORM\Id 
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue
	*/
	protected $id;
	
	/** @ORM\Column(type="string", length=255) */
	protected $titulo;
	
	/** @ORM\Column(type="string", length=1000) */
	protected $texto;
	
    /**
     * One post has many comentarios. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Comentario", mappedBy="post", cascade={"ALL"})
     */
    protected $comentarios;

    public function __construct() {
        $this->comentarios = new ArrayCollection();
    }

	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = $id;
	}

	public function getTitulo()
	{
		return $this->titulo;
	}
	public function setTitulo($titulo)
	{
		$this->titulo = $titulo;
	}
	public function getTexto()
	{
		return $this->texto;
	}
	public function setTexto($texto)
	{
		$this->texto = $texto;
	}
    public function getComentarios()
	{
		return $this->comentarios;
	}

}