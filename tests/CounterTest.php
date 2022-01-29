<?php 

namespace ProgrammerZamanNow\Test;

use phpDocumentor\Reflection\Types\Self_;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
    private Counter $counter;

    protected function setUp(): void
    {
        $this->counter = new Counter();
        echo "setup counter". PHP_EOL;
    }

    public function Counter()
    {
        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->getCounter());

        $this->counter->increment();
        $this->assertEquals(2, $this->counter->getCounter());

        $this->counter->increment();
        Self::assertEquals(3, $this->counter->getCounter());
    }

    //menandai incomplete test

    public function testIncrement()
    {
        self::markTestSkipped("Skip unit test");
        self::assertEquals(0, $this->counter->getCounter());
        self::markTestIncomplete("TODO do increment");
    }

    /**
     * @test
     */
    public function increment()
    {
        $this->counter->increment();
        $this->assertEquals(1, $this->counter->getCounter());
    }

    //test dependency
    public function testFirst(): Counter 
    {
        $this->counter->increment();
        $this->assertEquals(1, $this->counter->getCounter());

        return $this->counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter $counter)
    {
        $counter->increment();
        $this->assertEquals(2, $counter->getCounter());
    }

   
    public function testCounter()
    {
        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->getCounter());
    }

    /**
     * @requires OSFAMILY Windows
     */
    public function testOnlyWindows()
    {
        self::assertTrue(true, "Only in windows");
    }

    /**
     * @requires PHP >= 8
     * @requires OSFAMILY Darwin
     */
    public function testPHP8()
    {
        self::assertTrue(true, "Only for php 8");
    }
    
}