<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Turma extends \Entities\Turma implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Entities\\Turma' . "\0" . 'codigo', '' . "\0" . 'Entities\\Turma' . "\0" . 'datainicio', '' . "\0" . 'Entities\\Turma' . "\0" . 'datafim', '' . "\0" . 'Entities\\Turma' . "\0" . 'quantidadeaulas', '' . "\0" . 'Entities\\Turma' . "\0" . 'codigoDisciplina', '' . "\0" . 'Entities\\Turma' . "\0" . 'codigoProfessor');
        }

        return array('__isInitialized__', '' . "\0" . 'Entities\\Turma' . "\0" . 'codigo', '' . "\0" . 'Entities\\Turma' . "\0" . 'datainicio', '' . "\0" . 'Entities\\Turma' . "\0" . 'datafim', '' . "\0" . 'Entities\\Turma' . "\0" . 'quantidadeaulas', '' . "\0" . 'Entities\\Turma' . "\0" . 'codigoDisciplina', '' . "\0" . 'Entities\\Turma' . "\0" . 'codigoProfessor');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Turma $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getCodigo()
    {
        if ($this->__isInitialized__ === false) {
            return  parent::getCodigo();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodigo', array());

        return parent::getCodigo();
    }

    /**
     * {@inheritDoc}
     */
    public function setDatainicio($datainicio)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDatainicio', array($datainicio));

        return parent::setDatainicio($datainicio);
    }

    /**
     * {@inheritDoc}
     */
    public function getDatainicio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDatainicio', array());

        return parent::getDatainicio();
    }

    /**
     * {@inheritDoc}
     */
    public function setDatafim($datafim)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDatafim', array($datafim));

        return parent::setDatafim($datafim);
    }

    /**
     * {@inheritDoc}
     */
    public function getDatafim()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDatafim', array());

        return parent::getDatafim();
    }

    /**
     * {@inheritDoc}
     */
    public function setQuantidadeaulas($quantidadeaulas)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setQuantidadeaulas', array($quantidadeaulas));

        return parent::setQuantidadeaulas($quantidadeaulas);
    }

    /**
     * {@inheritDoc}
     */
    public function getQuantidadeaulas()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQuantidadeaulas', array());

        return parent::getQuantidadeaulas();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodigoDisciplina(\Entities\Disciplina $codigoDisciplina = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodigoDisciplina', array($codigoDisciplina));

        return parent::setCodigoDisciplina($codigoDisciplina);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodigoDisciplina()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodigoDisciplina', array());

        return parent::getCodigoDisciplina();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodigoProfessor(\Entities\Pessoa $codigoProfessor = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodigoProfessor', array($codigoProfessor));

        return parent::setCodigoProfessor($codigoProfessor);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodigoProfessor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodigoProfessor', array());

        return parent::getCodigoProfessor();
    }

}
