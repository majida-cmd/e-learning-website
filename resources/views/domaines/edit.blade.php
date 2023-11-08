@extends('main')
@section('content')
<form action="{{ route('domaines.update', $domaine->id) }}" method="POST" enctype="multipart/form-data">
@method('PUT')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Modifier l'étudiant</h1>
            <br>
            <a class="btn btn-primary" href="{{ route('domaines.index') }}"> Retour</a>
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
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                @foreach($errors->all() as $error)
                <div class="card-header">
                  <h5 class="card-title">{{ $error }}</h5>
                </div>
              @endforeach

              <div class="form-group">
                <label for="inputName">nom</label>
                <input type="text" id="nom" name="nom"  value="{{ $domaine->nom }}" required class="form-control">
              </div>

              <div class="form-group">
                <label for="inputName">photo</label>
                <input type="file" id="photo" name="photo" class="form-control"
                accept="image/*" value="{{ basename($domaine->photo) }}">
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
