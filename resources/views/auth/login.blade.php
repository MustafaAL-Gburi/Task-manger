@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark text-white shadow-lg rounded-4">
                    <div class="card-header fs-4">
                        Login to Task Manager
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label text-white">Email address</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label text-white">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-white" for="remember">Remember me</label>
                            </div>

                            <button type="submit" class="btn btn-warning">Login</button>
                            <a href="{{ route('register') }}" class="btn btn-link text-white">Create account</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
