@extends('layouts.master')
@if ($erreur != '')
    <div class="alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    </div>
@endif 
@stop
