@extends('layout.layout')

@section('title', 'Администрирование')

@section('content')
<div class="row mt-4 px-3">
  <h2>Администрирование</h2>

    <div class="col-md-12 mt-4">
      <ul class="list-group">
        <li class="list-group-item">
          <a href="{{ route('admin.categories.index') }}">Категории</a>
        </li>
        <li class="list-group-item">
          <a href="{{ route('admin.events.index') }}">Мероприятия</a>
        </li>
        <li class="list-group-item">
          <a href="{{ route('admin.users.index') }}">Пользователи</a>
        </li>
      </ul>
    </div>
</div>
  
@endsection