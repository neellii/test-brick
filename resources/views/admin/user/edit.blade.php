@extends('layout.layout')

@section('title', 'Категории')

@section('content')
<div class="row mt-4 px-3">
    <div class="col-md-12 p-2">
      <h2>Редактировать пользователя</h2>

      <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
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
          <label for="role">Права</label>
          <select name="role" class="form-select  @error('role')
            is-invalid
          @enderror" aria-label="Default select example" id="role">
            <option disabled>Права</option>
            <option value="admin" 
            @if ($user->role === 'admin')
              selected
            @endif
            >Администратор</option>
            <option value="user"
            @if ($user->role === 'user')
              selected
            @endif
            >Пользователь</option>
          </select>
          @error('role')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button class="btn btn-dark" type="submit">Сохранить</button>
      </form>
    </div>
</div>
  
@endsection