<?php

namespace Deimos\Session;

use Deimos\Session\Extensions\Flash;

class Session extends Extension
{

    use Flash;

    /**
     * @param string $name
     * @param null   $default
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function get($name, $default = null)
    {
        return $this->helper()->arr()->get($this->asArray(), $name, $default);
    }

    /**
     * @param string $name
     *
     * @return mixed
     *
     * @throws \Deimos\Helper\Exceptions\ExceptionEmpty
     * @throws \InvalidArgumentException
     */
    public function getRequired($name)
    {
        return $this->helper()->arr()->getRequired($this->asArray(), $name);
    }

    /**
     * Alias getRequired($name)
     *
     * @param string $name
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function __get($name)
    {
        return $this->get($name);
    }

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @throws \InvalidArgumentException
     */
    public function __set($name, $value)
    {
        $this->set($name, $value);
    }

    /**
     * @param string $name
     *
     * @return bool
     *
     * @throws \InvalidArgumentException
     */
    public function __isset($name)
    {
        return $this->helper()->arr()->keyExists($this->asArray(), $name);
    }

    /**
     * @return array
     */
    public function asArray()
    {
        return $this->object() ?: [];
    }

}