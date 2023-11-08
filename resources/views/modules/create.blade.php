@extends('main')
@section('content')
    <form action="{{ route('modules.store') }}" method="POST" enctype="multipart/form-data">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Ajouter un module</h1>
                            <br>
                            <a class="btn btn-primary" href="{{ route('modules.index') }}"> Retour</a>
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
                                    <label for="inputName">Domaine</label>
                                    <select name="domaine" id="" class="form-control">
                                        @foreach ($domaines as $domaine)
                                            <option value="{{ $domaine->id }}">{{ $domaine->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Type de contenu</label>
                                    <select name="type_contenu" id="" class="form-control">
                                        @foreach ($typeContenu as $type)
                                            <option value="{{ $type->id }}">{{ $type->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Module</label>
                                    <input type="text" name="nom" id="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <input type="text" name="description" id="description" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Prix</label>
                                    <input type="number" name="montant" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">photo</label>
                                    <input type="file" id="photo" name="photo" class="form-control">
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
