<?php

namespace Tests\Feature\routes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminRoutesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRoutes()
    {
        $user=factory("App\User")->create();
        $this->actingAs($user);
        
        $response1 = $this->get('admin/');
        $response1->assertStatus(200);
        
        $response2 = $this->get('admin/addNewUser');
        $response2->assertStatus(200);
      
        $response3 = $this->get('admin/comptelabo');
        $response3->assertStatus(200);
        
        $response4 = $this->get('admin/compteadmin');
        $response4->assertStatus(200);

        $response5 = $this->post('admin/compteadmin/delete');
        $response5->assertStatus(500);
      
        $response6 = $this->post('admin/compteadmin/block');
        $response6->assertStatus(500);
        
        $response7 = $this->post('admin/compteadmin/deblockadmin');
        $response7->assertStatus(500);

        
        $response5 = $this->post('admin/compteadmin/deleteLabo');
        $response5->assertStatus(500);
      
        $response6 = $this->post('admin/compteLabo/blocklabo');
        $response6->assertStatus(500);
        
        $response7 = $this->post('admin/compteLabo/deblocklabo');
        $response7->assertStatus(500);
    }
}
