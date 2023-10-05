<?php
namespace App\Http\Controllers;

use App\dao\ServiceHorsForfait;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Request;
use Illuminate\Support\Facades\Session;
Use App\Models\User;
use Exception;
use App\Exceptions\MonException;

class HorsForfaitController extends Controller
{
    public function getFraisHF($id_frais)
    {
        try {
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $unServiceHF = new ServiceHorsForfait();
            $id_visiteur = Session::get('id');
            if ($id_visiteur != 0) {
                $mesHF = $unServiceHF->getListFraisHF($id_frais);
                return view('vues/listeHorsForfait', compact('mesHF', 'erreur'));
            } else {
                return redirect('/');
            }
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/listeHorsForfait', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/listeHorsForfait', compact('erreur'));
        }
    }

    public function postAjouterHFFrais()
    {
        try {
            $id_frais = Request::input("id_frais");
            $libelle = Request::input("libelle");
            $date = Request::input("date");
            $montant = Request::input("montant");

            $unHFService = new ServiceHorsForfait();
            $unHFService->ajoutHFFrais($id_frais, $libelle, $date, $montant);
            return view("home");
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact("erreur"));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }

    }

}

?>
