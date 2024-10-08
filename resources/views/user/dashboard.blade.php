@extends('layout.layout')

@section('title', 'Профиль')

@section('content')
<div class="row mt-4 px-3">
  <h2>Пользовательские данные</h2>

    <div class="col-md-12 mt-4">
      <ul class="list-group">
        <li class="list-group-item">
          <a href="{{ route('user.profile') }}">Профиль</a>
        </li>
        <li class="list-group-item">
          <a href="{{ route('user.events.index') }}">Мои записи</a>
        </li>
      </ul>
    </div>
</div>
@endsection