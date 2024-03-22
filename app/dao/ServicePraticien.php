<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Session;

class ServicePraticien
{

    public function searchPraticiens($critere = null)
    {
        try {
            $query = DB::table('praticien');

            if ($critere !== null) {
                $query->where(function ($query) use ($critere) {
                    $query->where('nom_praticien', 'LIKE', "%$critere%")
                        ->orWhereExists(function ($query) use ($critere) {
                            $query->select(DB::raw(1))
                                ->from('posseder')
                                ->join('specialite', 'posseder.id_specialite', '=', 'specialite.id_specialite')
                                ->whereRaw('praticien.id_praticien = posseder.id_praticien')
                                ->where('specialite.lib_specialite', 'LIKE', "%$critere%");
                        });
                });
            } else {
                return [];
            }

            $lesPraticiens = $query->get();
            return $lesPraticiens;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
