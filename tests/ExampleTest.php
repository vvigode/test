<?php

use App\Order;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;


    public function test_orders_are_displayed_on_the_dashboard()
    {
        factory(Order::class)->create(['name' => 'Order 1']);
        factory(Order::class)->create(['name' => 'Order 2']);
        factory(Order::class)->create(['name' => 'Order 3']);

        $this->visit('/')
             ->see('Order 1')
             ->see('Order 2')
             ->see('Order 3');
    }


    public function test_orders_can_be_created()
    {
        $this->visit('/')->dontSee('Order 1');

        $this->visit('/')
            ->type('Order 1', 'name')
            ->press('Add Order')
            ->see('Order 1');
    }


    public function test_long_orders_cant_be_created()
    {
        $this->visit('/')
            ->type(str_random(300), 'name')
            ->press('Add Order')
            ->see('Whoops!');
    }
}
