@extends('master2D')

@section('content')
    @csrf
    <section id="about-home">
        <h2 data-text="Filieres">Filieres</h2>
    </section>
    <section id="course-inner" class="hidden">
        <div class="overview">
            <img class="course-img" src="{{ asset('module/'.$module->photo) }}" alt="{{ $module->nom }}">
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
        </div>

        <div class="enroll">
                    <h3>This Course Includes:</h3>
                    <p><li>30 heures de vidéo</li> </p>
                    <p><li>Accès à vie complet</li> </p>
                    <p><li>Accès sur Mobile</li> </p>
                    <p><li>Certificat d'achèvement</li></p>
                    <div class="enroll-btn">
                        <a href="{{ route('registration.form', $module->slug) }}" class="blue">inscrire</a>
                    </div>
                </div>


    </section>
@endsection
