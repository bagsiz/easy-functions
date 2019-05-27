<?php

namespace Bagsiz\EasyFunctions\Test;

use Bagsiz\EasyFunctions\Test\Models\User;
use Bagsiz\EasyFunctions\EasyFunction;

class EasyFunctionsTest extends TestCase
{
    protected $easyfunction;

    public function setUp(): void
    {
        $this->easyfunction = new EasyFunction();
        parent::setUp();
    }

    /** @test */
    public function it_can_respond_with_random_integer()
    {
        $user = new User();
        $response = $this->easyfunction->checkFieldForRandom($user, 'id', 'int', 8);
        $this->assertIsInt($response);
    }
}

