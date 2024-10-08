@extends('layout.layout')

@section('title', 'Категории')

@section('content')
<div class="row mt-4 px-3">
    <div class="col-md-12 mt-4">
      <h2>Мероприятие ID {{ $category->id }}</h2>

      <div class="mt-4 table-responsive">
        <table class="table table-striped">
          <tbody>
              <tr>
                <th scope="row">Название</th>
                <td>
                    {{ $category->category }}
                </td>
              </tr> 

              <tr>
                <th scope="row">Статус</th>
                <td>
                    {{ $category->status }}
                </td>
              </tr> 

              <tr>
                <th scope="row">Мероприятия</th>
                <td>
                  @foreach ($category->events as $event)
                    <a href="{{ route('admin.events.show', $event->id) }}">{{ $event->name }}</a>, 
                  @endforeach
                </td>
              </tr>

              <tr>
                <th scope="row">Создан</th>
                <td>
                    {{ $category->created_at }}
                </td>
              </tr>

              <tr>
                <th scope="row">Обновлен</th>
                <td>
                    {{ $category->updated_at }}
                </td>
              </tr>
          </tbody>
        </table>

        <div class="mt-5 d-flex">
          <a class="btn btn-dark me-5" href="{{ route('admin.categories.edit', $category->id) }}">Редактировать</a>

          <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <input type="submit" class="btn btn-danger" value="Удалить"></input>
          </form>
        </div>
      </div>
    </div>
</div>
  
@endsection