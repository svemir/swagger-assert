<?php
namespace SwaggerAssert;

use SwaggerAssert\Container\Actual;

class ContainerTest extends TestBase
{
    /**
     * @test
     * @return Actual
     */
    public function setWithoutValue()
    {
        $subject = new Container();
        $subject->push('sample');
        $this->assertNull($subject->sample);

        return $subject;
    }

    /**
     * @test
     * @depends setWithoutValue
     * @param Container $subject
     */
    public function keysWithoutValue($subject)
    {
        $this->assertEquals(['sample' => null], $subject->keys());
    }

    /**
     * @test
     * @return Container
     */
    public function setWithValue()
    {
        $subject = new Actual();
        $subject->push('sample', new Actual('nest'));
        $this->assertNotNull($subject->sample);

        return $subject;
    }

    /**
     * @test
     * @depends setWithValue
     */
    public function keysWithValue($subject)
    {
        $this->assertInstanceOf('SwaggerAssert\Container\Actual', $subject->sample);
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function setWithInvalidValue()
    {
        $subject = new Container();
        $subject->push('sample', ['something array']);
    }
}