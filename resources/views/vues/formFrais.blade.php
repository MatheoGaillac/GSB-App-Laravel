@extends('layouts.master')
@section('content')
    {!! Form::open(['url' => '/validerFrais']) !!}
    <div class="col-md-12  col-sm-12 well well-md">
        <center><h1></h1></center>
        <div class="form-horizontal">
            <input type="hidden" name="id_frais" value="{{$unFrais->id_frais ?? 0}}"/>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Période : </label>
                <div class="col-md-2 col-sm-2">
                    <input type="month" name="anneemois" value="{{$unFrais->anneemois ?? ""}}" class="form-control"
                           placeholder="AAAAMM" required
                           autofocus>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Nb justificatifs : </label>
                <div class="col-md-2  col-sm-2">
                    <input type="number" name="nbjustificatifs" value="{{$unFrais->nbjustificatifs ?? ""}}"
                           class="form-control"
                           placeholder="Nombre de justificatifs" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Montant validé : </label>
                <div class="col-md-3 col-sm-3">
                    <label class="control-label">{{$unFrais->montantvalide ?? 0}}</label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span> Valider
                    </button>
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="javascript: window.location = '{{url('/getListeFrais')}}';">
                        <span class="glyphicon glyphicon-remove"></span> Annuler
                    </button>
                </div>
            </div>
            @if(isset($unFrais->id_frais))
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <a href="{{url ('/getFraisHorsForfait')}}/{{$unFrais->id_frais}}">
                            <button type="button" class="btn btn-default btn-primary"><span
                                    class="glyphicon glyphicon-list"></span> Frais hors forfait
                            </button>
                        </a>
                    </div>
                </div>
            @endif
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                @include('vues.error')
            </div>
        </div>
    </div>
