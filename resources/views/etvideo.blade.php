@extends('master2P')

@section('content')

    <section class="watch-video">

        <div class="video-container">
            @foreach ($videos as $video)
                <div class="video">
                    <video src="{{ asset('videos/' . $video->url_video) }}" controls
                        poster={{ asset('module/' . $module->photo) }} id="{{ $video->id }}"></video>
                </div>
                @php
                        $hashids = new Hashids\Hashids('arti_form', 15);
                        $encryptedId = $hashids->encode($etudiant->id_utilisateur);
                    @endphp
            @endforeach
            <h3 class="title">complete {{ $module->nom }} tutorial (part 01)</h3>
            <form action="" method="post" class="flex">
                <a href="{{ route('etudiant.playlist', ['id' => $encryptedId, 'module' => $module->slug]) }}"
                    class="btn">go back</a>
            </form>
            <p class="description">
                {{ $module->description }}
            </p>
        </div>

    </section>

    {{-- <section class="comments">

        <h1 class="heading">5 comments</h1>

        <form action="" class="add-comment">
            <h3>add comments</h3>
            <textarea name="comment_box" placeholder="enter your comment" required maxlength="1000" cols="30" rows="10"></textarea>
            <input type="submit" value="add comment" class="inline-btn" name="add_comment">
        </form>

        <h1 class="heading">user comments</h1>

        <div class="box-container">

            <div class="box">
                <div class="user">
                    <img src="images/pic-1.jpg" alt="">
                    <div>
                        <h3>shaikh anas</h3>
                        <span>22-10-2022</span>
                    </div>
                </div>
                <div class="comment-box">this is a comment form shaikh anas</div>
                <form action="" class="flex-btn">
                    <input type="submit" value="edit comment" name="edit_comment" class="inline-option-btn">
                    <input type="submit" value="delete comment" name="delete_comment" class="inline-delete-btn">
                </form>
            </div>

            <div class="box">
                <div class="user">
                    <img src="images/pic-2.jpg" alt="">
                    <div>
                        <h3>john deo</h3>
                        <span>22-10-2022</span>
                    </div>
                </div>
                <div class="comment-box">awesome tutorial!
                    keep going!</div>
            </div>

            <div class="box">
                <div class="user">
                    <img src="images/pic-3.jpg" alt="">
                    <div>
                        <h3>john deo</h3>
                        <span>22-10-2022</span>
                    </div>
                </div>
                <div class="comment-box">amazing way of teaching!
                    thank you so much!
                </div>
            </div>

            <div class="box">
                <div class="user">
                    <img src="images/pic-4.jpg" alt="">
                    <div>
                        <h3>john deo</h3>
                        <span>22-10-2022</span>
                    </div>
                </div>
                <div class="comment-box">loved it, thanks for the tutorial!</div>
            </div>

            <div class="box">
                <div class="user">
                    <img src="images/pic-5.jpg" alt="">
                    <div>
                        <h3>john deo</h3>
                        <span>22-10-2022</span>
                    </div>
                </div>
                <div class="comment-box">this is what I have been looking for! thank you so much!</div>
            </div>

            <div class="box">
                <div class="user">
                    <img src="images/pic-2.jpg" alt="">
                    <div>
                        <h3>john deo</h3>
                        <span>22-10-2022</span>
                    </div>
                </div>
                <div class="comment-box">thanks for the tutorial!

                    how to download source code file?
                </div>
            </div>

        </div>

    </section> --}}
@endsection
