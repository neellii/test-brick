@extends('layout.layout')

@section('title', 'Мероприятия')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endsection

@section('content')
<div class="row mt-4 px-3">
    <div class="col-md-12 p-2">
      <h2>Редактировать мероприятие</h2>

      <form action="{{ route('admin.events.update', $event->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-3">
          <label for="name" class="form-label">Название</label>
          <input name="name" type="text" class="form-control @error('name')
            is-invalid
          @enderror" id="name" placeholder="название" value="{{ $event->name ?? old('name') }}"></input>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Описание</label>
          <input name="description" type="text" class="form-control @error('description')
            is-invalid
          @enderror" id="description" placeholder="описание" value="{{ $event->description ?? old('description') }}"></input>
          @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div> 

        <div class="mb-3">
        <label for="multiple-select-field">Категории</label>
        <select name="categories[]" class="form-select  @error('categories')
            is-invalid
          @enderror" id="multiple-select-field" multiple="multiple" data-placeholder="Категории">
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" 
              @if (in_array($category->id, $event->categories->pluck('id')->toArray()))
                selected
              @endif
              >{{ $category->category }}</option>
            @endforeach
          </select>
          @error('categories')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div> 

        <div class="mb-3">
          <label for="dateTime" class="form-label">Дата проведения в формате год-месяц-день часы:минуты:секунды</label>
          <input name="dateTime" type="text" class="form-control @error('dateTime')
            is-invalid
          @enderror" id="dateTime" placeholder="название" value="{{ $event->dateTime ?? old('dateTime') }}"></input>
          @error('dateTime')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>  
        
        <div class="mb-3">
          <select name="status" class="form-select  @error('status')
            is-invalid
          @enderror" aria-label="Default select example">
            <option disabled>Статус</option>
            <option value="1" 
            @if ($event->status === 1)
              selected
            @endif
            >Активно</option>
            <option value="0"
            @if ($event->status === 0)
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

@section('scripts')
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script>
  $( '#multiple-select-field' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
} );
</script>
@endsection