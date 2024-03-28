<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Session;

class ServicePraticien
{

    public function getListSpecialite()
    {
        try {
            $mesSpecialites = DB::table('specialite')
                ->Select()
                ->get();
            return $mesSpecialites;
        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getListPraticien()
    {
        try {
            $mesPraticiens = DB::table('praticien')
                ->Select()
                ->get();
            return $mesPraticiens;
        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getSpecialitesByPraticien($idPraticien)
    {
        try {
            $specialites = DB::table('posseder')
                ->join('specialite', 'posseder.id_specialite', '=', 'specialite.id_specialite')
                ->where('posseder.id_praticien', '=', $idPraticien)
                ->get();

            return $specialites;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getSpecialitesByID($idPraticien, $idSpecialite)
    {
        try {
            $specialites = DB::table('posseder')
                ->join('specialite', 'posseder.id_specialite', '=', 'specialite.id_specialite')
                ->where('posseder.id_praticien', '=', $idPraticien)
                ->where('posseder.id_specialite', '=', $idSpecialite)
                ->get();

            return $specialites;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getPossederId($id_praticien, $id_specialite)
    {
        try {
            $unPosseder = DB::table('posseder')
                ->select()
                ->where('id_praticien', '=', $id_praticien)
                ->where('id_specialite', '=', $id_specialite)
                ->first();
            return $unPosseder;
        } catch (\Illuminate\Databse\QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function searchPraticiens($critere = null)
    {
        try {
            $query = DB::table('praticien');

            if ($critere !== null) {
                $query->select('praticien.*', 'posseder.id_specialite')
                    ->leftJoin('posseder', 'praticien.id_praticien', '=', 'posseder.id_praticien')
                    ->leftJoin('specialite', 'posseder.id_specialite', '=', 'specialite.id_specialite')
                    ->where(function ($query) use ($critere) {
                        $query->where('praticien.nom_praticien', 'LIKE', "$critere%");
                    })
                    ->orWhere(function ($query) use ($critere) {
                        $query->where('specialite.lib_specialite', 'LIKE', "%$critere%");
                    });
            }

            $lesPraticiens = $query->get();
            return $lesPraticiens;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function addSpecialite($id_praticien, $id_specialite, $diplome, $coef_prescription)
    {
        try {
            DB::table('posseder')->insert(
                ['id_praticien' => $id_praticien, 'id_specialite' => $id_specialite, 'diplome' => $diplome, 'coef_prescription' => $coef_prescription]
            );
        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function editSpecialite($id_praticien, $old_id_specialite, $id_specialite, $diplome, $coef_prescription){
        try{
            DB::table('posseder')
                ->where('id_praticien', $id_praticien)
                ->where('id_specialite', $old_id_specialite)
                ->update(['id_specialite' => $id_specialite, 'diplome' => $diplome, 'coef_prescription' => $coef_prescription]);
        } catch (\Illuminate\Database\QueryException $e){
            throw new MonException($e->getMessage(), 5);
        }
    }
}
