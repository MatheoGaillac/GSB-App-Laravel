<?php
namespace App\Http\Controllers;

use App\dao\ServiceHorsForfait;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
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
                return view('vues/listeHorsForfait', compact('mesHF', 'erreur', 'id_frais'));
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



    public function addFraisHT($id_frais)
    {
        try {
            $erreur = "";
            $titreVue = "Ajout d'une fiche de Frais ";
            return view('vues/formHorsForfait', compact('titreVue', 'erreur', 'id_frais'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/formHorsForfait', compact('titreVue', 'erreur', 'id_frais'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/formHorsForfait', compact('titreVue', 'erreur', 'id_frais'));
        }
    }


    public function postAjouterHFFrais()
    {
        try {
            $erreur = "";
            $id_frais = Request::input("id_frais");
            $libelle = Request::input("libelle");
            $date = Request::input("date");
            $montant = Request::input("montant");
            $unHFService = new ServiceHorsForfait();
            $unHFService->ajoutHFFrais($id_frais, $libelle, $date, $montant);
            return redirect()->route('getHF', $id_frais);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/formHorsForfait', compact("erreur", 'id_frais'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/formHorsForfait', compact('erreur', 'id_frais'));
        }
    }

    public function modifier($id_fraishorsforfait)
    {
        try {
            $unHorsForfaitService = new ServiceLivres();
            $unHorsForfait = $unHorsForfaitService->getHorsForfait($id_fraishorsforfait);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        if (Session::get('id') > 0) {
            return view('vues/formHorsForfaitModifier', compact('unHorsForfait'));
        } else {
            return redirect('/');
        }
    }

    public function postmodificationhorsforfait($id_fraishorsforfait = null)
    {
        $code = $id_fraishorsforfait;
        $date = Request::input("date_fraishorsforfait");
        $montant = Request::input("montant_fraishorsforfait");
        $lib = Request::input("lib_fraishorsforfait");
        try {
            $unHorsForfaitService = new ServiceLivres();
            $unHorsForfaitService->modificationHorsForfait($id_fraishorsforfait, $date, $montant, $lib);
            return view('home');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

}

?>