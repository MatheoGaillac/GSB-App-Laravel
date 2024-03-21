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
}
