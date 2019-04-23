<?php

namespace Tests\Feature\routes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LaboRoutesTest extends TestCase
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
        
        $response1 = $this->get('labo/home');
        $response1->assertStatus(200); 

        $response2 = $this->post('labo/AddMsg');
        $response2->assertStatus(200);
        
        $response3 = $this->post('labo/GetListMessage'); 
        $response3->assertStatus(200);
         
        $response4 = $this->get('labo/annonces');
         $response4->assertStatus(200);
        
         $response5 = $this->post('labo/annonces');
         $response5->assertStatus(200);

        
        $response6 = $this->get('labo/annonces/offre/1');
        $response6->assertStatus(200);  
        
         $response7 = $this->post('labo/annonces/offre');
         $response7->assertStatus(302);

         $response8 = $this->get('labo/annonces/demande/1');
         $response8->assertStatus(200);
         $response9 = $this->post('labo/annonces/demande');
         $response9->assertStatus(302);

         /* Mes annonces curd */
        // Route::get('/mesannonces', 'HomeController@MesAnnonces_labo')->name('MesAnnonces_labo');
        // Route::post('/mesannonces', 'HomeController@MesAnnonces_labo_search')->name('MesAnnonces_labo_search');
        // Route::get('/mesannonces/ajouter-annonce', 'AnnonceController@ajouter_annonce')->name('ajouter_annonce');
        // Route::post('/mesannonces/ajouter-annonce-from', 'AnnonceController@addannoncefrom')->name('addannonce');
         
         $response10 = $this->get('labo/mesannonces');
         $response10->assertStatus(200); 
 
         $response11 = $this->post('labo/mesannonces');
         $response11->assertStatus(200);
         
         $response12 = $this->get('labo/mesannonces/ajouter-annonce'); 
         $response12->assertStatus(200);
          
         $response13 = $this->post('labo/mesannonces/ajouter-annonce-from');
         $response13->assertStatus(500);
         
          
          $response14 = $this->get('labo/mesannonces/demande/1');
          $response14->assertStatus(200);
         
          $response15 = $this->get('labo/mesannonces/offre/1');
          $response15->assertStatus(200);  
         
          $response16 = $this->post('labo/mesannonces/demande');
          $response16->assertStatus(500);
 
          $response17 = $this->post('labo/mesannonces/offre');
          $response17->assertStatus(500);
          $response18 = $this->post('labo/mesannonces/supprimer');
          $response18->assertStatus(500);


         $response19 = $this->get('labo/magasin');
         $response19->assertStatus(200);
        
         $response20 = $this->post('labo/magasin');
         $response20->assertStatus(200);  
        
         $response21 = $this->post('labo/magasin/ajouter-produit');
         $response21->assertStatus(302);

         $response22 = $this->post('labo/magasin/ajouter-produit');
         $response22->assertStatus(302);

         $response23 = $this->post('labo/magasin/supprimer-produit');
         $response23->assertStatus(500);

         $response24 = $this->post('labo/magasin/form-modifier-produit');
         $response24->assertStatus(500);

         $response25 = $this->post('labo/magasin/modiferproduit');
         $response25->assertStatus(302);

         $response26 = $this->get('labo/discussion');
         $response26->assertStatus(200);

         $response27 = $this->get('labo/aide');
         $response27->assertStatus(200);

         $response28 = $this->get('labo/parametre');
         $response28->assertStatus(200);

         $response29 = $this->post('labo/parametre/Modifier_profile_general');
         $response29->assertStatus(302);

         $response30 = $this->post('labo/parametre/changepassoword');
         $response30->assertStatus(302);

         $response29 = $this->post('labo/parametre/changeavatar');
         $response29->assertStatus(302);

        
}
}