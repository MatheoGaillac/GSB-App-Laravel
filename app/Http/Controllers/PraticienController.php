<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\dao\ServicePraticien;
use Illuminate\Http\Request;
use App\Exceptions\MonException;
use Exception;

class PraticienController extends Controller
{
    public function getPraticienSearch(Request $request)
    {
        $erreur = "";
        $unServicePraticien = new ServicePraticien();

        $critere = $request->input('critere');

        $praticiens = $unServicePraticien->searchPraticiens($critere);

        foreach ($praticiens as $praticien) {
            if (property_exists($praticien, 'id_specialite')) {
                $praticien->specialites = $unServicePraticien->getSpecialitesByID($praticien->id_praticien, $praticien->id_specialite);
            } else {
                $praticien->specialites = $unServicePraticien->getSpecialites($praticien->id_praticien);
            }
        }

        // Faire quelque chose avec les praticiens, comme les passer à la vue
        return view('vues/listePraticiens', ['praticiens' => $praticiens, 'erreur' => $erreur])->render();
    }


}
