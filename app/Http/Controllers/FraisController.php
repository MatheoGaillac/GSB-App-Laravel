<?php
namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Session;
use App\metier\Frais;
Use App\Models\User;
use Exception;
use App\Exceptions\MonException;
use App\dao\ServiceFrais;

class FraisController extends Controller
{

    public function getFraisVisiteur()
    {
        try {
            $erreur = Session::get('monErreur');
            Session::forget('monErreur');
            $unServiceFrais = new ServiceFrais();
            $id_visiteur = Session::get('id');
            if ($id_visiteur != 0) {
                $mesFrais = $unServiceFrais->getFrais($id_visiteur);
                return view('vues/listeFrais', compact('mesFrais', 'erreur'));
            } else {
                return redirect('/');
            }
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/listeFrais', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/listeFrais', compact('erreur'));
        }
    }

    public function updateFrais($id_frais)
    {
        try {
            $monErreur = "";
            $unServiceFrais = new ServiceFrais();
            $unFrais = $unServiceFrais->getById($id_frais);
            $titreVue = "Modification d'une fiche de frais";
            return view('vues/formFrais', compact('unFrais', 'titreVue', 'monErreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/formFrais', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/formFrais', compact('monErreur'));
        }
    }

    public function validateFrais()
    {
        try {
            $id_frais = Request::input('id_frais');
            $anneemois = Request::input('anneemois');
            $nbjustificatifs = Request::input('nbjustificatifs');
            $unServiceFrais = new ServiceFrais();
            if ($id_frais > 0) {
                $unServiceFrais->updateFrais($id_frais, $anneemois, $nbjustificatifs);
            } else {
                $montant = Request::input('montant');
                $id_visiteur = Session::get('id');
                $unServiceFrais->insertFrais($anneemois, $nbjustificatifs, $id_visiteur, $montant);
            }
            return redirect('/getListeFrais');
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/formFrais', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/formFrais', compact('monErreur'));
        }
    }

    public function validateHorsForfait()
    {
        try {
            $id_frais = Request::input('id_frais');
            $anneemois = Request::input('anneemois');
            $nbjustificatifs = Request::input('nbjustificatifs');
            $unServiceFrais = new ServiceFrais();
            if ($id_frais > 0) {
                $unServiceFrais->updateFrais($id_frais, $anneemois, $nbjustificatifs);
            } else {
                $montant = Request::input('montant');
                $id_visiteur = Session::get('id');
                $unServiceFrais->insertFrais($anneemois, $nbjustificatifs, $id_visiteur, $montant);
            }
            return redirect('/getListeFrais');
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/formFrais', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/formFrais', compact('monErreur'));
        }
    }

    public function addFrais()
    {
        try {
            $erreur = "";
            $titreVue = "Ajout d'une fiche de Frais";
            return view('vues/formFrais', compact('titreVue', 'erreur'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/formFrais', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/formFrais', compact('erreur'));
        }
    }

    public function supprimeFrais($id_frais){
        $unServiceFrais = new ServiceFrais();
        try {
            $unServiceFrais->deleteFrais($id_frais);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            Session::put('monErreur', $e->getMessage());
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            Session::put('monErreur', $e->getMessage());
        } finally {
            return redirect('/getListeFrais');
        }
    }
}

?>
