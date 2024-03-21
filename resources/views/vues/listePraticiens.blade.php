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

