@extends('main')
@section('content')
    <form action="{{ route('chapters.store') }}" method="POST" enctype="multipart/form-data">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Ajouter un Chapitre</h1>
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
                                    <label for="domaine">Domaine</label>
                                    <select name="domaine" id="domaine" class="form-control">
                                        <option value="">---selectionnez un domaine---</option>
                                        @foreach ($domaines as $domaine)
                                            <option value="{{ $domaine->id }}">
                                                {{ ucfirst($domaine->nom) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="type_contenu">Module</label>
                                    <select name="module" id="module" class="form-control">
                                        <option value="">---selectionnez un module---</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Chapitre</label>
                                    <input type="text" name="nom" id="nom" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <input type="text" name="description" id="description" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Photo</label>
                                    <input type="file" id="photo" name="photo" class="form-control">
                                </div>
                                <label class="form-label" for="basic-default-password12">Video</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="video"
                                        aria-describedby="basic-addon11" />
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
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>

    <script>
        $(document).ready(function() {
            $('#domaine').on('change', function() {
                let id = $(this).val();
                $('#module').empty();
                //$('#module').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                    type: 'GET',
                    url: 'getModule/' + id,
                    success: function(response) {
                        var response = JSON.parse(response);
                        console.log(response);
                        $('#module').empty();
                        //$('#module').append(`<option value="0" disabled selected>Select module*</option>`);
                        response.forEach(element => {
                            $('#module').append(
                                `<option value="${element['id']}">${element['nom']}</option>`
                            );
                        });
                    }
                });
            });
        });
    </script>
    </div>
@endsection
