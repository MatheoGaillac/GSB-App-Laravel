<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\dao\ServicePraticien;
use Illuminate\Http\Request;
use App\Exceptions\MonException;
use Exception;

class PraticienController extends Controller
{
    public function getListe()
    {
        try {
            $erreur = "";
            $unServicePraticien = new ServicePraticien();
            $mesPraticiens = $unServicePraticien->getPraticiens();
            $mesSpecialites = $unServicePraticien->getSpecialites();
            return view('vues/listePraticiens', compact('mesPraticiens', 'mesSpecialites', 'erreur'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/listePraticiens', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/listePraticiens', compact('erreur'));
        }
    }

    public function getPraticienSearch(Request $request)
    {
        $erreur = "";
        $unServicePraticien = new ServicePraticien();

        // Récupérer le critère de recherche depuis la requête
        $critere = $request->input('critere');

        // Appel de la méthode searchPraticiens avec le critère
        $praticiens = $unServicePraticien->searchPraticiens($critere);

        // Faire quelque chose avec les praticiens, comme les passer à la vue
        return view('vues/listePraticiens', ['praticiens' => $praticiens, 'erreur' => $erreur])->render();
    }


}
