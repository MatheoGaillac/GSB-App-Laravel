@extends('layouts.master')
@section('content')

    <label for="praticien_id">Sélectionner un praticien</label>
    <select name="praticien_id">
        <option value="" selected>Choisir un praticien</option>
        @foreach($mesPraticiens as $praticien)
            <option value="{{ $praticien->id_praticien }}">{{ $praticien->nom_praticien }} {{ $praticien->prenom_praticien }}</option>
        @endforeach
    </select>
<BR>
    <label for="praticien_id">Sélectionner une spécialité</label>
    <select name="praticien_id">
        <option value="" selected>Choisir une spécialité</option>
        @foreach($mesSpecialites as $spe)
            <option value="{{ $spe->id_specialite }}">{{ $spe->lib_specialite }}</option>
        @endforeach
    </select>

    <div class="col-md-12 well well-md">
        <center>
            <h1>Liste des Praticiens</h1>
        </center>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
            <tr>
                <th style="width: 10%">Nom</th>
                <th style="width: 10%">Prénom</th>
                <th style="width: 20%;">Adresse</th>
                <th style="width: 20%;">Ville</th>
                <th style="width: 20%;">Code Postal</th>
                <th style="width: 20%;">Coefficient</th>
            </tr>
            </thead>
        </table>
        @include('vues.error')
    </div>
