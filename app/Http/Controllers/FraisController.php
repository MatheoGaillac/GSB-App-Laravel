<?php
namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Session;
use App\metier\Frais;
use Exception;
use App\Exceptions\MonException;
use App\dao\ServiceFrais;

class FraisController extends Controller{

    public function getFraisVisiteur(){
        try{
            $erreur = Session::get('monErreur');
            Session::forget('monErreur');
            $unServiceFrais = new ServiceFrais();
            $id_visiteur = Session::get('id');
            if($id_visiteur != 0) {
                $mesFrais = $unServiceFrais->getFrais($id_visiteur);
                return view('vues/listeFrais', compact('mesFrais', 'erreur'));
            } else{
                return redirect('/');
            }
        } catch (MonException $e){
            $erreur = $e->getMessage();
            return view('vues/listeFrais', compact('erreur'));
        } catch (Exception $e){
            $erreur = $e->getMessage();
            return view('vues/listeFrais', compact('erreur'));
        }
    }
}
?>
