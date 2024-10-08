@extends('layout.layout')

@section('title', 'Категории')

@section('content')
<div class="row mt-4 px-3">
    <div class="col-md-12 p-2">
      <h2>Редактировать категорию</h2>

      <form action="{{ route('admin.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-3">
          <label for="category" class="form-label">Категория</label>
          <input name="category" type="text" class="form-control @error('category')
            is-invalid
          @enderror" id="category" placeholder="Категория" value="{{ $category->category ?? old('category') }}"></input>
          @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="mb-3">
          <select name="status" class="form-select  @error('status')
            is-invalid
          @enderror" aria-label="Default select example">
            <option disabled>Status</option>
            <option value="1" 
            @if ($category->status === 1)
              selected
            @endif
            >Активно</option>
            <option value="0"
            @if ($category->status === 0)
              selected
            @endif
            >Неактивно</option>
          </select>
          @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button class="btn btn-dark" type="submit">Сохранить</button>
      </form>
    </div>
</div>
  
@endsection