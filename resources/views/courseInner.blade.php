@extends('master2D')

@section('content')
    @csrf
    <section id="about-home">
        <h2 data-text="Filieres">
            Sectors</h2>
    </section>
    <section id="course-inner" class="hidden">
        <div class="overview">
            <img class="course-img" src="{{ asset('module/' . $module->photo) }}" alt="{{ $module->nom }}">
            <div class="course-head">
                <div class="c-name">
                    <h2>{{ $module->nom }}</h2>
                    <h6 class="description">Description</h6>
                    <p>{{ $module->description }}</p>
                </div>
                @if ($module->tarifs->first()->montant == 0)
                    <span>Free Training</span>
                @else
                    <span>{{ $module->tarifs->first()->montant }} DH</span>
                @endif
            </div>
        </div>

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
                <a href="{{ route('registration.form', $module->slug) }}" class="blue">
                    register</a>
            </div>
        </div>


    </section>
@endsection
