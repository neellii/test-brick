@extends('layout.layout')

@section('title', 'Мероприятия')

@section('content')
<div class="row mt-4 px-3">
    <div class="col-md-12 mt-4 p-2">
      <h2>Добавить мероприятие</h2>

      <form action="{{ route('admin.events.store') }}" method="post" enctype="multipart/form-data" class="mt-4">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Название</label>
          <input name="name" type="text" class="form-control @error('name')
            is-invalid
          @enderror" id="name" placeholder="Мероприятие" value="{{ old('name') }}"></input>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Описание</label>
          <input name="description" type="text" class="form-control @error('description')
            is-invalid
          @enderror" id="description" placeholder="Описание" value="{{ old('description') }}"></input>
          @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="dateTime" class="form-label">Дата проведения в формате год-месяц-день часы:минуты:секунды</label>
          <input name="dateTime" type="text" class="form-control @error('dateTime')
            is-invalid
          @enderror" id="dateTime" placeholder="гггг-мм-дд чч:мм:сс" value="{{ old('dateTime') }}"></input>
          @error('dateTime')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>      
        
        <button class="btn btn-dark" type="submit">Добавить</button>
      </form>
    </div>
</div>
  
@endsection