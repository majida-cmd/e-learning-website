@extends('main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Liste des modules</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-success" href="{{ route('modules.create') }}"> Ajouter Module</a>
                                <a class="btn btn-success" href="{{ route('chapters.create') }}"> Ajouter Chapitre</a>
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
                                            <th>Description</th>
                                            <th>Tarif</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($modules) > 0)
                                            @foreach ($modules as $module)
                                                <tr>
                                                    <td><img src="{{ asset('module/' . $module->photo) }}"
                                                            width="75" />
                                                    </td>
                                                    <td>{{ $module->nom }}</td>
                                                    <td>{{ $module->description }}</td>
                                                    @if ($module->tarifs->isNotEmpty() && $module->tarifs->first()->montant == 0)
                                                        <td>Gratuit</td>
                                                    @elseif ($module->tarifs->isNotEmpty())
                                                        <td>{{ $module->tarifs->first()->montant }} DH</td>
                                                    @endif
                                                    <form action="{{ route('modules.destroy', $module->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <td>
                                                            <a href="{{ route('modules.edit', $module->id) }}"
                                                                class="btn btn-success btn-sm">Edit</a>
                                                            <input type="submit" class="btn btn-danger btn-sm"
                                                                value="Supprimer" />
                                                        </td>
                                                    </form>
                                                    </td>
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
