@extends('master2P')

@section('content')
    <section class="courses cours">

        <h1 class="heading">our courses</h1>
        <div class="box-container">
            @foreach ($modules as $module)
                @php
                    $hashids = new Hashids\Hashids('arti_form', 15);
                    $encryptedId = $hashids->encode($etudiant->id_utilisateur);
                @endphp
                <a href="{{ route('etudiant.coursesleftInner', ['id' => $encryptedId, $module->slug]) }}">
                    <div class="box">
                        <div class="thumb">
                            <img src="{{ asset('module/' . $module->photo) }}" alt="{{ $module->nom }}">
                        </div>
                        <div class="details">
                            <h6 class="course-title">{{ $module->nom }}</h6>
                            <p class="course-description">{{ Str::limit($module->description, 45, '...') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
