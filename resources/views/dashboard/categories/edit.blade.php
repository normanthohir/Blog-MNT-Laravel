@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Category</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <div class="col-lg-8">
        <div class="card " >
            <div class="card-body">
                <form action="/dashboard/categories/{{ $category->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" required autofocus value="{{ old('name', $category->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="slug" class="col-form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            name="slug" readonly required value="{{ old('slug', $category->slug) }}">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                    </div>

                    <div class="modal-footer">
                        <a href="/dashboard/categories" class="btn btn-secondary btn-sm m-2">Cancel</a>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
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
