@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Posts Categories</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

            {{-- Crear category bottom --}}
            <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@mdo">Create Category </button>


    {{-- Crear category boody --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header " data-bs-theme="dark" style="background-color: rgb(0, 79, 116); color: white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Posts Category</h1>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/categories" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Category Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror " id="name"
                                name="name" required autofocus value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="slug" class="col-form-label">Slug:</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror " id="slug"
                                name="slug" readonly required value="{{ old('slug') }}">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-sm">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="table-responsive small col-lg-8">


        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>


                            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning ">
                                <i class="bi bi-pencil-square "></i>
                            </a>

                            <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
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



    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/categories/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-acept', function(e) {
            e.preventDefault();
        });
    </script>
@endsection
