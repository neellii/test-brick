@extends('layout.layout')

@section('title', 'Регистрация')

@section('content')
  <div class="row">
    <div class="col-md-8 offset-md-3 mt-4">
      <h2>Регистрация</h2>

      <form action="{{ route('user.store') }}" method="POST">

        @csrf

        <div class="my-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="example@mail.com" value="{{ old('email') }}">
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="name" class="form-label">Имя</label>
          <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Имя" value="{{ old('name') }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Пароль</label>
          <input name="password" type="password" class="form-control @error('email') is-invalid @enderror" id="password" placeholder="пароль">
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Повторите пароль</label>
          <input name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" placeholder="Повторите пароль">
        </div>

        <button type="submit" class="btn btn-primary">зарегистрироваться</button>

        <a href="{{ route('login') }}" class="ms-3 text-decoration-underline">войти</a>
      </form>
    </div>
  </div>
  
@endsection