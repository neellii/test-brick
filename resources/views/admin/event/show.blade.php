@extends('layout.layout')

@section('title', 'Мероприятия')

@section('content')
<div class="row mt-4 px-3">
    <div class="col-md-12 mt-4">
      <h2>Мероприятие ID {{ $event->id }}</h2>

      <div class="mt-4 table-responsive">
        <table class="table table-striped">
          <tbody>
              <tr>
                <th scope="row">Название</th>
                <td>
                    {{ $event->name }}
                </td>
              </tr> 

              <tr>
                <th scope="row">Описание</th>
                <td>
                    {{ $event->description }}
                </td>
              </tr> 

              <tr>
                <th scope="row">Категории</th>
                <td> |
                  @foreach ($event->categories as $category)
                    <a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->category }}</a> |
                  @endforeach
                </td>
              </tr> 

              <tr>
                <th scope="row">Дата проведения</th>
                <td>
                    {{ $event->dateTime }}
                </td>
              </tr> 

              <tr>
                <th scope="row">Статус</th>
                <td>
                    {{ $event->status }}
                </td>
              </tr> 

              <tr>
                <th scope="row">Создан</th>
                <td>
                    {{ $event->created_at }}
                </td>
              </tr>

              <tr>
                <th scope="row">Обновлен</th>
                <td>
                    {{ $event->updated_at }}
                </td>
              </tr>

              <tr>
                <th scope="row">Записавшиеся пользователи</th>
                <td>
                  @foreach ($event->users as $user)
                    <a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a>, 
                  @endforeach
                </td>
              </tr>
          </tbody>
        </table>

        <div class="mt-5 d-flex">
          <a class="btn btn-dark me-5" href="{{ route('admin.events.edit', $event->id) }}">Редактировать</a>

          <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <input type="submit" class="btn btn-danger" value="Удалить"></input>
          </form>
        </div>
      </div>
    </div>
</div>
  
@endsection