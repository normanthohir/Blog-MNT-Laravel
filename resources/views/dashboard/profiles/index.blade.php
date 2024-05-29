@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile</h1>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="mb-3 ronded">
                <div class="card border-0">
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success col-lg-10" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Nama:</th>
                                    <td> {{ auth()->user()->name }} </td>

                                </tr>
                                <tr>
                                    <th>Username:</th>
                                    <td>{{ auth()->user()->username }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>Password:</th>
                                    <td><input type="password" class="from-control border-0"
                                            value="{{ auth()->user()->password }}" disabled style="background-color: white">
                                    </td>
                                </tr>
                                
                            </table>
                            <a href="/dashboard/profiles/{{ auth()->user()->username }}/edit" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
