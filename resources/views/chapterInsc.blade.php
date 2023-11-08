@extends('master2P')

@section('content')

<section class="courses">

    <h1 class="heading">our courses</h1>

    <div class="box-container">
        @foreach($module as $modul)
        <div class="box">
            <div class="thumb">
                <img src="{{ asset('module/'.$modul->photo) }}" alt="{{ $modul->nom }}">
                <span>10 videos</span>
            </div>
            <h3 class="title">complete {{ $modul->nom }} tutorial</h3>
            <a href="{{ route('playlist.show', ['module' => $modul->slug]) }}" class="inline-btn">view playlist</a>
        </div>
        @endforeach
    </div>

</section>
@endsection
