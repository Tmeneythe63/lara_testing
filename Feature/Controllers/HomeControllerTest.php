<?php

namespace Tests\Feature\Http\Controllers;

use App\Chat;
use App\User;
use App\Annonce;
use Tests\TestCase;
use App\Reponseannonce;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HommeControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function AddMsg()
    {
         $chat=factory("App\Chat")->create();

         $this->assertDatabaseHas('chats',[          
            'from'=>1,
            'to'=>2,
            'text'=>'message'
        ]);
        
        
    }
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function store_reponse_offre()
    {
        
         $user=factory("App\User")->create();
         $annonce=factory("App\Annonce")->create(['user_id'=>$user->id]);


         $respannonce=factory("App\Reponseannonce")->create(['annonce_id'=>$annonce->id]);

         $this->assertDatabaseHas('reponseannonces',[          
            'user_id'=>1,
            'annonce_id'=>$annonce->id,
            'etat'=>'enattente',
            'commentaire'=>'commmmm'
        ]);
        
        
    }
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function consulte_offre_confirmer()
    {
        $user=factory("App\User")->create();
         $annonce=factory("App\Annonce")->create(['user_id'=>$user->id]);
         $respannonce=factory("App\Reponseannonce")->create(['annonce_id'=>$annonce->id]);
        $data = [           
            'etat'=>'confirmer'                             
        ];                
        Reponseannonce::whereid($respannonce->id)->update($data);          
        $this->assertDatabaseHas('reponseannonces', $data);

    }
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function consulte_offre_annuler()
    {
        $user=factory("App\User")->create();
         $annonce=factory("App\Annonce")->create(['user_id'=>$user->id]);
         $respannonce=factory("App\Reponseannonce")->create(['annonce_id'=>$annonce->id]);
        $data = [           
            'etat'=>'annuler'                             
        ];                
        Reponseannonce::whereid($respannonce->id)->update($data);          
        $this->assertDatabaseHas('reponseannonces', $data);

    }
}
