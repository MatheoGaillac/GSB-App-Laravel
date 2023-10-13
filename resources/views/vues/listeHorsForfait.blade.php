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
            @foreach($mesHF as $unHF)
                <tr>
                    <td>{{$unHF->lib_fraishorsforfait}}</td>
                    <td>{{$unHF->montant_fraishorsforfait}}</td>
                    <td style="text-align: center;"><a href="{{url('/modifierFraisHF')}}/{{$unHF->id_fraishorsforfait}}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                          title="Modification"></span></a></td>
                    <td style="text-align: center">
                        <a href="#" class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top"
                           title="Suppression" onclick="javascript:if (confirm('Suppression confirmée ?'))
                {window.location ='{{url('/supprimerFrais')}}/{{$unHF->id_fraishorsforfait}}';}"></a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3" >
                <a href="{{url ('/addHF')}}/{{$id_frais}}">
                    <button type="button" class="btn btn-default btn-primary"><span
                            class="glyphicon glyphicon-plus"></span> Ajouter
                    </button>
                </a>
            </div>
        </div>
        @include('vues.error')
    </div>
@endsection
