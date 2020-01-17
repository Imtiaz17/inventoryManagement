<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class applicationTest extends TestCase
{ 
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_supplier_route_wihtout_login()
    {
        $response = $this->get('/supplier')->assertRedirect('/login');
    }

    public function test_company_route_wihtout_login()
    {
        $response = $this->get('/company')->assertRedirect('/login');
    }

    public function test_company_login()
    {
        $this->actingAs(factory(User::class)->create([
            'role'=>'company'
        ]));
        $response = $this->get('/company')->assertOk();
    }

    public function test_supplier_login()
    {
        $this->actingAs(factory(User::class)->create([
            'role'=>'supplier'
        ]));
        $response = $this->get('/supplier')->assertOk();
    }


    public function test_all_penidng_product_by_company()
    {
        $this->actingAs(factory(User::class)->create([
            'role'=>'company'
        ]));
        $response = $this->get('/pendingproduct')->assertOk();
    }

    public function test_order_product_by_company()
    {
        $this->withoutExceptionHandling();

       $this->actingAs(factory(User::class)->create([
           'role'=>'company'
       ]));
       $res=$this->post('/product', [
        'name' =>'apple',
        'order_date' =>Carbon::now()
    ]);
       $this->assertCount(1,Product::all()); 
    }

    public function test_product_supply_by_supplier_to_company()
    {
        $this->actingAs(factory(User::class)->create([
            'role'=>'supplier'
        ]));
        $this->post('/product',[
            'name'=>'apple',
            'status'=>'1',
        ]); 
        $product= Product::first();

        $res=$this->patch('/supplyproduct/'. $product->id,[
                   'status' =>0,
                   'supply_date'=>Carbon::now()->format('YYY-MM-DD')
               ]);

        $this->assertEquals('0',Product::first()->status);
        $this->assertEquals('2020-01-17',Product::first()->supply_date);
    }

}
