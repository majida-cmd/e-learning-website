@extends('master2C')

@section('content')
    <!-- HOME -->
    <form method="POST" action="{{ route('contact.us.store') }}" id="contactUSForm">
        @csrf
        <section id="about-home">
            <h2 data-text="Contact.Us">Contact.Us</h2>
        </section>

        <section id="contact" class="hidden">
            <div class="getin hidden">
                <h2>Get In Touch</h2>
                <p>Looking For help! Fill the form and start a new adventure.</p>
                <div class="getin-details hidden">
                    <h3>Hesdquaters</h3>
                    <div>
                        <i class="fa-solid fa-house get"></i>
                        <p>53Q2+62, xxxx xx , xxxxxx xxxx xxx xx,Fes xxxxx</p>
                    </div>
                </div>

                <div class="getin-details hidden">
                    <h3>Phone</h3>
                    <div>
                        <i class="fa-solid fa-phone get"></i>
                        <p>(+212)500 00 00 00 <br> (+212)600 00 00 00</p>
                    </div>
                </div>

                <div class="getin-details hidden">
                    <h3>Support</h3>
                    <div>
                        <i class="fa-solid fa-envelope get"></i>
                        <p>contact@example.com<br> admin@example.com</p>
                    </div>
                    <h3>Follow Us</h3>
                    <div class="pro-links">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-linkedin-in"></i>
                        <i class="fab fa-behance"></i>
                    </div>
                </div>
            </div>


            <div class="form hidden">
                <h4>let s Connect</h4>
                <p>Integre at lorem aget diam facilisis lacinia ac id messa.</p>
                <div class="form-col hidden">
                    <input type="text" placeholder="Nom complet" name="name" id="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-col hidden">
                    <input type="text" placeholder="Email" name="email" id="" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif

                </div>
                <div class="form-col hidden">
                    <input type="text" placeholder="Telephone" name="phone" id="" value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>

                <div class="form-col hidden">
                    <input type="text" placeholder="Sujet" name="subject" id="" value="{{ old('subject') }}">
                    @if ($errors->has('subject'))
                        <span class="text-danger">{{ $errors->first('subject') }}</span>
                    @endif
                </div>

                <div class="form-col hidden">
                    <textarea name="Message" id="" cols="30" rows="8" placeholder="How can we help?">{{ old('message') }}</textarea>
                    @if ($errors->has('message'))
                        <span class="text-danger">{{ $errors->first('message') }}</span>
                    @endif
                </div>
                <div class="form-col hidden">
                    <div class="form-group text-center">
                        <button class="btn btn-success btn-submit">Envoyer</button>
                    </div>
                </div>
            </div>
    </form>
    </section>


    <!-- Map -->

    <section id="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59383.76681135364!2d-5.043268966705992!3d34.029569565216114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2zRsOocw!5e0!3m2!1sfr!2sma!4v1683555583880!5m2!1sfr!2sma"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    </form>
@endsection
