@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row  my-3">
            <div class="col-lg-9">


                <h3 class="mb-2">{{ $post['title'] }}</h3>

                <a href="/dashboard/posts" class="btn  btn-sm" style="background-color: #4caf50; color: #fff;"><i class="bi bi-arrow-left"></i> Back</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm"><i
                        class="bi bi-pencil-square "></i> Edit</a>

                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><span
                            class="bi bi-trash"></span>Delete</button>
                </form>

                @if ($post->image)
                <div style="max-height:350px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                        class="img-fluid mt-3">
                </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}" class="img-fluid mt-3">
                @endif



                <article class="my-3">
                    {!! $post->body !!}
                    {{-- unutk kalau ada pragraf maka pakai {!!  !!} --}}
                </article>


            </div>
        </div>
    </div>
@endsection
