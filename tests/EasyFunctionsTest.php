<?php

namespace Bagsiz\EasyFunctions\Test;

use Bagsiz\EasyFunctions\Test\Models\User;
use Bagsiz\EasyFunctions\EasyFunction;
use Illuminate\Database\Eloquent\SoftDeletes;

class EasyFunctionsTest extends TestCase
{
    protected $easyfunction;
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->easyfunction = new EasyFunction();
        $this->user = new class() extends User {
            use SoftDeletes;
        };
    }

    /** @test */
    public function it_can_respond_with_random_integer()
    {
        $response = $this->easyfunction->checkFieldForRandom($this->user, 'id', 'int', 8);
        $this->assertIsInt($response);
    }

    /** @test */
    public function it_can_respond_with_random_string()
    {
        $response = $this->easyfunction->checkFieldForRandom($this->user, 'id', 'str', 8);
        $this->assertIsString($response);
    }
}

