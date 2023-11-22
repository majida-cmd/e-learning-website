@extends('master2P')

@section('content')
    <section class="user-profile">
        <h1 class="heading">
            Personal Information</h1>

        <div class="info">

            <div class="student-profile py-4">

                <div class="container">
                    <div class="row">
                        <div class="user">
                            <div class="info-table col-lg-8 col-md-10 col-sm-12 col-xs-12">
                                <div class="card shadow-sm">

                                    <div class="card-body pt-0">
                                        <table class="table .table-active">
                                            <tr>
                                                <th>
                                                    <h4>Last Name</h4>
                                                </th>
                                                <td>
                                                    <h4>:</h4>
                                                </td>
                                                <td>
                                                    <h4>{{ $etudiant->utilisateur->nom }}</h4>
                                                </td>
                                            <tr>
                                                <th>
                                                    <h4>First name</h4>
                                                </th>
                                                <td>
                                                    <h4>:</h4>
                                                </td>
                                                <td>
                                                    <h4>{{ $etudiant->utilisateur->prenom }}</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <h4>Email</h4>
                                                </th>
                                                <td>
                                                    <h4>:</h4>
                                                </td>
                                                <td>
                                                    <h4>{{ $etudiant->utilisateur->email }}</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <h4>Cin</h4>
                                                </th>
                                                <td>
                                                    <h4>:</h4>
                                                </td>
                                                <td>
                                                    <h4>{{ $etudiant->cin }}</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <h4>Gender</h4>
                                                </th>
                                                <td>
                                                    <h4>:</h4>
                                                </td>
                                                <td>
                                                    <h4>{{ $etudiant->genre }}</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <h4>
                                                        Date of birth</h4>
                                                </th>
                                                <td>
                                                    <h4>:</h4>
                                                </td>
                                                <td>
                                                    <h4> {{ $etudiant->date_naissance }}</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <h4>Phone number</h4>
                                                </th>
                                                <td>
                                                    <h4>:</h4>
                                                </td>
                                                <td>
                                                    <h4>{{ $etudiant->telephone }}</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <h4>Whatsapp</h4>
                                                </th>
                                                <td>
                                                    <h4>:</h4>
                                                </td>
                                                <td>
                                                    <h4>{{ $etudiant->whatsapp }}</h4>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="box-container">
                <div class="box">
                    <div class="flex">
                        <i class="fas fa-bookmark"></i>
                        <div>
                            <span>4</span>
                            <p>saved playlist</p>
                        </div>
                    </div>
                    <div class="box-save">
                        <div class="box-btn">
                            <a href="#" class="inline-btn inline-save">view playlists</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>


    <script src="js/script.js"></script>
    </body>

    </html>


    {{-- @extends('master2P')

@section('content')
    <section id="profil">
        <div class="container">
            <div class="card-img">
                <div class="info">
                    <img src="{{ asset('images/' . $etudiant->photo) }}" class="profile_img" />
                    <table>
                        <tr>
                            <td width="100%">
                                <h6>{{ $etudiant->utilisateur->nom }}&nbsp;{{ $etudiant->utilisateur->prenom }}</h6>
                            </td>
                        </tr>
                    </table>
                </div>
                <hr>
                <div class="">
                    <table>
                        <tr>
                            <td align="center" width="30%"><h6>Cin</h6></td>
                            <td width="10%">:</td>
                            <td width="100%"> <h6>{{ $etudiant->cin }}</h6> </td>
                        </tr>
                        <tr>
                            <td width="30%"><h6>Telephone</h6></td>
                            <td width="10%">:</td>
                            <td width="100%"> <h6>{{ $etudiant->telephone }}</h6> </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card-info">
                <div class="card-header">
                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Informations Personnels</h3>
                </div>
                <div class="profil-info">
                    <table>
                        <tr>
                            <div class="info-etud">
                                <td width="30%"> <label>Nom</label> </td>
                                <td width="10%">:</td>
                                <td><h5>{{ $etudiant->utilisateur->nom }}</h5></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="info-etud">
                                <td width="30%"><label>Prenom </label></td>
                                    <td width="2%">:</td>
                                <td><h5>{{ $etudiant->utilisateur->prenom }}</h5></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="info-etud">
                                <td width="30%"><label>Email</label></td>
                                <td width="2%">:</td>
                                <td><h5>{{ $etudiant->utilisateur->email }}</h5></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="info-etud">
                                <td width="30%"><label>CIN</label></td>
                                <td width="2%">:</td>
                                <td><h5>{{ $etudiant->cin }}</h5></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="info-etud">
                                <td width="30%"><label>Genre</label></td>
                                <td width="2%">:</td>
                                <td><h5>{{ $etudiant->genre }}</h5></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="info-etud">
                                <td width="30%"><label>Date de naissance</label></td>
                                <td width="2%">:</td>
                                <td><h5>{{ $etudiant->date_naissance }}</h5></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="info-etud">
                                <td width="30%"><label>Telephone</label></td>
                                <td width="2%">:</td>
                                <td><h5>{{ $etudiant->telephone }}</h5></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="info-etud">
                                <td width="30%"><label>Whatsapp</label></td>
                                <td width="2%">:</td>
                                <td><h5>{{ $etudiant->whatsapp }}</h5></td>
                            </div>
                        </tr>
                    </table>
                </div>
                <div class="btn-update">
                </div>
            </div>
        </div>
    </section> --}}
    @csrf
@endsection
