@extends('layouts.main')

@section('container')
    <h3 class="mb-3 text-center">{{ $title }}</h3>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control border-primary m-1" placeholder="Search.." name="search"
                        value="{{ request('search') }}" style="border-radius: 7px; font-size: 15px">
                    <div class="input-group-append mt-1 ms-2">
                        <button class="btn btn-outline-primary " type="submit" style="border-radius: 7px;">
                            <i class="bi bi-search " style="font-size: 13px; font-weight: bold;"></i>
                        </button>
                    </div>
                </div>


            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            @if ($posts[0]->image)
                <div style="max-height:400px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}"
                        class="img-fluid" width="100%">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
                    alt="{{ $posts[0]->category->name }}">
            @endif

            <div class="card-body text-center">
                <h4 class="card-title"><a
                        href="/post/{{ $posts[0]->slug }}"class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
                </h4>
                <p> <small class="text-body-secondary">By. <a href="/posts?author={{ $posts[0]->author->username }}"
                            class="text-decoration-none">{{ $posts[0]->author->name }}</a>
                        in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">
                            {{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>

                <p class="card-text">{{ $posts[0]->excerpt }}</p>

                <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more..</a>

            </div>
        </div>


        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute  p-1 text-white"
                                style="font-size: 10px; font-family:sans-serif; background-color: rgb(0,0,0,0.5)">
                                <a href="/posts?category={{ $post->category->slug }}"
                                    class="text-white text-decoration-none">{{ $post->category->name }}</a>
                            </div>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}"
                                    alt="{{ $post->category->name }}" class="img-fluid ">
                            @else
                                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}"
                                    class="card-img-top" alt="{{ $post->category->name }}">
                            @endif


                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p>
                                    <small class="text-body-secondary">By. <a
                                            href="/posts?author={{ $post->author->username }}"
                                            class="text-decoration-none">{{ $post->author->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Post Found</p>
    @endif
    {{-- pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $posts->links() }}
    </div>
@endsection
