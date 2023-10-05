<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Session;

class ServiceHorsForfait
{
    public function getListFraisHF($id_frais)
    {
        try {
            $lesFrais = DB::table('fraishorsforfait')
                ->Select()
                ->where('fraishorsforfait.id_frais', '=', $id_frais)
                ->get();
            return $lesFrais;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function ajoutHFFrais($id_frais, $libelle, $date, $montant){
        try{
            DB::table('fraishorsforfait')->insert(
                ['id_frais' => $id_frais, 'lib_fraishorsforfait' => $libelle, 'date_fraishorsforfait' => $date,
                    'montant_fraishorsforfait' => $montant]);
        } catch (\Illuminate\Database\QueryException $e){
            throw new MonException($e->getMessage(), 5);
        }
    }

}
