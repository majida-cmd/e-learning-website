@extends('main')
@section('content')
    <form action="{{ route('admins.update', $utilisateur->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Modifier l'étudiant</h1>
                            <br>
                            <a class="btn btn-primary" href="{{ route('admins.index') }}"> Retour</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h1>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                            </div>
                            <div class="card-body">
                                @foreach ($errors->all() as $error)
                                    <div class="card-header">
                                        <h5 class="card-title">{{ $error }}</h5>
                                    </div>
                                @endforeach

                                <div class="form-group">
                                    <label for="inputName">nom</label>
                                    <input type="text" id="nom" name="nom"
                                        value="{{ $admin->utilisateur->nom }}" required class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="inputName">prenom</label>
                                    <input type="text" id="prenom" name="prenom"
                                        value="{{ $admin->utilisateur->prenom }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="inputName">email</label>
                                    <input type="email" id="email" name="email"
                                        value="{{ $admin->utilisateur->email }}" class="form-control">
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @csrf
    </form>
    </div>
@endsection
