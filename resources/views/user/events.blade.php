@extends('layout.layout')

@section('title', 'Администрирование')

@section('content')
<div class="row mt-4 px-3">
  <h2>Мои записи</h2>

  <div class="mt-4 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Мероприятие</th>
              <th scope="col">Дата проведения</th>
              <th scope="col">Отписаться</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($events as $event)
              <tr>
                <td class="text-decoration-underline" style="cursor: pointer;">
                  <a href="{{ route('home', [$event->id]) }}">
                    {{ $event->name }} 
                  </a>
                </td>
                <td>{{ $event->dateTime }}</td>
                <td>
                  <form action="{{ route('user.events.subscribe', $event->id) }}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-dark" value="oтписаться"></input>
                  </form>
                </td>
              </tr>  
            @endforeach
          </tbody>
        </table>
    </div>
</div>
@endsection