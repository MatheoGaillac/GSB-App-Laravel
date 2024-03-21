<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Session;

class ServicePraticien
{
    public function getPraticiens()
    {
        try {
            $lesPraticiens = DB::table('praticien')
                ->get();
            return $lesPraticiens;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getSpecialites()
    {
        try {
            $lesSpecialites = DB::table('specialite')
                ->get();
            return $lesSpecialites;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function searchPraticiens($critere = null)
    {
        try {
            $query = DB::table('praticien');

            if ($critere !== null) {
                $query->where(function ($query) use ($critere) {
                    $query->where('nom_praticien', 'LIKE', "%$critere%")
                        ->union(function ($query) use ($critere) {
                            $query->select('praticien.*')
                                ->from('praticien')
                                ->join('posseder', 'praticien.id_praticien', '=', 'posseder.id_praticien')
                                ->join('specialite', 'posseder.id_specialite', '=', 'specialite.id_specialite')
                                ->where('specialite.lib_specialite', 'LIKE', "%$critere%");
                        });
                });
        } else {
                // Si aucun critère n'est spécifié, ne rien filtrer
                return [];
            }

            $lesPraticiens = $query->get();
            return $lesPraticiens;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }


}
