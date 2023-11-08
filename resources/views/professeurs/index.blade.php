@extends('main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Liste des professeurs</h1>
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
                                <a class="btn btn-success" href="{{ route('professeurs.create') }}"> Ajouter un professeur</a>
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
                                        @if (count($professeurs) > 0)
                                            @foreach ($professeurs as $professeur)
                                                <tr>
                                                    <td><img src="{{ asset('images/' . $professeur->photo) }}"
                                                            width="75" /></td>
                                                    <td>{{ $professeur->nom }}</td>
                                                    <td>{{ $professeur->prenom }}</td>
                                                    <td>{{ $professeur->email }}</td>
                                                    <td>{{ $professeur->genre }}</td>
                                                    <td>{{ $professeur->date_naissance }}</td>
                                                    <td>{{ $professeur->telephone }}</td>
                                                    <td>{{ $professeur->whatsapp }}</td>

                                                    <form action="{{ route('professeurs.destroy', $professeur->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <td>
                                                            <a href="{{ route('professeurs.show', $professeur->id) }}"
                                                                class="btn btn-success btn-sm">View</a>
                                                            <a href="{{ route('professeurs.edit', $professeur->id) }}"
                                                                class="btn btn-success btn-sm">Edit</a>
                                                            <input type="submit" class="btn btn-danger btn-sm"
                                                                value="Supprimer" />
                                                        </td>
                                                    </form>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8" class="text-center">No Data Found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
