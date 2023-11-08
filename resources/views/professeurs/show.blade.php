@extends('main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-lg-12">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('images/' . $professeur->photo) }}" width="200"
                                        class="img-thumbnail" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $professeur->utilisateur->nom }}
                                    {{ $professeur->utilisateur->prenom }}</h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email:</b>
                                        <a>{{ $professeur->utilisateur->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Genre:</b>
                                        <a>{{ $professeur->genre }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Date de Naissance:</b>
                                        <a>{{ $professeur->date_naissance }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Telephone:</b>
                                        <a>{{ $professeur->telephone }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>WhatsApp:</b>
                                        <a>{{ $professeur->whatsapp }}</a>
                                    </li>
                                </ul>

                                <a href="{{ route('professeurs.index') }}"
                                    class="btn btn-primary btn-block"><b>Retour</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
