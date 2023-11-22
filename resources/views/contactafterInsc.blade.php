@extends('master2P')

@section('content')
    <section class="contact">

        <div class="row">

            <div class="image">
                <img src="/module/contact-img.jpg" alt="">
            </div>
            @php
                $hashids = new Hashids\Hashids('arti_form', 15);
                $encryptedId = $hashids->encode($etudiant->id_utilisateur);
            @endphp
            <form action="{{ route('etudiant.storeCF', ['id' => $encryptedId]) }}" method="post">
                @csrf
                <h3>get in touch</h3>
                <input type="text" placeholder="Full name" name="name" required maxlength="50" class="box">
                <input type="email" placeholder="Email" name="email" required maxlength="50" class="box">
                <input type="number" placeholder="Phone" name="phone" required maxlength="50" class="box">
                <input type="text" placeholder="Subject" name="subject" required maxlength="50" class="box">
                <textarea name="message" class="box" placeholder="Message" required maxlength="1000" cols="30" rows="10"></textarea>
                <button type="submit" value="send message" class="inline-btn1" name="submit">Send</button>
            </form>

        </div>

        {{-- <div class="box-container">

            <div class="box">
                <i class="fas fa-phone"></i>
                <h3>phone number</h3>
                <a href="tel:1234567890">123-456-7890</a>
                <a href="tel:1112223333">111-222-3333</a>
            </div>

            <div class="box">
                <i class="fas fa-envelope"></i>
                <h3>email address</h3>
                <a href="mailto:shaikhanas@gmail.com">shaikhanas@gmail.come</a>
                <a href="mailto:anasbhai@gmail.com">anasbhai@gmail.come</a>
            </div>

            <div class="box">
                <i class="fas fa-map-marker-alt"></i>
                <h3>office address</h3>
                <a href="#">flat no. 1, a-1 building, jogeshwari, mumbai, india - 400104</a>
            </div>

        </div> --}}

    </section>
@endsection
