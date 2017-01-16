<?php

namespace Deimos\Session;

use Deimos\Builder\Builder;
use Deimos\Helper\Traits\Helper;
use Deimos\Session\Extensions\Variable;

abstract class Extension
{

    use Helper;
    use Variable;

    /**
     * Session constructor.
     *
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;

        $this->init();
    }

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @throws \InvalidArgumentException
     */
    public function set($name, $value)
    {
        $this->helper()->arr()->set($this->object, $name, $value);
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function remove($name)
    {
        if (isset($this->{$name}))
        {
            unset($this->object[$name]);

            return true;
        }

        return false;
    }

    /**
     * remove all keys
     */
    final public function removeAll()
    {
        foreach ($this->object() as $name => &$value)
        {
            $this->remove($name);
        }
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    abstract public function __get($name);

    /**
     * @param string $name
     *
     * @return bool
     */
    abstract public function __isset($name);

    /**
     * @param string $name
     * @param mixed  $value
     */
    abstract public function __set($name, $value);

}