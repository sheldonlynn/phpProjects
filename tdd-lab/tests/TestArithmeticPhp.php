<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class TestArithmetic extends TestCase {

    private $a;

    public function setUp()
    {
        $this->a = new Arithmetic();
        echo "setting up...";
    }

    public function tearDown()
    {
        echo "tearing down...";
    }

    public function testAdd()
    {
        echo "test add";

        $sum = $this->a->add(5, 7);

        $this->assertEquals($sum, 12);

        //$this->assertEquals($sum, add(5,7));
    }

    public function testAdd2()
    {

        $sum = $this->a->add(-5, 300);

        $this->assertEquals($sum, 295);

    }

    public function testAddExceptions()
    {


        try{
            $sum = $this->a->add("hello", 6);
            $this->fail();
        }catch(InvalidArgumentException $e){
            $this->assertEquals($e->getMessage(), "hello is not an int!");
        }catch(Exception $e){
            $this->fail();
        }

        try{
            $sum = $this->a->add(5, "whatever");
            $this->fail();
        }catch(InvalidArgumentException $e){
            $this->assertEquals($e->getMessage(), "whatever is not an int!");

        }catch(Exception $e){
            $this->fail();
        }

        try{
            $sum = $this->a->add(5, "whatever", "e", 5.6);
            $this->fail();
        }catch(UnexpectedValueException $e){
            $this->assertEquals($e->getMessage(), "required args: 2; actual args: 4");

        }catch(Exception $e){
            $this->fail();
        }

    }







}
?>