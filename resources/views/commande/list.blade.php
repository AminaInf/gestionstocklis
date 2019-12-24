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
    @include('layouts.menu')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header" id="hd">Listes des agents</div>

                        <div class="card-body" >
                            <table class="table table-bordered table-striped" id="main">
                                <tr>
                                    <th>Identifiant</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Profil</th>
                                    <th>Telephone</th>
                                    <th>Nomade</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($liste_agents as $agent)
                                    <tr>
                                        <td>{{$agent->id}}</td>
                                        <td>{{$agent->nom}}</td>
                                        <td>{{$agent->prenom}}</td>
                                        <td>{{$agent->profil}}</td>
                                        <td>{{$agent->telephone}}</td>
                                        <td>{{$agent->nomade}}</td>
                                        <td><a href="{{route('getagent',['id'=>$agent->id])}}">Editer</a></td>
                                        <td><a href="{{route('deleteagent',['id'=>$agent->id])}}" onclick="return confirm('Voulez vous suprimer?');">Suprimer</a></td>
                                    </tr>
                                @endforeach
                            </table>
                            {{ $liste_agents->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </main>
</div>
</body>
</html>
