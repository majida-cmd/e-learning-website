@extends('master2R')

@section('content')
    <section id="msg">

        {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @endif --}}
        @if ($errors->any())
            <div class="alert alert-danger">

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif
    </section>
    <section id="registre">
        <div class="container">
            <form action="{{ route('registration.post', ['module' => $module->slug]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form first">
                    <div class="details personal">
                        <div class="fields">
                            <div class="input-field">
                                <label>Last name</label>
                                <input type="text" placeholder="Nom" name="nom" value="{{ old('nom') }}"
                                    required />
                            </div>
                            <div class="input-field">
                                <label>First name</label>
                                <input type="text" placeholder="Prenom" name="prenom" value="{{ old('prenom') }}"
                                    required />
                            </div>
                            <div class="input-field">
                                <label>Email</label>
                                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                                    required />
                            </div>
                            <div class="input-field">
                                <label>Password</label>
                                <input type="password" placeholder="Mot de passe" name="password" required />
                            </div>
                            <div class="input-field">
                                <label>CIN</label>
                                <input type="text" placeholder="CIN" name="cin" value="{{ old('cin') }}"
                                    required />
                            </div>
                            <div class="input-field">
                                <label>
                                    Date of birth</label>
                                <input type="date" name="date_naissance" value="{{ old('date_naissance') }}" required />
                            </div>
                            <div class="input-field">
                                <label>Gender</label>
                                <select name="genre" required>
                                    <option disabled selected>Select gender</option>
                                    <option name="genre" value="Masculin">Masculin</option>
                                    <option value="Feminin" name="genre">Feminin</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <label>Module</label>
                                <input type="hidden" name="id_module" value="{{ $module->id }}" />
                                <input type="text" value="{{ $module->nom }}" readonly />
                            </div>
                            <div class="input-field">
                                <label>Price</label>
                                @if ($module->tarifs->first()->montant == 0)
                                    <input type="hidden" name="id_tarif" value="{{ $module->tarifs->first()->id }}" />
                                    <input type="text" value="Formation Gratuite" readonly />
                                @else
                                    <input type="hidden" name="id_tarif" value="{{ $module->tarifs->first()->id }}"
                                        required />
                                    <input type="text" value="{{ $module->tarifs->first()->montant }} DH" readonly />
                                @endif
                            </div>
                            <div class="input-field">
                                <label>Phone number</label>
                                <input type="tel" name="telephone" placeholder="Telephone"
                                    value="{{ old('telephone') }}" required />
                            </div>
                            <div class="input-field">
                                <label>Whatsapp</label>
                                <input type="tel" name="whatsapp" placeholder="Whatsapp" value="{{ old('whatsapp') }}"
                                    required />
                            </div>
                            <div class="input-field">
                                <label for="photo">Photo</label>
                                <input type="file" name="photo" id="photo" required />
                                <label class="file-upload" for="photo">Choose file</label>
                            </div>
                            <div class="input-field">
                                <label>
                                    Registration date</label>
                                <input type="date" name="date_inscription" value="{{ now()->toDateString() }}"
                                    required />
                            </div>
                            <input type="text" name="isadmin" value=" " hidden />
                        </div>
                        <button type="submit">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
