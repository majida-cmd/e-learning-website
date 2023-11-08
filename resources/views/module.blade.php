@extends('master2D')
@section('content')
    <section id="course" class="hidden">
        <h1>Commencez Votre Cours</h1>
        <p>Choisissez la leçon que vous souhaitez commencer à apprendre</p>

        <div id="buttons" class="hidden">
            <button class="yellow" onclick="filterObjects('all')">show All</button>
            <button class="yellow" onclick="filterObjects('free')">Free</button>
            <button class="yellow" onclick="filterObjects('premium')">Premium</button>
        </div>
        
        <div class="course-boxx objects">
            @foreach ($modules as $module)
                <div class="courses free show">
                    <a href="{{ route('module.show', ['module' => $module->slug]) }}">
                        <img src="{{ asset('module/' . $module->photo) }}" alt="{{ $module->nom }}" style="max-width: 100%;">
                        <div class="details">
                            <span>Updated 22/06/2023</span>
                            <h6 href="{{ route('module.show', ['module' => $module->slug]) }}" class="course-title">
                                {{ $module->nom }}</h6>
                            <p class="course-description">{{ Str::limit($module->description, 45, '...') }}</p>
                            @foreach ($module->tarifs as $tarif)
                                @if ($module->tarifs->first()->montant == 0)
                                    <div class="cost">
                                        Gratuit
                                    </div>
                                @else
                                    <div class="cost">
                                        {{ $module->tarifs->first()->montant }}DH
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </a>
                </div>
            @endforeach
            @csrf
        </div>
    </section>
@endsection
<style>
    .discription {
        color: #64626e;
    }

    .course-boxx {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .courses {
        background-color: #fff;
        border: 2px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        width: 100%;
        height: 60px;
        max-width: 300px;
    }

    .courses img {
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
