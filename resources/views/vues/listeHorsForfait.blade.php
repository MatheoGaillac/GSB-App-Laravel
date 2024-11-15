@extends('layouts.master')
@section('content')
    <div class="col-md-12 well well-md">
        <center>
            <h1>Liste des frais hors forfait</h1>
        </center>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
            <tr>
                <th style="width: 50%">Libellé</th>
                <th style="width: 20%">Montant</th>
                <th style="width: 15%">Modifier</th>
                <th style="width: 15%;">Supprimer</th>
            </tr>
            </thead>
            @foreach($mesHorsForfait as $unHorsForfait)
                <tr>
                    <td>{{$unHorsForfait->lib_fraishorsforfait}}</td>
                    <td>{{$unHorsForfait->montant_fraishorsforfait}}</td>
                    <td style="text-align: center;"><a
                            href="{{url('/modifierFraisHorsForfait')}}/{{$unHorsForfait->id_fraishorsforfait}}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                          title="Modification"></span></a></td>
                    <td style="text-align: center">
                        <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top"
                           title="Suppression" onclick="javascript:if (confirm('Suppression confirmée ?'))
                {window.location ='{{url('/supprimerFraisHorsForfait')}}/{{$unHorsForfait->id_fraishorsforfait}}';}"></a>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td style="text-align: right">Montant Total :</td>
                <td style="text-align: left">{{ $totalMontant }}</td>
            </tr>
        </table>
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3 col-sm-6 col-sm-offset-3">
                <a href="{{url ('/addFraisHorsForfait')}}/{{$id_frais}}">
                    <button type="button" class="btn btn-default btn-primary"><span
                            class="glyphicon glyphicon-plus"></span> Ajouter
                    </button>
                </a>
                <button type="submit" class="btn btn-default btn-primary">
                    <span class="glyphicon glyphicon-ok"></span> Valider
                </button>
            </div>
        </div>
        @include('vues.error')
    </div>
@endsection
