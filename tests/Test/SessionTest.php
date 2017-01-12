<?php

namespace Test;

use DeimosTest\TestSetUp;

class SessionTest extends TestSetUp
{

    /**
     * @runInSeparateProcess
     */
    public function testTest()
    {

        $mt_rand = mt_rand();
        $this->session->set('test', $mt_rand);

        $this->session->set('required', $rand);

        $this->session->getRequired('required');

        $this->assertTrue(isset($this->session->required));

        $rand = mt_rand();

        $this->assertNull($this->session->flash('test'));

        $this->session->flash('test', $rand);

        $this->assertEquals(
            $rand,
            $this->session->flash('test')
        );

        $this->assertNull($this->session->flash('test'));

        $this->session->testSet = 'magic';

        $this->assertEquals(
            'magic',
            $this->session->get('testSet')
        );

        $this->assertEquals(
            $mt_rand,
            $this->session->test
        );

    }

    /**
     * @runInSeparateProcess
     * @expectedException \Deimos\Helper\Exceptions\ExceptionEmpty
     */
    public function testGetRequired()
    {
        $this->session->getRequired('required');
    }

}
