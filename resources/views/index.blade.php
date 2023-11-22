@extends('master2')

@section('content')
    <section id="home">
        <div class="wrapper ten">
            <div class="bounce">
                <h2 data-text="ARTI.Formation">ARTI.Training</h2>
            </div>
        </div>
        <p>Discover Arti Training, your online learning school specializing in web development and design. Explore our
            interactive courses to learn essential skills in these exciting fields. Start your journey to online creation
            now!</p>
        <div class="btn">
            {{-- @php
                $hashids = new Hashids\Hashids('arti_form', 15);
                $encryptedId = $hashids->encode($etudiant->id_utilisateur);
            @endphp --}}
            {{-- <a href="{{route('etudiant.modules', ['id' => $encryptedId])}}" class="yellow">Visit Courses</a> --}}
            <a href= "{{ url('/moduless') }}" class="yellow">Visit Courses</a>
        </div>
    </section>
    <!-- video -->

    <section id="video">
        <h1>About Us</h1>
        <main class="container">


            <section class="video-playlist">
                <h3 class="title">Arti Training</h3>
                <p class="hidden">Our educational site (Arti Training) offers simple and comprehensive lessons in different
                    programming languages ​​as well as basic and advanced programming concepts. Learners can follow these
                    lessons sequentially based on their level and interests.</p>
                <p class="hidden">Our site provides reference resources and documentation that help learners explore
                    different programming languages, frameworks, and libraries. Learners can consult these resources for
                    in-depth information on specific concepts or technical questions.</p>
                <p class="hidden">We offer a wide range of free training in various digital fields. Learn more about your
                    chosen topic, find the perfect course, and pursue your passion!</p>
            </section>
            <section class="main-video">
                <video src="/assets/img/logo/video.mp4" controls autoplay muted></video>
            </section>
        </main>
    </section>

    <!-- features -->

    <section id="features" class="hidden">
        <h1>Impressive Features</h1>
        <p>Here are some features of Arti Training</p>
        <div class="fea-base">
            <div class="fea-box hidden">
                <i class="fa-solid fa-chalkboard-user"></i>
                <h3>
                    Experienced teachers </h3>
                <p>Arti Training dispose d'une équipe d'enseignants expérimentés et d'experts dans leurs domaines
                    respectifs. Ils fournissent un encadrement, un soutien et des conseils pratiques tout au long du
                    processus d'apprentissage, garantissant ainsi une formation de haute qualité.</p>
            </div>
            <div class="fea-box hidden">
                <i class="fa-solid fa-pen-to-square"></i>
                <h3>Ongoing updates and support</h3>
                <p>Arti Training regularly updates course content to follow the latest trends in
                    industry and technological developments. Learners also have access to customer support or
                    helping teachers to deal with any questions or challenges encountered throughout their
                    learning journey.</p>
            </div>
            <div class="fea-box hidden">
                <i class="fas fa-award"></i>
                <h3>
                    Certificate</h3>
                <p>Arti Training delivers international certificates in France following the successful completion of certain courses or
                    programs. These certificates are recognized globally and attest to the skills and
                    knowledge acquired by learners. They are valuable assets to include in a CV or
                    a professional profile'.</p>
            </div>
        </div>
    </section>


    <section id="course" class="hidden">
        <h1>Our popular fields</h1>
        <p>Select the field you want to study</p>

        <div class="course-box objects">
            @foreach ($domaines as $domaine)
                <div class="courses free show courses-home">
                    <a style="text-decoration: none;" href="{{ route('domaine.show', $domaine->slug) }}">
                        <img class="img-fluid" src="{{ asset('module/' . $domaine->photo) }}" alt="{{ $domaine->nom }}">
                        <div class="details">
                            <span>Updated 22/06/2023</span>
                            <h6 class="title">{{ $domaine->nom }}</h6>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    <section id="experts" class="hidden">
        <h1>Web experts</h1>
        <p>The achievers of this site</p>
        <p class="hidden">For this site, a specialized team of developers and web designers worked on its
            realization. These professionals designed and developed the user interface and architecture of the site, in
            depending on the needs of the project. They also improved performance and ensured site security.
            as well as its integration with the necessary content management systems and databases. Their
            skills and experience have been leveraged to provide users with user experience
            fluid and pleasant.</p>
        <div class="experts-box">

            <div class="profile hidden">
                <img src="/assets/img/logo/ibra.png" alt="">
                <h6>Ibrahim Daanoun</h6>
                <p>Web Design</p>
                <div class="pro-links">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>

            <div class="profile hidden">
                <img src="/assets/img/logo/YOUSRA.png" alt="">
                <h6>Yousra</h6>
                <p>Web Development & Database Management (SQL)</p>
                <div class="pro-links">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>

            <div class="profile hidden">
                <img src="/assets/img/logo/MAJDA.png" alt="">
                <h6>Majda</h6>
                <p>Web Development & Database Management (SQL)</p>
                <div class="pro-links">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>

        </div>
    </SEction>
@endsection
