@extends('master2')

@section('content')
            <section id="home">
                <div class="wrapper ten">
                    <div class="bounce">
                        <h2 data-text="ARTI.Formation">ARTI.Formation</h2>
                    </div>
                </div>
                <p>Découvrez Arti Formation, votre école d apprentissage en ligne spécialisée dans le développement web et le design. Explorez nos cours interactifs pour acquérir des compétences essentielles dans ces domaines passionnants. Démarrez dès maintenant votre parcours vers la création en ligne !</p>
                <div class="btn">
                    {{-- @php
                $hashids = new Hashids\Hashids('arti_form', 15);
                $encryptedId = $hashids->encode($etudiant->id_utilisateur);
            @endphp --}}
                {{-- <a href="{{route('etudiant.modules', ['id' => $encryptedId])}}" class="yellow">Visit Courses</a> --}}
            <a href= "{{  url('/moduless') }}" class="yellow">Visit Courses</a>
                </div>
            </section>
            <!-- video -->

            <section id="video">
                <h1>About Us</h1>
                <main class="container">


                    <section class="video-playlist">
                        <h3 class="title">Arti Formation</h3>
                        <p class="hidden">Notre site éducatif (Arti Formatin) propose des leçons simples et complètes dans différents langages de programmation ainsi que des concepts de programmation de base et avancés. Les apprenants peuvent suivre ces leçons de manière séquentielle en fonction de leur niveau et de leurs intérêts.</p>
                        <p class="hidden">Notre site fournit des ressources de référence et de la documentation qui aident les apprenants à explorer différents langages de programmation, frameworks et bibliothèques. Les apprenants peuvent consulter ces ressources pour obtenir des informations détaillées sur des concepts spécifiques ou des questions techniques.</p>
                        <p class="hidden">Nous proposons une large gamme de Formation gratuite dans divers domaines numériques. En savoir plus sur le sujet de votre choix, trouver le cours parfait et poursuivre votre passion !</p>
                    </section>
                    <section class="main-video">
                        <video src="/assets/img/logo/video.mp4" controls autoplay muted></video>
                    </section>
                </main>
            </section>

            <!-- features -->

            <section id="features" class="hidden">
                <h1>Fonctionnalités impressionnantes</h1>
                <p>Voici quelques fonctionnalités d Arti Formation</p>
                <div class="fea-base">
                    <div class="fea-box hidden">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <h3>Enseignants expérimentés </h3>
                        <p>Arti Formation dispose d'une équipe d'enseignants expérimentés et d'experts dans leurs domaines respectifs. Ils fournissent un encadrement, un soutien et des conseils pratiques tout au long du processus d'apprentissage, garantissant ainsi une formation de haute qualité.</p>
                    </div>
                    <div class="fea-box hidden">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <h3>Mises à jour et support continus</h3>
                        <p>Arti Formation met régulièrement à jour le contenu des cours pour suivre les dernières tendances de l'industrie et les évolutions technologiques. Les apprenants ont également accès à un support client ou à l'aide des enseignants pour faire face à toute question ou défi rencontré tout au long de leur parcours d'apprentissage.</p>
                    </div>
                    <div class="fea-box hidden">
                        <i class="fas fa-award"></i>
                        <h3>Certificat</h3>
                        <p>Arti Formation délivre des certificats internationaux en France suite à la réussite de certains cours ou programmes. Ces certificats sont reconnus au niveau mondial et attestent des compétences et des connaissances acquises par les apprenants. Ils constituent des atouts précieux à inclure dans un CV ou un profil professionnel'.</p>
                    </div>
                </div>
            </section>


            <section id="course" class="hidden">
        <h1>Nos domaines populaires</h1>
        <p>Sélectionnez le domaine que vous souhaitez étudier</p>

        <div class="course-box objects">
            @foreach($domaines as $domaine)
                <div class="courses free show courses-home">
                    <a style="text-decoration: none;" href="{{ route('domaine.show', $domaine->slug) }}">
                        <img class="img-fluid" src="{{ asset('module/'.$domaine->photo) }}" alt="{{ $domaine->nom }}">
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
                <h1>Experts du web</h1>
                <p>The achievers of this site</p>
                <p class="hidden">Pour ce site, une équipe spécialisée de développeurs et de concepteurs web a travaillé sur sa réalisation. Ces professionnels ont conçu et développé l'interface utilisateur et l'architecture du site, en fonction des besoins du projet. Ils ont également amélioré les performances et assuré la sécurité du site, ainsi que son intégration avec les systèmes de gestion de contenu et les bases de données nécessaires. Leurs compétences et leur expérience ont été mises à profit pour offrir aux utilisateurs une expérience utilisateur fluide et agréable.</p>
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
