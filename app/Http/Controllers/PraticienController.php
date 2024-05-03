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
                $praticien->specialites = $unServicePraticien->getSpecialitesByPraticien($praticien->id_praticien);
            }
        }
        return view('vues/listePraticiens', ['praticiens' => $praticiens, 'erreur' => $erreur])->render();
    }

    public function addSpecialite()
    {
        try {
            $unPraticienService = new ServicePraticien();
            $mesSpecialites = $unPraticienService->getListSpecialite();
            $mesPraticiens = $unPraticienService->getListPraticien();
            $erreur = "";
            return view('vues/formPraticien', compact('mesSpecialites', 'mesPraticiens', 'erreur'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/formPraticien', compact('mesSpecialites','mesPraticiens', 'erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/formPraticien', compact('mesSpecialites','mesPraticiens', 'erreur'));
        }
    }

    public function postAddSpecialite(Request $request)
    {
        try {
            $erreur = "";
            $id_praticien = $request->input('id_praticien');
            $id_specialite = $request->input('id_specialite');
            $diplome = $request->input('diplome');
            $coef_prescription = $request->input('coef_prescription');
            $uneSpecialiteService = new ServicePraticien();
            $uneSpecialiteService->addSpecialite($id_praticien, $id_specialite, $diplome, $coef_prescription);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/formPraticien', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/formPraticien', compact('erreur'));
        }
        return redirect('/');
    }

    public function editSpecialite($id_praticien, $id_specialite)
    {
        try {
            $erreur = "";
            $unPraticienService = new ServicePraticien();
            $unPosseder = $unPraticienService->getPossederId($id_praticien, $id_specialite);
            $mesSpecialites = $unPraticienService->getListSpecialite();
            $praticien = $unPraticienService->getPraticienById($id_praticien);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/formPraticienEdit', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/fo   rmPraticienEdit', compact('erreur'));
        }
        return view('vues/formPraticienEdit', compact('unPosseder', 'mesSpecialites', 'praticien', 'erreur'));
    }

    public function postEditSpecialite(Request $request, $id_praticien = null, $old_id_specialite = null)
    {
        $id_specialite = $request->input("id_specialite");
        $diplome = $request->input("diplome");
        $coef_prescription = $request->input("coef_prescription");
        try {
            $erreur = "";
            $unPraticienService = new ServicePraticien();
            $unPraticienService->editSpecialite($id_praticien, $old_id_specialite, $id_specialite, $diplome, $coef_prescription);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return redirect('/');
    }

    public function deleteSpecialite($id_praticien, $id_specialite)
    {
        try {
            $unPraticienService = new ServicePraticien();
            $unPraticienService->deleteSpecialite($id_praticien, $id_specialite);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } finally {
            return back();
        }
    }
}
