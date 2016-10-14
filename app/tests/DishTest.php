<?php
namespace App\Test;

use App\Models\Dish;
use App\Test\TestCase;

class DishTest extends TestCase
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testValidateNameRequired()
    {
        $dish = new Dish;
        $this->assertTrue($dish->validate()->fails());
    }
}
