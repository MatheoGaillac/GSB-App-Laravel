@extends('layouts.master')
@section('content')
    <div>
        <br><br>
        <center><h1>Modification des frais Hors Forfait</h1></center>
        <div class="well">
            {!! Form::open(array('route' => array ('postmodifierFraisHorsForfait' , $unHorsForfait->id_fraishorsforfait),'method'=>'post')) !!}
            <div class="col-md-12 col-sm-12 well well-md">
                <div class="form-horizontal">
                    <input type="hidden" name="id_frais" value="{{$unHorsForfait->id_frais ?? 0}}">
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Date : </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="text" name="date_fraishorsforfait"
                                   value="{{$unHorsForfait->date_fraishorsforfait ?? ''}}" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Montant : </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="text" name="montant_fraishorsforfait"
                                   value="{{$unHorsForfait->montant_fraishorsforfait ?? ''}}" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Libellé : </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="text" name="lib_fraishorsforfait"
                                   value="{{$unHorsForfait->lib_fraishorsforfait ?? ''}}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <button type="submit" class="btn btn-default btn-primary">
                                <span class="glyphicon glyphicon-ok"> </span> Valider
                            </button>
                            &nbsp;
                            <button type="button" class="btn btn-default btn-primary"
                                    onclick="javascript:if(confirm('vous êtes sûr ?'))
                                        window.location='{{url('/')}}';">
                                <span class="glyphicon glyphicon-remove"> </span> Annuler
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @include('vues.error')
        </div>
    </div>
