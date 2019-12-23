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
        <body id="body" >
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light  shadow-sm" id="nv">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}" >
                        <img src="../images/lis2.png" id="lis">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Agent<span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('addagent') }}">Ajout</a>
                                        <a class="dropdown-item" href="{{ route('getAllagent') }}">Liste des agents</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Articles<span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('addarticle') }}">Ajout</a>
                                        <a class="dropdown-item" href="{{ route('getAllarticle') }}">Liste des produits</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Commande<span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('addcommande') }}">Ajout</a>
                                        <a class="dropdown-item" href="{{ route('getAllcommande') }}">Liste des commandes</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Vente<span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('addvente') }}">Ajout</a>
                                        <a class="dropdown-item" href="{{ route('getAllvente') }}">Produits vendus</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" id="hd">Formulaire d'enregistrement des agents</div>

                                <div class="card-body" id="main">
                                    @if(isset($confirmation))
                                        @if($confirmation==1)
                                            <div class="alert alert-success">Agent ajouté</div>
                                        @else
                                            <div class="alert alert-danger">Agent non ajouté</div>
                                        @endif
                                    @endif
                                    <form method="POST" action="/agent/update">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label">Identifiant</label>
                                            <input class="form-control" readonly="true" type="text" name="id" id="id" value="{{$agent->id}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Nom</label>
                                            <input class="form-control" type="text" name="nom" id="nom" value="{{$agent->nom}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Prenom</label>
                                            <input class="form-control" type="text" name="prenom" id="prenom" value="{{$agent->prenom}}">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Profil</label>
                                            <select class="form-control"  name="profil" id="profil" value="{{$agent->profil}}">
                                                <option value="Superviseur">Superviseur</option>
                                                <option value="Commercial">Commercial</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Telephone</label>
                                            <input class="form-control" type="text" name="telephone" id="telephone" value="{{$agent->telephone}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Nomade</label>
                                            <input class="form-control" type="text" name="nomade" id="nomade" value="{{$agent->nomade}}">
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-success" type="submit" name="envoyer" id="envoyer" value="Envoyer">
                                            <a class="btn btn-danger" href="{{route('getAllagent')}}">Annuler</a>
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
