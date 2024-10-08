@extends('layout.layout')

@section('title', 'Категории')

@section('content')
<div class="row mt-4 px-3">
    <div class="col-md-12 mt-4">
      <h2>Категории</h2>

      <button class="btn btn-dark mt-2">
        <a class="text-white" href="{{ route('admin.categories.create') }}">Добавить новую категорию</a>
      </button>

      <div class="mt-4 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Название</th>
              <th scope="col">Статус</th>
              <th scope="col">Редактировать</th>
              <th scope="col">Удалить</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
              <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>
                  <a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->category }} </a>
                </td>
                <td>{{ $category->status }}</td>
                <td>
                  <button class="btn btn-dark">
                    <a class="text-white" href="{{ route('admin.categories.edit', $category->id) }}">
                      edit
                    </a>
                  </button>
                </td>
                <td>
                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                  @csrf
                  @method("DELETE")
                  <input type="submit" class="btn btn-danger" value="delete"></input>
                </form>
                </td>
              </tr>  
            @endforeach
          </tbody>
        </table>

        {{ $categories->links() }}
      </div>
    </div>
</div>
  
@endsection