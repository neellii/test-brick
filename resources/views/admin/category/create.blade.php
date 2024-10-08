@extends('layout.layout')

@section('title', 'Категории')

@section('content')
<div class="row mt-4 px-3">
    <div class="col-md-12 mt-4 p-2">
      <h2>Добавить категорию</h2>

      <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data" class="mt-4">
        @csrf

        <div class="mb-3">
          <label for="category" class="form-label">Название</label>
          <input name="category" type="text" class="form-control @error('category')
            is-invalid
          @enderror" id="category" placeholder="Категория" value="{{ old('category') }}"></input>
          @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="mb-3">
          <select name="status" class="form-select  @error('status')
            is-invalid
          @enderror" aria-label="Default select example">
            <option selected>Статус</option>
            <option value="1">Активно</option>
            <option value="0">Неактивно</option>
          </select>
          @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button class="btn btn-dark" type="submit">Добавить</button>
      </form>
    </div>
</div>
  
@endsection