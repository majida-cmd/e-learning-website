@extends('master2P')

@section('content')
        @php
            $hashids = new Hashids\Hashids('arti_form', 15);
            $encryptedId = $hashids->encode($etudiant->id_utilisateur);
        @endphp
        <section class="form-container">
            <form action="{{ route('etudiant.register2', ['id' => $encryptedId, $module->slug]) }}" method="POST" enctype="multipart/form-data"
                enctype="multipart/form-data">
                <div id="input-field">
                    <label>Module</label>
                    <input type="hidden" name="id_module" value="{{ $module->id }}" />
                    <input type="text" value="{{ $module->nom }}"  class="box"  readonly />
                </div>
                <div id="input-field">
                    <label>Tarif</label>
                    @if ($module->tarifs->first()->montant == 0)
                        <input type="hidden" name="id_tarif" value="{{ $module->tarifs->first()->id }}" />
                        <input type="text" value="Formation Gratuite"  class="box" readonly />
                    @else
                        <input type="hidden" name="id_tarif" value="{{ $module->tarifs->first()->id }}" required />
                        <input type="text"  class="box" value="{{ $module->tarifs->first()->montant }} DH" readonly />
                    @endif
                </div>
                    <button type="submit" class="btn">Inscrire</button>
        </section>
    @endsection
