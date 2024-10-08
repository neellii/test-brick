@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-3 mt-4">
      <h2>Авторизация</h2>

      <form action="{{ route('login.auth') }}" method="POST">

        @csrf

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" id="email" placeholder="example@mail.com">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Пароль</label>
          <input name="password" type="password" class="form-control" id="password" placeholder="Пароль">
        </div>

        <button type="submit" class="btn btn-primary">Авторизироваться</button>
      </form>
    </div>
  </div>
  
@endsection