@extends('layouts.master')
@section('content')

    <label for="praticien_id">Sélectionner un praticien</label>
    <select name="praticien_id">
        <option value="" selected>Choisir un praticien</option>
        @foreach($mesPraticiens as $praticien)
            <option value="{{ $praticien->id_praticien }}">{{ $praticien->nom_praticien }} {{ $praticien->prenom_praticien }}</option>
        @endforeach
    </select>
