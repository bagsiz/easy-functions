<?php

namespace Bagsiz\EasyFunctions\Test;

use Bagsiz\EasyFunctions\EasyFunction;

class DecimalToTimeTest extends TestCase
{
    protected $easyfunction;

    public function setUp(): void
    {
        parent::setUp();
        $this->easyfunction = new EasyFunction();
    }

    /** @test */
    public function it_can_respond_with_time_string()
    {
        $response = $this->easyfunction->decimalToTime(23.56);
        $this->assertIsString($response);
    }

    public function it_can_respond_with_error_string()
    {
        $response = $this->easyfunction->decimalToTime(23, 56);
        $this->assertIsString($response);
    }
}
