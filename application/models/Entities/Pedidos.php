<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedidos
 *
 * @ORM\Table(name="pedidos", indexes={@ORM\Index(name="fp_clientes_idx", columns={"cliente_id"}), @ORM\Index(name="fk_pizza_idx", columns={"pizza_id"})})
 * @ORM\Entity
 */
class Pedidos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Entities\Clientes
     *
     * @ORM\ManyToOne(targetEntity="Entities\Clientes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     * })
     */
    private $cliente;

    /**
     * @var \Entities\Pizza
     *
     * @ORM\ManyToOne(targetEntity="Entities\Pizza")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pizza_id", referencedColumnName="id")
     * })
     */
    private $pizza;


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
     * Set cliente
     *
     * @param \Entities\Clientes $cliente
     * @return Pedidos
     */
    public function setCliente(\Entities\Clientes $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Entities\Clientes 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set pizza
     *
     * @param \Entities\Pizza $pizza
     * @return Pedidos
     */
    public function setPizza(\Entities\Pizza $pizza = null)
    {
        $this->pizza = $pizza;

        return $this;
    }

    /**
     * Get pizza
     *
     * @return \Entities\Pizza 
     */
    public function getPizza()
    {
        return $this->pizza;
    }
}
