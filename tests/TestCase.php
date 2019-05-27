<?php

namespace Bagsiz\EasyFunctions\Test;

use Bagsiz\EasyFunctions\EasyFunctionsServiceProvider;
use Bagsiz\EasyFunctions\EasyFunctionsFacade;
use Bagsiz\EasyFunctions\EasyFunction;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Bagsiz\EasyFunctions\Test\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


/**
 * Class TestCase
 * @package Tests
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */

abstract class TestCase extends OrchestraTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->easyFunction = new EasyFunction();
        $this->setUpDatabase();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            EasyFunctionsServiceProvider::class,
        ];
    }
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'EasyFunction' => EasyFunctionsFacade::class,
        ];
    }

    protected function setUpDatabase()
    {
        $this->createTables('users');
        $this->seedModels(User::class);
    }

    protected function createTables(...$tableNames)
    {
        collect($tableNames)->each(function (string $tableName) {
            Schema::create($tableName, function (Blueprint $table) use ($tableName) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('text')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        });
    }

    protected function seedModels(...$modelClasses)
    {
        collect($modelClasses)->each(function (string $modelClass) {
            foreach (range(1, 0) as $index) {
                $modelClass::create(['name' => "name {$index}"]);
            }
        });
    }

    public function markTestAsPassed()
    {
        $this->assertTrue(true);
    }
}