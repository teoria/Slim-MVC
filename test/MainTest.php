<?php
/**
 * Created by PhpStorm.
 * User: teoria
 * Date: 3/11/14
 * Time: 8:52 PM
 */

class MainTest extends PHPUnit_Framework_TestCase {

    public function setUp(){
        $this->user = new UsuarioVO();
    }
    public function testtudo() {

        $stack = array();
        $this->assertEquals(0, count($stack));
        $this->assertEquals(1,1);
        $this->assertEquals(3,3);

    }

    public function testtudo2() {

        $stack = array();
        $this->assertEquals(0, count($stack));
        $this->assertEquals(1,1);

    }
    public function testOne()
    {
        $this->assertTrue(TRUE);
        $this->assertEquals(4,4);
        $this->assertTrue(true);
    }
}
 