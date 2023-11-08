@extends('main')
@section('content')
    <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Ajouter un administrateur</h1>
                            <br>
                            <a class="btn btn-primary" href="{{ route('admins.index') }}"> Retour</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
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
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="inputName">nom</label>
                                    <input type="text" id="nom" name="nom" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">prenom</label>
                                    <input type="text" id="prenom" name="prenom" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">email</label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">password</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="isadmin" name="isadmin" class="form-control" hidden>
                                </div>
                            </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
            @csrf
    </form>
    </div>
@endsection
