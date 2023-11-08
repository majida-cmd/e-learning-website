{{-- @extends('master')

@section('content')


@if($message = Session::get('success'))
<div class="alert alert-success">
	{{ $message }}
</div>
@endif
<h1>{{ $module->nom }}</h1>

<img src="{{ asset('module/' . $module->photo) }}" alt="{{ $module->nom }}">

<p>{{ $module->description }}</p>

<h2>Tarifs</h2>

<table>
    <thead>
        <tr>
            <th>Montant</th>
            <th>Date de début</th>
            <th>Date de fin</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($module->tarifs as $tarif)
            <tr>
                <td>{{ $tarif->montant }}</td>
                <td>{{ $tarif->date_debut }}</td>
                <td>{{ $tarif->date_fin }}</td>
            </tr>
        @endforeach
    </tbody>
</table> --}}
