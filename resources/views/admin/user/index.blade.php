@extends('layout.layout')

@section('title', 'Пользователи')

@section('content')
<div class="row mt-4 px-3">
    <div class="col-md-12 mt-4">
      <h2>Пользователи</h2>

      <button class="btn btn-dark mt-2">
        <a class="text-white" href="{{ route('admin.users.create') }}">Добавить нового пользователя</a>
      </button>

      <div class="mt-4 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Имя</th>
              <th scope="col">Email</th>
              <th scope="col">Верификация email</th>
              <th scope="col">Права</th>
              <th scope="col">Редактировать</th>
              <th scope="col">Заблокировать</th>
              <th scope="col">Удалить</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <th scope="row">{{ $user->id }}</th>
                <td class="text-decoration-underline" style="cursor: pointer;">
                    <a href="{{ route('admin.users.show', [$user->id]) }}">
                      {{ $user->name }} 
                    </a>
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->email_verified_at }}</td>
                <td>
                  {{ $user->role }}
                  {{ $user->status }}
                </td>
                <td>
                  <button class="btn btn-dark">
                    <a class="text-white" href="{{ route('admin.users.edit', $user->id) }}">
                      edit
                    </a>
                  </button>
                </td>
                <td>
                  <form action="{{ route('admin.users.block', $user->id) }}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-danger" value="block"></input>
                  </form>
                </td>
                <td>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                  @csrf
                  @method("DELETE")
                  <input type="submit" class="btn btn-danger" value="delete"></input>
                </form>
                </td>
              </tr>  
            @endforeach
          </tbody>
        </table>

        {{ $users->links() }}
      </div>
    </div>
</div>
  
@endsection