@extends('master2P')

@section('content')
    <section class="courses cours">
        <h1 class="heading"> courses</h1>
        <div class="box-container">
            @foreach ($modules as $module)
                <div class="box">
                    <div class="thumb">
                        <img src="{{ asset('module/' . $module->photo) }}" alt="{{ $module->nom }}">
                        <span>10 videos</span>
                    </div>
                    <h3 class="title">complete {{ $module->nom }} tutorial</h3>
                    @php
                        $hashids = new Hashids\Hashids('arti_form', 15);
                        $encryptedId = $hashids->encode($etudiant->id_utilisateur);
                    @endphp
                    <a href="{{ route('etudiant.playlist', ['id' => $encryptedId, 'module' => $module->slug]) }}"
                        class="btn">view playlist</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
