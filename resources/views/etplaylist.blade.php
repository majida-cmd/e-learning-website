@extends('master2P')

@section('content')
    <section class="playlist-details">
        <h1 class="heading">playlist details</h1>
        <div class="row">
            <div class="column">
                <div class="thumb">
                    <img src="{{ asset('module/' . $module->photo) }}" alt="{{ $module->nom }}">
                </div>
            </div>
            <div class="column">
                <div class="tutor">
                    <div>
                        <h3>{{ $module->nom }}</h3>
                        <span>21-10-2022</span>
                    </div>
                </div>
                <div class="details">
                    @if ($module)
                        <h3>complete {{ $module->nom }} tutorial</h3>
                        <p>{{ $module->description }}</p>
                    @else
                        <h3>Module Not Found</h3>
                        <p>The requested module was not found.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @csrf
    <section class="playlist-videos">
        <h1 class="heading">playlist videos</h1>
        @foreach ($chapters as $chapter)
            <div class="box-container">
                @php
                    $hashids = new Hashids\Hashids('arti_form', 15);
                    $encryptedId = $hashids->encode($etudiant->id_utilisateur);
                @endphp
                <a href="{{ route('etudiant.video', ['id' => $encryptedId, 'module' => $module->slug, 'chapitre' => $chapter->slug]) }}"
                    class="box">
                    <i class="fas fa-play"></i>
                    <img src="{{ asset('chapitre/' . $chapter->photo) }}" alt="">
                    <h3>Complete {{ $module->nom }} tutorial ({{ $chapter->nom }})</h3>
                </a>
            </div>
        @endforeach
    </section>
@endsection
