<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\dao\ServicePraticien;
use Illuminate\Http\Request;
use App\Exceptions\MonException;
use Exception;

class PraticienController extends Controller
{
    public function getListePraticiens()
    {
        try {
            $erreur = "";
            $unServicePraticien = new ServicePraticien();
                $mesPraticiens = $unServicePraticien->getPraticiens();
                return view('vues/listePraticiens', compact('mesPraticiens', 'erreur'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/listePraticiens', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/listePraticiens', compact('erreur'));
        }
    }
}
