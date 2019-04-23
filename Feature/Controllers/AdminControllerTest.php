<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;
    
    
    /**
     * A basic feature test example.
     *@test
     * @return void
     */
    public function can_create_a_admin_or_labo()
    {   //$this->withoutMiddleware();
        $user=factory("App\User")->create();
        //$response = $this->get(route('addNewUser'));
        
        $this->assertDatabaseHas('users',[
            'email'=>"me@gmail.com",
            'name'=>"me"
        ]);
    }

    
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function can_block_admin_or_labo()
    {
        $user=factory("App\User")->create(['block'=>false]);
        $data = ['block'=>true ];     
        User::whereid($user->id)->update($data);       
        $this->assertDatabaseHas('users', $data);
    }
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function can_deblock_admin_or_labo()
    {
        $user=factory("App\User")->create(['block'=>true]);
        $data = ['block'=>false ];     
        User::whereid($user->id)->update($data);       
        $this->assertDatabaseHas('users', $data);
    }
    
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function can_delete_a_admin_or_labo()
    {
        $user=factory("App\User")->create();
        User::find($user->id)->delete();       
        $this->assertDatabaseMissing('users', ['id'=>$user->id]);
    }







    

    
}
