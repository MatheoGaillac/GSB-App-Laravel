@extends('layouts.master')
@section('content')
    <div>
        <br><br>
        <div class="container">
            <div class="titre">
                <h1>Ajout d'une spécialité</h1>
            </div>
            {!! Form::open(['url' => '/addASpecialite']) !!}
            <div class="col-md-12  well well-md">
                <div class="form-group">
                    <label class="col-md-3 control-label">Praticien : </label>
                    <div class="col-md-3">
                        <select name="id_praticien" required>
                            <option value="">Sélectionnez un praticien</option>
                            @foreach($mesPraticiens as $praticien)
                                <option value="{{ $praticien->id_praticien }}">{{ $praticien->nom_praticien }} {{ $praticien->prenom_praticien }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label class="col-md-3 control-label">Spécialité : </label>
                    <div class="col-md-3">
                        <select name="id_specialite" required>
                            <option value="">Sélectionnez une spécialité</option>
                            @foreach($mesSpecialites as $specialite)
                                <option value="{{ $specialite->id_specialite }}">{{ $specialite->lib_specialite }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label class="col-md-3 control-label">Diplôme : </label>
                    <div class="col-md-3">
                        <input type="text" name="diplome" class="form-control" required autofocus>
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label class="col-md-3 control-label">Coefficient de prescription : </label>
                    <div class="col-md-3">
                        <input type="text" name="coef_prescription" class="form-control" required autofocus>
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset">
                        <button type="submit" class="btn btn-default btn-primary"><span
                                class="glyphicon glyphicon-ok"></span> Valider
                        </button>
                        <button type="button" class="btn btn-primary btn-default"
                                onclick="{ window.location = '{{url('/')}}';}">
                            <span class="glyphicon glyphicon-remove"></span> Annuler
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                @include('vues.error')
            </div>
        </div>
    </div>
