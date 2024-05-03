@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Modifier une spécialité</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => ['postmodifierSpecialite', $unPosseder->id_praticien, $unPosseder->id_specialite], 'method' => 'post', 'class' => 'form-horizontal']) !!}

                        <div class="form-group">
                            <label for="id_praticien" class="col-md-4 control-label">Praticien :</label>
                            <div class="col-md-6">
                                <input id="id_praticien" type="text" class="form-control" value="{{ $praticien->nom_praticien ?? '' }} {{ $praticien->prenom_praticien ?? '' }}" required readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_specialite" class="col-md-4 control-label">Spécialité :</label>
                            <div class="col-md-6">
                                <select id="id_specialite" name="id_specialite" class="form-control" required>
                                    <option value="">Sélectionnez une spécialité</option>
                                    @foreach($mesSpecialites as $specialite)
                                        <option value="{{ $specialite->id_specialite }}" {{ isset($unPosseder) && $specialite->id_specialite == $unPosseder->id_specialite ? 'selected' : '' }}>
                                            {{ $specialite->lib_specialite }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="diplome" class="col-md-4 control-label">Diplôme :</label>
                            <div class="col-md-6">
                                <input id="diplome" type="text" class="form-control" name="diplome" value="{{ $unPosseder->diplome ?? '' }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="coef_prescription" class="col-md-4 control-label">Coefficient de prescription :</label>
                            <div class="col-md-6">
                                <input id="coef_prescription" type="text" class="form-control" name="coef_prescription" value="{{ $unPosseder->coef_prescription ?? '' }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-ok"></span> Valider
                                </button>
                                <button type="button" class="btn btn-primary" onclick="if(confirm('Vous êtes sûr ?')) window.location='{{ url('/') }}';">
                                    <span class="glyphicon glyphicon-remove"></span> Annuler
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('vues.error')
@endsection
