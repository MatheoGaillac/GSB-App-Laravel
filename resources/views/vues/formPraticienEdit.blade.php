@extends('layouts.master')
@section('content')
    <div>
        <br><br>
        <br><br>
        <div class="well">
            {!! Form::open(array('route' => array ('postmodifierSpecialite' , $unPosseder->id_praticien, $unPosseder->id_specialite),'method'=>'post')) !!}
            <div class="col-md-12 col-sm-12 well well-md">
                <center><h1>Modifier une spécialité</h1></center>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Praticien : </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="text" name="id_praticien" value="{{$unPosseder->id_praticien ?? ''}}"
                                   class="form-control"
                                   required readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Spécialité : </label>
                        <select name="id_specialite" required>
                            <option value="">Sélectionnez une spécialité</option>
                            @foreach($mesSpecialites as $specialite)
                                <option value="{{ $specialite->id_specialite }}"
                                        @if(isset($unPosseder) && $specialite->id_specialite == $unPosseder->id_specialite)
                                            selected
                                    @endif>
                                    {{ $specialite->lib_specialite }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Diplôme : </label>
                        <div class="col-md-3">
                            <input type="text" name="diplome" class="form-control"
                                   value="{{$unPosseder->diplome ?? ''}}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Coefficient de prescription : </label>
                        <div class="col-md-3">
                            <input type="text" name="coef_prescription" class="form-control"
                                   value="{{$unPosseder->coef_prescription ?? ''}}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <button type="submit" class="btn btn-default btn-primary">
                                <span class="glyphicon glyphicon-ok"></span> Valider
                            </button>
                            <button type="button" class="btn btn-default btn-primary"
                                    onclick="javascript:if(confirm('Vous êtes sûr ?'))window.location='{{url('/')}}';">
                                <span class="glyphicon glyphicon-remove"></span> Annuler
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    @include('vues.error')
