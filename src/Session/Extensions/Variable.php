<?php

namespace Deimos\Session\Extensions;

trait Variable
{

    /**
     * @var array
     */
    private $object;

    /**
     * @var bool
     */
    private $init;

    /**
     * @return bool
     */
    private function init()
    {
        if (!$this->init)
        {
            if ($_SESSION === null)
            {
                global $_SESSION;
            }

            $this->init   = session_start();
            $this->object = &$_SESSION;
        }

        return !$this->init;
    }

    /**
     * @return array
     */
    protected function &object()
    {
        return $this->object;
    }

}