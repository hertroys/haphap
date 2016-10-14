<?php

use App\Models\Dish;

class DishTest extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testValidateNameRequired()
    {
        $dish = new Dish;
        $this->assertTrue($dish->validate()->fails());

        #$dish->name = 'SomeUniqueName';
        #$this->assertTrue($dish->validate()->passes());
    }

}
