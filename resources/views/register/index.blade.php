@extends('layouts.main')

@section('contain')
<div class="row justify-content-center">
    <div class="col-md-6">
        <main class="form-register">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form action="/register" method="post">
              @csrf
              <div class="form-floating">
                <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" required value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username" name="username" placeholder="username" required>
                <label for="username">Username</label>
                @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="email" required>
                <label for="email">Email</label>
              </div>
              @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              <div class="form-floating">
                <input type="password" class="form-control rounded-bottom  @error('password') is-invalid @enderror" id="password" name="password" placeholder="password" required>
                <label for="password">Password</label>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Registration</button>
            </form>
            <small class="d-block text-center mt-2"><a href="/login">Login now</a></small>
        </main>
    </div>
</div>

@endsection