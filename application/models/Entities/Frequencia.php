<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Frequencia
 *
 * @ORM\Table(name="frequencia", indexes={@ORM\Index(name="IDX_26ED9274341A200D", columns={"codigo_aluno"}), @ORM\Index(name="IDX_26ED927478D148AB", columns={"codigo_turma"})})
 * @ORM\Entity
 */
class Frequencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="codigo", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="frequencia_codigo_seq", allocationSize=1, initialValue=1)
     */
    private $codigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="aula", type="bigint", nullable=true)
     */
    private $aula;

    /**
     * @var string
     *
     * @ORM\Column(name="presenca", type="string", length=1, nullable=true)
     */
    private $presenca;

    /**
     * @var \Entities\Pessoa
     *
     * @ORM\ManyToOne(targetEntity="Entities\Pessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_aluno", referencedColumnName="codigo")
     * })
     */
    private $codigoAluno;

    /**
     * @var \Entities\Turma
     *
     * @ORM\ManyToOne(targetEntity="Entities\Turma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codigo_turma", referencedColumnName="codigo")
     * })
     */
    private $codigoTurma;


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
     * Set aula
     *
     * @param integer $aula
     * @return Frequencia
     */
    public function setAula($aula)
    {
        $this->aula = $aula;
    
        return $this;
    }

    /**
     * Get aula
     *
     * @return integer 
     */
    public function getAula()
    {
        return $this->aula;
    }

    /**
     * Set presenca
     *
     * @param string $presenca
     * @return Frequencia
     */
    public function setPresenca($presenca)
    {
        $this->presenca = $presenca;
    
        return $this;
    }

    /**
     * Get presenca
     *
     * @return string 
     */
    public function getPresenca()
    {
        return $this->presenca;
    }

    /**
     * Set codigoAluno
     *
     * @param \Entities\Pessoa $codigoAluno
     * @return Frequencia
     */
    public function setCodigoAluno(\Entities\Pessoa $codigoAluno = null)
    {
        $this->codigoAluno = $codigoAluno;
    
        return $this;
    }

    /**
     * Get codigoAluno
     *
     * @return \Entities\Pessoa 
     */
    public function getCodigoAluno()
    {
        return $this->codigoAluno;
    }

    /**
     * Set codigoTurma
     *
     * @param \Entities\Turma $codigoTurma
     * @return Frequencia
     */
    public function setCodigoTurma(\Entities\Turma $codigoTurma = null)
    {
        $this->codigoTurma = $codigoTurma;
    
        return $this;
    }

    /**
     * Get codigoTurma
     *
     * @return \Entities\Turma 
     */
    public function getCodigoTurma()
    {
        return $this->codigoTurma;
    }
}
