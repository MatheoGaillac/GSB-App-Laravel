@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="titre">
            <h1>Ajout d'une spécialité</h1>
        </div>
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['url' => '/addASpecialite', 'class' => 'form-horizontal']) !!}
            <div class="well">
                <div class="form-group">
                    <label for="id_praticien" class="col-md-3 control-label">Praticien :</label>
                    <div class="col-md-6">
                        <select id="id_praticien" name="id_praticien" class="form-control" required>
                            <option value="">Sélectionnez un praticien</option>
                            @foreach($mesPraticiens as $praticien)
                                <option value="{{ $praticien->id_praticien }}">{{ $praticien->nom_praticien }} {{ $praticien->prenom_praticien }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_specialite" class="col-md-3 control-label">Spécialité :</label>
                    <div class="col-md-6">
                        <select id="id_specialite" name="id_specialite" class="form-control" required>
                            <option value="">Sélectionnez une spécialité</option>
                            @foreach($mesSpecialites as $specialite)
                                <option value="{{ $specialite->id_specialite }}">{{ $specialite->lib_specialite }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="diplome" class="col-md-3 control-label">Diplôme :</label>
                    <div class="col-md-6">
                        <input id="diplome" type="text" class="form-control" name="diplome" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="coef_prescription" class="col-md-3 control-label">Coefficient de prescription :</label>
                    <div class="col-md-6">
                        <input id="coef_prescription" type="text" class="form-control" name="coef_prescription" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-ok"></span> Valider
                        </button>
                        <button type="button" class="btn btn-primary" onclick="window.location = '{{ url('/') }}';">
                            <span class="glyphicon glyphicon-remove"></span> Annuler
                        </button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-6 col-md-offset-3">
            @include('vues.error')
        </div>
    </div>
@endsection
