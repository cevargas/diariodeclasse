<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alunoturma
 *
 * @ORM\Table(name="alunoturma", indexes={@ORM\Index(name="IDX_4C438EF0341A200D", columns={"codigo_aluno"}), @ORM\Index(name="IDX_4C438EF078D148AB", columns={"codigo_turma"})})
 * @ORM\Entity
 */
class Alunoturma
{
    /**
     * @var integer
     *
     * @ORM\Column(name="codigo", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="alunoturma_codigo_seq", allocationSize=1, initialValue=1)
     */
    private $codigo;

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
     * Set codigoAluno
     *
     * @param \Entities\Pessoa $codigoAluno
     * @return Alunoturma
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
     * @return Alunoturma
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
