    @extends('main')
    @section('content')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Liste des etudiants</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="btn btn-success" href="{{ route('etudiants.create') }}"> Ajouter un
                                        étudiant</a>
                                </div>
                                @if ($message = Session::get('success'))
                                    <div class="card-header">
                                        <h5 class="card-title">{{ $message }}</h5>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Email</th>
                                                <th>Genre</th>
                                                <th>Date naissance</th>
                                                <th>Telephone</th>
                                                <th>Whatsapp</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($etudiants) > 0)
                                                @foreach ($etudiants as $etudiant)
                                                    <tr>
                                                        <td><img src="{{ asset('images/' . $etudiant->photo) }}"
                                                                width="75" /></td>
                                                        <td>{{ $etudiant->nom }}</td>
                                                        <td>{{ $etudiant->prenom }}</td>
                                                        <td>{{ $etudiant->email }}</td>
                                                        <td>{{ $etudiant->genre }}</td>
                                                        <td>{{ $etudiant->date_naissance }}</td>
                                                        <td>{{ $etudiant->telephone }}</td>
                                                        <td>{{ $etudiant->whatsapp }}</td>
                                                        <form action="{{ route('etudiants.destroy', $etudiant->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @php
                                                                $hashids = new Hashids\Hashids('arti_form', 15);
                                                                $encryptedId = $hashids->encode($etudiant->id_utilisateur);
                                                            @endphp
                                                            <td><a href="{{ route('etudiants.show', $etudiant->id) }}"
                                                                    class="btn btn-success btn-sm">View</a>
                                                                <a href="{{ route('etudiants.edit', $etudiant->id) }}"
                                                                    class="btn btn-success btn-sm">Edit</a>
                                                                <input type="submit" class="btn btn-danger btn-sm"
                                                                    value="Supprimer" /> @csrf
                                                            </td>
                                                        </form>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center">No Data Found</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection
