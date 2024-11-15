<?php

namespace App\Http\Controllers;

use App\dao\ServiceFrais;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Session;
use Request;
use Illuminate\Support\Facades\Input;
use App\metier\Visiteur;
use Exception;
use App\dao\ServiceVisiteur;

class VisiteurController extends Controller
{
    public function getLogin()
    {
        try {
            $erreur = "";
            return view('vues/formLogin', compact('erreur'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        }
    }

    public function signIn()
    {
        try {
            $login = Request::input("login");
            $pwd = Request::input("pwd");
            $unVisiteur = new ServiceVisiteur();
            $connected = $unVisiteur->login($login, $pwd);

            if ($connected) {
                if (Session::get('type') === 'P') {
                    return view('homePraticien');
                } else {
                    return view('home');
                }
            } else {
                $erreur = " Login ou mot de passe inconnu";
                return view('vues/formLogin', compact('erreur'));
            }
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        }
    }

    public function signOut(){
        $unVisiteur = new ServiceVisiteur();
        $unVisiteur->logout();
        return redirect('/');
    }
}
