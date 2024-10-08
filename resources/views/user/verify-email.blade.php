@extends('layout.layout')

@section('title', 'Верификация')

@section('content')
<div class="alert alert-info">
  Регистрация успешна. Ссылка для верификации email отправлена на указанную почту
</div>
<div>
  <form action="{{ route('verification.send') }}" method="post">
    @csrf
    <button type="submit" class="btn btn-link ps-0">Отправить ссылку снова</button>
  </form>
</div>
@endsection