@extends('main')
@section('content')
    <form action="{{ route('professeurs.update', $professeur->utilisateur->id) }}" method="POST"
        enctype="multipart/form-data">
        @method('PUT')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Modifier le professeur</h1>
                            <br>
                            <a class="btn btn-primary" href="{{ route('professeurs.index') }}"> Retour</a>
                        </div>
                    </div>
                </div>
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
                                    <input type="text" id="nom" name="nom" value="{{ $professeur->utilisateur->nom }}" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">prenom</label>
                                    <input type="text" id="prenom" name="prenom" value="{{ $professeur->utilisateur->prenom }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">email</label>
                                    <input type="email" id="email" name="email" value="{{ $professeur->utilisateur->email }}" class="form-control">
                                </div>
                                <label for="inputName">genre</label>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="genre"
                                            value="feminin" {{ $professeur->genre == 'Feminin' ? 'checked' : '' }}>
                                        <label for="customRadio1" class="custom-control-label">feminin</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="genre"
                                            value="masculin" {{ $professeur->genre == 'Masculin' ? 'checked' : '' }}>
                                        <label for="customRadio2" class="custom-control-label">masculin</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Adresse</label>
                                    <textarea class="form-control" rows="3" name="adresse" id="adresse">{{ $professeur->adresse }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">date de naissance</label>
                                    <input type="date" id="date_naissance" name="date_naissance" value="{{ $professeur->date_naissance }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">telephone</label>
                                    <input type="text" id="telephone" name="telephone"
                                        value="{{ $professeur->telephone }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">whatsapp</label>
                                    <input type="text" id="whatsapp" name="whatsapp"
                                        value="{{ $professeur->whatsapp }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">photo</label>
                                    <input type="file" id="photo" name="photo" class="form-control"
                                        accept="image/*" value="{{ basename($professeur->photo) }}">
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
