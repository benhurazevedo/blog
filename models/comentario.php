<?php 
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="Comentarios")
*/
class Comentario 
{
	/**
	* @ORM\Id 
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue
	*/
	protected $id;
	
    /**
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="postId", referencedColumnName="id")
     */
    protected $post;

	/** @ORM\Column(type="string", length=255) */
	protected $comentario;
	
	
	public function getId()
	{
		return $this->id;
	}
	
    public function getPostId()
	{
		return $this->postId;
	}
    
	public function setPostId($postId)
	{
		$this->postId = $postId;
	}

    public function getPost()
    {
        return $this->post;
    }

	public function getComentario()
	{
		return $this->comentario;
	}
	public function setComentario($comentario)
	{
		$this->comentario = $comentario;
	}
	
	public function setPost(Post $post = null) 
	{
        $this->post = $post;
    }
}