<?php

namespace Deimos\Session\Extensions;

trait Flash
{

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function flash($name, $value = null)
    {
        $name .= 'DeimosFlash';

        if ($value === null)
        {
            $value = $this->get($name);
            $this->remove($name);
        }
        else
        {
            $this->set($name, $value);
        }

        return $value;
    }

}