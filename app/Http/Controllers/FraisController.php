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
            $monErreur = Session::get('monErreur');
            Session::forget('monErreur');
            $unServiceFrais = new ServiceFrais();
            $id_visiteur = Session::get('id');
            $mesFrais = $unServiceFrais->getFrais($id_visiteur);
            return view ('Vues/listeFrais', compact('mesFrais', 'monErreur'));
        } catch (MonException $e){
            $monErreur = $e->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        } catch (Exception $e){
            $monErreur = $e->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        }
    }
}
?>
