@extends('layout.layout')

@section('title', 'Пользователи')

@section('content')
<div class="row mt-4 px-3">
    <div class="col-md-12 mt-4">
      <h2>Пользователь ID {{ $user->id }}</h2>

      <div class="mt-4 table-responsive">
        <table class="table table-striped">
          <tbody>
              <tr>
                <th scope="row">Имя</th>
                <td>
                    {{ $user->name }}
                </td>
              </tr> 

              <tr>
                <th scope="row">Email</th>
                <td>
                    {{ $user->email }}
                </td>
              </tr> 

              <tr>
                <th scope="row">Права</th>
                <td>
                    {{ $user->role }}
                </td>
              </tr> 

              <tr>
                <th scope="row">Верификация почты</th>
                <td>
                    {{ $user->email_verified_at }}
                </td>
              </tr> 

              <tr>
                <th scope="row">Создан</th>
                <td>
                    {{ $user->created_at }}
                </td>
              </tr>

              <tr>
                <th scope="row">Обновлен</th>
                <td>
                    {{ $user->updated_at }}
                </td>
              </tr>
          </tbody>
        </table>

        <div class="mt-5 d-flex">
          <a class="btn btn-dark me-5" href="{{ route('admin.users.edit', $user->id) }}">Редактировать</a>

          <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <input type="submit" class="btn btn-danger" value="Удалить"></input>
          </form>
        </div>
      </div>
    </div>
</div>
  
@endsection