<?php

namespace Tests\Feature\Http\Controllers;

use App\Annonce;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnnonceControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *@test
     * @return void
     */
    public function can_create_a_annonce()
    {   
      $user=factory("App\User")->create();
       // $produit=factory("App\Produit",2)->create(['user_id'=>$user->id]);
       $annonce=factory("App\Annonce")->create(['user_id'=>$user->id]);
        
        $this->assertDatabaseHas('annonces',[
            
            'typeannonce'=>'Offre',
            'natureannonce'=>'Changement',
            'designation'=>'annonce1',
            'refproduit'=>1,
            'qte'=>200.0,
            'refproduitEchange'=>2,
            'qteEchange'=>200.0
        

        ]);
    }



    /**
     * A basic feature test example.
     * @test
     * @return void
     */
/* 
    public function can_update_a_annonce()
    {
        $user=factory("App\User")->create();        
        $annonce=factory("App\Annonce")->create(['user_id'=>$user->id]);
        $data = [           
            'typeannonce'=>'Offre',
            'natureannonce'=>'Changement',
            'designation'=>'annonce1 update',
            'refproduit'=>1,
            'qte'=>300.0,
            'refproduitEchange'=>2,
            'qteEchange'=>300.0      
        ];                
        Produit::whereid($annonce->id)->update($data);          
        $this->assertDatabaseHas('annonces', $data);
    }
 */


    
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function can_delete_a_annonce()
    {
        $user=factory("App\User")->create();
        //$produit=factory("App\Produit")->create(['user_id'=>$user->id]);
        $annonce=factory("App\Annonce")->create(['user_id'=>$user->id]);
        Annonce::find($annonce->id)->delete();
         
           
        $this->assertDatabaseMissing('annonces', ['id'=>$annonce->id]);
    }


}