@extends('layout.layout')

@section('title', 'Мероприятия')

@section('content')
<div class="row mt-4 px-3">
    <div class="col-md-12 mt-4">
      <h2>Мероприятия</h2>

      <button class="btn btn-dark mt-2">
        <a class="text-white" href="{{ route('admin.events.create') }}">Добавить новое мероприятие</a>
      </button>

      <div class="mt-4 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Название</th>
              <th scope="col">Описание</th>
              <th scope="col">Дата проведения</th>
              <th scope="col">Редактировать</th>
              <th scope="col">Удалить</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($events as $event)
              <tr>
                <th scope="row">{{ $event->id }}</th>
                <td class="text-decoration-underline" style="cursor: pointer;">
                    <a href="{{ route('admin.events.show', [$event->id]) }}">
                      {{ $event->name }} 
                    </a>
                </td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->dateTime }}</td>
                <td>
                  <button class="btn btn-dark">
                    <a class="text-white" href="{{ route('admin.events.edit', $event->id) }}">
                      edit
                    </a>
                  </button>
                </td>
                <td>
                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST">
                  @csrf
                  @method("DELETE")
                  <input type="submit" class="btn btn-danger" value="delete"></input>
                </form>
                </td>
              </tr>  
            @endforeach
          </tbody>
        </table>

        {{ $events->links() }}
      </div>
    </div>
</div>
  
@endsection