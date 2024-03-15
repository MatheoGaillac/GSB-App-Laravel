<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthentificationTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_modif_pas_affichee_si_pas_connecte(): void
    {
        $response = $this->get('/modifFrais/1');

        $response->assertStatus(401);
    }
}
