<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthentificationTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_Liste_des_praticiens_pas_affiché_si_pas_connecté(): void
    {
        $response = $this->get('/getListePraticiens');

        $response->assertStatus(302);
    }
}
