<?php

namespace Tests\Feature\Http\Controllers;

use App\Produit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProduitControllerTest extends TestCase
{

   
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *@test
     * @return void
     */
    public function can_create_a_produit()
    {   //$this->withoutMiddleware();
        $user=factory("App\User")->create();
        $produit=factory("App\Produit")->create(['user_id'=>$user->id]);
        //$response = $this->get(route('addNewUser'));
        
        $this->assertDatabaseHas('produits',[
            
            'user_id'=>$user->id,
            'reference'=>'ref1',
            'designation'=>'prod1',
            'formule'=>'prod1',
            'qte'=>'100',
            'categorie'=>'gaz',
            'unite'=>'H2O'
        ]);
    }



    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function can_update_a_produit()
    {
        $user=factory("App\User")->create();
        $produit=factory("App\Produit")->create(['user_id'=>$user->id]);

        $data = [
            
            'reference'=>'ref11',
            'designation'=>'prod11',
            'formule'=>'H20',
            'qte'=>'500',
            'categorie'=>'eau',
            'unite'=>'mol'
        ];
        
         //$this->post("/labo/magasin/modiferproduit", $data);
         Produit::whereid($produit->id)->update($data);
           
        $this->assertDatabaseHas('produits', $data);
    }



    
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function can_delete_a_produit()
    {
        $user=factory("App\User")->create();
        $produit=factory("App\Produit")->create(['user_id'=>$user->id]);

         Produit::find($produit->id)->delete();
          //$this->assertSee
           
        $this->assertDatabaseMissing('produits', ['id'=>$produit->id]);
    }


}
