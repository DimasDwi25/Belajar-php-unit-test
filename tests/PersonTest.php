<?php 

namespace ProgrammerZamanNow\Test;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    //
    private Person $person;

    /**
     * @before
     */
    //menggunakan annotation @before
    // public function createPerson():void
    // {
    //     $this->person = new Person("Dimas");
    // }

    protected function setUp(): void
    {
        $this->person = new Person("Dimas");
    }

    /**
     * @after
     * 
     */

    protected function after():void
    {
        echo "after". PHP_EOL;
    }

    protected function tearDown(): void
    {
        echo "tear down". PHP_EOL;
    }
    public function testSuccess()
    {

        self::assertEquals("Hi Dimas, my name is Dimas", $this->person->sayHello("Dimas"));
    }

    public function testException()
    {
        $this->expectException(\Exception::class);
        $this->person->sayHello(null);
    }

    public function testOutput()
    {
        $this->expectOutputString("Good Bye Dimas". PHP_EOL);
        $this->person->sayGoodBye("Dimas");
    }

    

}

?>