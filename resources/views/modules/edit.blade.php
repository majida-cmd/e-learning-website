@extends('main')
@section('content')
    <form action="{{ route('modules.update', $module->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Modifier le module</h1>
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
                                @foreach ($errors->all() as $error)
                                    <div class="card-header">
                                        <h5 class="card-title">{{ $error }}</h5>
                                    </div>
                                @endforeach

                                <div class="form-group">
                                    <label for="inputName">Nom</label>
                                    <input type="text" id="nom" name="nom" value="{{ $module->nom }}" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Description</label>
                                    <textarea type="text" cols="4" rows="2" id="description" name="description" value="" required
                                        class="form-control">{{ $module->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Tarif</label>
                                    @if ($module->tarifs->isNotEmpty() && $module->tarifs->first()->montant == 0)
                                        <input type="text" id="tarif" name="montant" value="Gratuit" required
                                            class="form-control">
                                    @elseif ($module->tarifs->isNotEmpty())
                                        <input type="text" id="tarif" name="montant" value="{{ $module->tarifs->first()->montant }}" required
                                            class="form-control">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputName">photo</label>
                                    <input type="file" id="photo" name="photo" class="form-control"
                                        accept="module/*" value="{{ basename($module->photo) }}">
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
