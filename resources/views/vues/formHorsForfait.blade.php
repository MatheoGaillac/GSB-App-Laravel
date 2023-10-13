@extends('layouts.master')
@section('content')
    {!! Form::open(['url' => 'postHF']) !!}
    <div class="col-md-12 col-sm-12 well well-md">
        <center>
            <h1></h1>
        </center>
        <div class="form-horizontal">
            <div class="form-group">
                <input type="hidden" name="id_frais" value="{{$id_frais ?? 0}}">
                <label class="col-md-3 col-sm-3 control-label">Libellé : </label>
                <div class="col-md-2 col-sm-2">
                    {{ Form::text('libelle', null, array_merge(['class' => 'form-control','required' => ''])) }}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Date : </label>
                <div class="col-md-2 col-sm-2">
                    {{ Form::date('date', null, array_merge(['class' => 'form-control','required' => ''])) }}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Montant : </label>
                <div class="col-md-2 col-sm-2">
                    {{ Form::text('montant', null, array_merge(['class' => 'form-control','required' => ''])) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span> Valider
                    </button>
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="javascript:if(confirm('Vous êtes sûr ?')) windom.location = '{{ url('/') }}';">
                        <span class="glyphicon glyphicon-remove"></span> Annuler
                    </button>
                </div>
            </div>
            @include('vues.error')
        </div>
    </div>
