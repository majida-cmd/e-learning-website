@extends('master2D')

@section('content')

    <section id="about-home">
        <h2 data-text="Courses">Courses</h2>
    </section>

    <section id="course" class="hidden">
        <h1>{{ $domaine->nom }}</h1>
        <p>Choisissez la leçon que vous souhaitez commencer à apprendre en {{ $domaine->nom }}</p>

        <div id="buttons" class="hidden">
            <button class="yellow" class="hidden" onclick="filterObjects('all')">show All</button>
            <button class="yellow" class="hidden" onclick="filterObjects('free')">Free</button>
            <button class="yellow" class="hidden" onclick="filterObjects('premium')">Premium</button>
        </div>
        <div class="course-boxx objects">
            @foreach($modules as $module)
                <div class="courses free show">
                    <a href="{{ route('module.show', $module->slug) }}">
                            <img src="{{ asset('module/'.$module->photo) }}" alt="{{ $module->nom }}">
                        <div class="details">
                            <h6 class="course-title">{{ $module->nom }}</h6>
                            <p class="course-description">{{ Str::limit($module->description, 45, '...') }}</p>
                        </div>
                        @foreach($module->tarifs as $tarif)
                            @if ($module->tarifs->first()->montant == 0)
                                <div class="cost">
                                    Gratuit
                                </div>
                            @else
                                <div class="cost">
                                    {{$module->tarifs->first()->montant}}DH
                                </div>
                            @endif
                        @endforeach
                    </a>
                </div>
            @endforeach
        @csrf
        </div>
    </section>
@endsection

<style>
    .discription{
        color: #64626e;
    }
    .course-boxx{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }
    .courses{
        background-color: #fff;
        border: 2px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        width: 100%;
        height: 60px;
        max-width: 300px;
    }
    .courses img{
        width: 100%;
        height: 60%;
        background-size: cover;
        background-position: center;
    }
    .courses:hover {
        transform: translateY(-5px);
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
    }
    </style>

