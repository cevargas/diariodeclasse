<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disciplina
 *
 * @ORM\Table(name="disciplina")
 * @ORM\Entity
 */
class Disciplina
{
    /**
     * @var integer
     *
     * @ORM\Column(name="codigo", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="disciplina_codigo_seq", allocationSize=1, initialValue=1)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;


    /**
     * Get codigo
     *
     * @return integer 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Disciplina
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }
}
