<?php

namespace DeimosTest;

use Deimos\Builder\Builder;
use Deimos\Session\Session;

class TestSetUp extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Session
     */
    protected $session;

    public function setUp()
    {
        $builder       = new Builder();
        $this->session = new Session($builder);
    }

}