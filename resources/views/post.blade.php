@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">


                <h4 class="mb-1">{{ $post['title'] }}</h4>

                <p style="margin-bottom: -2px">
                    <small class="text-body-secondary">By. <a href="/posts?author={{ $post->author->username }}"
                            class="text-decoration-none">{{ $post->author->name }}</a> in
                        <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">
                            {{ $post->category->name }}</a>
                    </small>
            
                </p>
                <small style="color: rgb(105, 126, 169;)">{{ $post->created_at->format('d M Y H:i T') }}</small>


                @if ($post->image)
                <div style="max-height:350px; overflow: hidden; margin-top: 2px">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                        class="img-fluid ">
                </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}" class="img-fluid ">
                @endif

                <article class="my-3">
                    {!! $post->body !!}
                    {{-- unutk kalau ada paragrag maka pakai {!!  !!} --}}
                </article>

                <a href="/posts" class="d-block mt-5">Back To Posts</a>

            </div>
        </div>
    </div>
@endsection
