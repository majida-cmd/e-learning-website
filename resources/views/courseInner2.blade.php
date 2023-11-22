@extends('master2P')

@section('content')
    <section class="playlist-details">
        <h1 class="heading">Course details {{ $module->nom }}</h1>
        <div class="row">
            <div class="column">
                <div class="thumb">
                    <img src="{{ asset('module/' . $module->photo) }}" alt="{{ $module->nom }}">
                    @if ($module->tarifs->first()->montant == 0)
                        <span>Free Training</span>
                    @else
                        <span>{{ $module->tarifs->first()->montant }} DH</span>
                    @endif
                </div>
            </div>
            <div class="column">
                <div class="tutor">
                    <h3>What you will learn</h3>
                </div>
                <div class="details">
                    @if ($module)
                        <p>{{ $module->description }}</p>
                    @else
                        <h3>Module Not Found</h3>
                        <p>The requested module was not found.</p>
                    @endif
                </div>
            </div>
        </div>
        <div id="course-inner">
            <div class="enroll">
                <h3>This Course Includes:</h3>
                <p>
                    <li>30 hours of video</li>
                </p>
                <p>
                    <li>
                        Full lifetime access</li>
                </p>
                <p>
                    <li>Access on Mobile</li>
                </p>
                <p>
                    <li>Certificate of Completion</li>
                </p>
                <div class="enroll-btn">
                    @php
                        $hashids = new Hashids\Hashids('arti_form', 15);
                        $encryptedId = $hashids->encode($etudiant->id_utilisateur);
                    @endphp
                    <a href="{{ route('etudiant.registration2', ['id' => $encryptedId, $module->slug]) }}"
                        class="btn">register</a>
                </div>
            </div>
            {{-- <div class="overview">
            <img class="course-img" src="{{ asset('module/' . $module->photo) }}" alt="{{ $module->nom }}">
            <div class="course-head">
                <div class="c-name">
                    <h2>{{ $module->nom }}</h2>
                    <h6 class="description">Description</h6>
                    <p>{{ $module->description }}</p>
                </div>
                @if ($module->tarifs->first()->montant == 0)
                    <span>Formation Gratuite</span>
                @else
                    <span>{{ $module->tarifs->first()->montant }} DH</span>
                @endif
            </div>
        </div> --}}


        </div>

        @csrf
    </section>
@endsection
