<!doctype html>
<html lang="fr">

<head>
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/gsb.css') !!}
    <style>
        /* Styles spécifiques à la navbar */
        .navbar {
            background-color: #0B3948; /* Couleur de fond */
            border-color: #0B3948; /* Couleur de la bordure */
            font-family: 'Spectral', sans-serif; /* Police d'écriture */
        }

        .navbar-default .navbar-brand {
            color: #D9DBF1; /* Couleur du texte pour le brand */
        }

        .navbar-default .navbar-brand:hover,
        .navbar-default .navbar-brand:focus {
            color: #D0CDD7; /* Couleur du texte pour le brand au survol */
        }

        .navbar-default .navbar-nav > li > a {
            color: #D9DBF1; /* Couleur du texte pour les liens */
        }

        .navbar-default .navbar-nav > li > a:hover,
        .navbar-default .navbar-nav > li > a:focus {
            color: #D0CDD7; /* Couleur du texte pour les liens au survol */
        }

        .navbar-default .navbar-toggle .icon-bar {
            background-color: #D9DBF1; /* Couleur des icônes de toggle */
        }

        .navbar-default .navbar-toggle:hover,
        .navbar-default .navbar-toggle:focus {
            background-color: #416165; /* Couleur du toggle au survol */
        }

        .navbar-default .navbar-toggle:focus {
            border-color: #416165; /* Couleur de la bordure du toggle au focus */
        }
    </style>
</head>

<body class="body">
<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#navbar-collapse-target">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">GSB</a>
                @if  (Session::get('id') > 0)
                    <ul class="nav navbar-nav">
                        <li><a href="{{url('/getListeFrais')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Liste des Frais</a></li>
                        <li><a href="{{url('/ajouterFrais')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Ajouter des Frais</a></li>
                        @if (Session::get('type') === 'A')
                            <li><a href="{{url('/getListePraticiens')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Liste des Praticiens</a></li>
                            <li><a href="{{url('/addSpecialite')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Gérer les spécialités</a></li>
                        @endif
                    </ul>
                @endif
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-target">
                <ul class="nav navbar-nav navbar-right">
                    @if (Session::get('id') == 0)
                        <li><a href="{{url('/getLogin')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Se connecter</a></li>
                    @endif
                    @if (Session::get('id') > 0)
                        <li><a href="{{url('/getLogout')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Se déconnecter</a></li>
                    @endif
                </ul>
            </div>
        </div><!--/.container-fluid -->
    </nav>
</div>
<div class="container">
    @yield('content')
</div>
{!! Html::script('assets/js/bootstrap.min.js') !!}
{!! Html::script('assets/js/bootstrap.js') !!}
</body>

</html>
