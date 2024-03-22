@extends('layouts.master')
@section('content')

    <div id="recherche-container">
        <input type="text" name="recherche" id="recherche" placeholder="Rechercher...">
    </div>

    <div class="col-md-12 well well-md">
        <center>
            <h1>Liste des Praticiens</h1>
        </center>
        <table id="tablePraticiens" class="table table-bordered table-striped table-responsive">
            <thead>
            <tr>
                <th style="width: 10%">ID</th>
                <th style="width: 10%">Nom</th>
                <th style="width: 10%">Prénom</th>
                <th style="width: 20%;">Adresse</th>
                <th style="width: 20%;">Ville</th>
                <th style="width: 20%;">Spécialité</th>
                <th style="width: 20%;">Autres Spécialités</th>
            </tr>
            </thead>
            @foreach($praticiens as $praticien)
                @if($praticien->specialites->count() > 0)
                    @foreach($praticien->specialites as $specialite)
                        <tr>
                            <td>{{ $praticien->id_praticien }}</td>
                            <td>{{ $praticien->nom_praticien }}</td>
                            <td>{{ $praticien->prenom_praticien }}</td>
                            <td>{{ $praticien->adresse_praticien }}</td>
                            <td>{{ $praticien->ville_praticien }}</td>
                            <td>{{ $specialite->lib_specialite }}</td>
                            <td style="text-align: center;">
                                <a href="{{url('/')}}/{{$praticien->id_praticien}}/{{$specialite->id_specialite}}">
                                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modification"></span>
                                </a>
                                <a href="{{url('/')}}/{{$praticien->id_praticien}}/{{$specialite->id_specialite}}">
                                    <span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Suppression"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>{{ $praticien->id_praticien }}</td>
                        <td>{{ $praticien->nom_praticien }}</td>
                        <td>{{ $praticien->prenom_praticien }}</td>
                        <td>{{ $praticien->adresse_praticien }}</td>
                        <td>{{ $praticien->ville_praticien }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endif
            @endforeach
        </table>
        @include('vues.error')
    </div>

    <script>
        var inputRecherche = document.getElementById("recherche");
        var tablePraticiens = document.getElementById("tablePraticiens");

        inputRecherche.addEventListener("input", function () {
            var valeurRecherche = inputRecherche.value;
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function () {
                if (this.readyState === XMLHttpRequest.DONE) {
                    if (this.status === 200 && this.responseText !== null) {
                        var responseHtml = this.responseText;
                        // Créer un div temporaire pour stocker le contenu de la réponse
                        var tempDiv = document.createElement('div');
                        tempDiv.innerHTML = responseHtml;
                        // Extraire la table de ce div temporaire
                        var newTablePraticiens = tempDiv.querySelector("#tablePraticiens");
                        // Vérifier si la nouvelle table existe
                        if (newTablePraticiens) {
                            // Remplacer le contenu de la table existante avec la nouvelle table
                            tablePraticiens.innerHTML = newTablePraticiens.innerHTML;
                        } else {
                            console.error("La réponse AJAX ne contient pas de table valide.");
                        }
                    } else {
                        console.error('Une erreur s\'est produite lors de la requête AJAX.');
                    }
                }
            };

            // Vérifier si valeurRecherche est vide avant d'envoyer la requête
            var url = "/getListePraticiens";
            if (valeurRecherche.trim() !== "") {
                url += "?critere=" + encodeURIComponent(valeurRecherche);
            }

            xhr.open("GET", url, true);
            xhr.send();
        });
    </script>
