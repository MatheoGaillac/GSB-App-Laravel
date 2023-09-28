@extends('layouts.master')
@section('content')
    <div class="col-md-12 well well-md">
        <center>
            <h1>Liste des frais</h1>
        </center>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
            <tr>
                <th style="width: 60%">Période</th>
                <th style="width: 20%">Modifier</th>
                <th style="width: 20%;">Supprimer</th>
            </tr>
            </thead>
            @foreach($mesFrais as $unFrais)
                <tr>
                    <td>{{$unFrais->anneemois}}</td>
                    <td style="text-align: center;"><a href="{{url('/modifierFrais')}}/{{$unFrais->id_frais}}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                          title="Modification"></span></a></td>
                    <td style="text-align: center">
                        <a href="" class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top"
                           title="Suppression" onclick="javascript:if (confirm('Suppression confirmée ?'))
                {window.location ='{{url('/supprimerFrais')}}/{{$unFrais->id_frais}}';}"></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
