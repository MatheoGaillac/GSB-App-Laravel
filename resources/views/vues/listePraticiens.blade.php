@extends('layouts.master')
@section('content')

    {{--    <label for="praticien_id">Sélectionner un praticien</label>--}}
    {{--    <select name="praticien_id" id="praticien_id">--}}
    {{--        <option value="" selected>Choisir un praticien</option>--}}
    {{--        @foreach($mesPraticiens as $praticien)--}}
    {{--            <option--}}
    {{--                value="{{ $praticien->id_praticien }}">{{ $praticien->nom_praticien }} {{ $praticien->prenom_praticien }}</option>--}}
    {{--        @endforeach--}}
    {{--    </select>--}}
    {{--    <BR>--}}
    {{--    <label for="specialite_id">Sélectionner une spécialité</label>--}}
    {{--    <select name="specialite_id" id="specialite_id">--}}
    {{--        <option value="" selected>Choisir une spécialité</option>--}}
    {{--        @foreach($mesSpecialites as $spe)--}}
    {{--            <option value="{{ $spe->id_specialite }}">{{ $spe->lib_specialite }}</option>--}}
    {{--        @endforeach--}}
    {{--    </select>--}}


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
                <th style="width: 10%">Nom</th>
                <th style="width: 10%">Prénom</th>
                <th style="width: 20%;">Adresse</th>
                <th style="width: 20%;">Ville</th>
                <th style="width: 20%;">Code Postal</th>
                <th style="width: 20%;">Coefficient</th>
            </tr>
            </thead>
            @foreach($praticiens as $praticien)
                <tr>
                    <td>{{ $praticien->nom_praticien }}</td>
                    <td>{{ $praticien->prenom_praticien }}</td>
                    <td>{{ $praticien->adresse_praticien }}</td>
                    <td>{{ $praticien->ville_praticien }}</td>
                    <td>{{ $praticien->cp_praticien }}</td>
                    <td>{{ $praticien->coef_notoriete }}</td>
                </tr>
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
                        console.log("Réponse AJAX:", responseHtml); // Ajout du console.log de la réponse
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
