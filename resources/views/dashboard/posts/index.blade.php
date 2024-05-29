@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-10" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <div class="row">
        <div class="col-lg-2 mt-1">
            <a href="/dashboard/posts/create" class="btn btn-primary btn-sm mb-2">Create new post</a>

        </div>
        <div class="col-md-6">
            {{-- tmabar serch disini --}}
        </div>

    </div>




    <div class="table-responsive small col-lg-10" id="datatable">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td> 
                        <td>
                            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info "><i
                                    class="bi bi-eye"></i></a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning "><i
                                    class="bi bi-pencil-square "></i></i></a>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                        class="bi bi-x-circle"></span></button>
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{-- pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $posts->links() }}
    </div>
@endsection
