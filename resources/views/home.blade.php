@extends('layouts.master')
@section('content')
    <div>
        <h1 class="bvn">Bienvenue sur l'application Web de l'entreprise GSB</h1>
    </div>
    @if (Session::get('id') == 0)
        <p>Bienvenue sur l'application de gestion des frais médicaux de Galaxy Swiss Bourdin (GSB) ! Cette plateforme
            vous permet de suivre et de gérer les frais engagés par les praticiens lors de leurs visites médicales. Pour
            accéder à toutes les fonctionnalités, veuillez vous connecter avec vos identifiants.</p>
    @elseif (Session::get('type') === 'A')
        <p>Bienvenue sur l'application de gestion des frais médicaux de GSB ! En tant qu'administrateur, vous avez un
            accès étendu aux fonctionnalités. Outre la gestion des frais médicaux, vous pouvez également accéder à la
            liste des praticiens, les trier par nom ou spécialité, et effectuer des modifications telles que l'ajout, la
            suppression ou la modification des spécialités des praticiens. Cette plateforme vise à faciliter la gestion
            des activités médicales et à renforcer l'efficacité de nos équipes sur le terrain.</p>
    @else
        <p>Bienvenue sur l'application de gestion des frais médicaux de GSB ! En tant que visiteur médical, vous pouvez
            utiliser cette plateforme pour lister, ajouter, modifier et supprimer vos frais de déplacement et de
            représentation. De plus, vous avez accès aux frais hors forfait associés à chaque dépense. N'hésitez pas à
            mettre à jour régulièrement vos informations pour un suivi efficace de votre activité.</p>
    @endif
@stop
