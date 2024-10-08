@extends('layout.layout')

@section('title', 'Категории')

@section('content')
<div class="row mt-4 px-3">
    <div class="col-md-12 p-2">
      <h2>Редактировать данные</h2>

      <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-3">
          <label for="name" class="form-label">Имя</label>
          <input name="name" type="text" class="form-control @error('name')
            is-invalid
          @enderror" id="name" placeholder="Имя" value="{{ $user->name ?? old('name') }}"></input>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="text" class="form-control @error('email')
            is-invalid
          @enderror" id="email" placeholder="Email" value="{{ $user->email ?? old('email') }}"></input>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="old_password" class="form-label">Старый пароль</label>
          <input name="old_password" type="password" class="form-control @error('old_password')
            is-invalid
          @enderror" id="old_password" placeholder="пароль"></input>
          @error('old_password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Новый пароль</label>
          <input name="password" type="password" class="form-control @error('password')
            is-invalid
          @enderror" id="password" placeholder="пароль"></input>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Повторите пароль</label>
          <input name="password_confirmation" type="password" class="form-control @error('password_confirmation')
            is-invalid
          @enderror" id="password_confirmation" placeholder="пароль"></input>
          @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        
        <button class="btn btn-dark" type="submit">Сохранить</button>
      </form>
    </div>
</div>
  
@endsection