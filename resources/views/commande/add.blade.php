<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LIS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body id="bod" >
<div id="app">
    @include('layouts.menu')


    <main class="py-4" id="maine">
        <div class="container" id="ad">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" id="hd">Formulaire d'enregistrement des Commandes</div>

                        <div class="card-body" id="art">
                            @if(isset($confirmation))
                                @if($confirmation==1)
                                    <div class="alert alert-success">Commande enregistrer</div>
                                @else
                                    <div class="alert alert-danger">Commande non enregistrer</div>
                                @endif
                            @endif
                            <form method="POST" action="/commande/persist">
                                @csrf
                                <div class="form-group">

                                    <label class="control-label" for="articles_id">Choisissez un Article</label>
                                    <select class="form-control"  name="articles_id" id="articles_id">
                                        <option value="0">Faites un choix</option>
                                        @foreach($articles as $article)
                                            <option value="{{$article->id}}">{{$article->libelle}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Quantite de la commande</label>
                                    <input class="form-control" type="number" name="quantite" id="quantite">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Date de la commande</label>
                                    <input class="form-control" type="date" name="date" id="libelle">
                                </div>
                                                                <div class="form-group">
                                    <input class="btn btn-success" type="submit" name="envoyer" id="envoyer" value="Envoyer">
                                    <input class="btn btn-danger" type="reset" name="annuler" id="annuler" value="Annuler">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
</div>
</body>
</html>
