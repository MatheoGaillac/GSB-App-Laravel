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
    public function getListFraisHorsForfait($id_frais)
    {
        try {
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $unServiceHorsForfait = new ServiceHorsForfait();
            $id_visiteur = Session::get('id');
            $mesHorsForfait = $unServiceHorsForfait->getListFraisHorsForfait($id_frais);
            $totalMontant = 0;

            foreach ($mesHorsForfait as $unHorsForfait) {
                $totalMontant += $unHorsForfait->montant_fraishorsforfait;
            }

            if ($id_visiteur != 0) {
                $mesHorsForfait = $unServiceHorsForfait->getListFraisHorsForfait($id_frais);
                return view('vues/listeHorsForfait', compact('mesHorsForfait', 'erreur', 'id_frais', 'totalMontant'));
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


    public function addFraisHorsForfait($id_frais)
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


    public function postAjouterFraisHorsForfait()
    {
        try {
            $erreur = "";
            $id_frais = Request::input("id_frais");
            $libelle = Request::input("libelle");
            $date = Request::input("date");
            $montant = Request::input("montant");
            $unFraisHorsForfaitService = new ServiceHorsForfait();
            $unFraisHorsForfaitService->ajoutFraisHorsForfait($id_frais, $libelle, $date, $montant);
            return redirect()->route('getFraisHorsForfait', $id_frais);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/formHorsForfait', compact("erreur", 'id_frais'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/formHorsForfait', compact('erreur', 'id_frais'));
        }
    }

    public function modifierFraisHorsForfait($id_fraishorsforfait)
    {
        try {
            $erreur = "";
            $unHorsForfaitService = new ServiceHorsForfait();
            $unHorsForfait = $unHorsForfaitService->getHorsForfait($id_fraishorsforfait);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        if (Session::get('id') > 0) {
            return view('vues/formHorsForfaitModifier', compact('unHorsForfait', 'erreur'));
        } else {
            return redirect('/');
        }
    }

    public function postmodificationhorsforfait($id_fraishorsforfait = null)
    {
        try {
            $id_frais = Request::input('id_frais');
            $date = Request::input("date_fraishorsforfait");
            $montant = Request::input("montant_fraishorsforfait");
            $lib = Request::input("lib_fraishorsforfait");
            $unHorsForfaitService = new ServiceHorsForfait();
            $unHorsForfait = $unHorsForfaitService->getHorsForfait($id_fraishorsforfait);
            $unHorsForfaitService->modificationHorsForfait($id_fraishorsforfait, $date, $montant, $lib);
            return redirect()->route('getFraisHorsForfait', $id_frais);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/formHorsForfaitModifier', compact('unHorsForfait', 'erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/formHorsForfaitModifier', compact('unHorsForfait', 'erreur'));
        }
    }

    public function supprimeFraisHorsForfait($id_fraishorsforfait)
    {
        try {
            $unServiceFraisHorsForfait = new ServiceHorsForfait();
            $unServiceFraisHorsForfait->deleteFraisHorsForfait($id_fraishorsforfait);
        } catch (MonException $e) {
            Session::put('erreur', $e->getMessage());
        } catch (Exception $e) {
            Session::put('erreur', $e->getMessage());
        } finally {
            return redirect('getListeFrais');
        }
    }

}

?>
