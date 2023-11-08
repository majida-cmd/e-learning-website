@extends('main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Liste des admins</h1>
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
                                <a class="btn btn-success" href="{{ route('admins.create') }}"> Ajouter un admin</a>
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
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($admins) > 0)
                                            @foreach ($admins as $admin)
                                                <tr>
                                                    <td>{{ $admin->nom }}</td>
                                                    <td>{{ $admin->prenom }}</td>
                                                    <td>{{ $admin->email }}</td>
                                                    <form action="{{ route('admins.destroy', $admin->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <td><a href="{{ route('admins.edit', $admin->id) }}"
                                                                class="btn btn-success btn-sm">Edit</a>
                                                            <input type="submit" class="btn btn-danger btn-sm"
                                                                value="Supprimer" />
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
