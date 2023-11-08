@extends('main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Details etudiant</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('images/' . $etudiant->photo) }}" width="200"
                                        class="img-thumbnail" alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">{{ $etudiant->utilisateur->nom }}
                                    {{ $etudiant->utilisateur->prenom }}</h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email:</b>
                                        <a>{{ $etudiant->utilisateur->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Genre:</b>
                                        <a>{{ $etudiant->genre }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Date de Naissance:</b>
                                        <a>{{ $etudiant->date_naissance }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Telephone:</b>
                                        <a>{{ $etudiant->telephone }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>WhatsApp:</b>
                                        <a>{{ $etudiant->whatsapp }}</a>
                                    </li>
                                </ul>
                                <a href="{{ route('etudiants.index') }}" class="btn btn-primary btn-block"><b>Retour</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
