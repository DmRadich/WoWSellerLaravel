@extends('layouts.app')

@section('content')
    <h1>Профиль пользователя: {{ $user->name }}</h1>

    @if($user->profile)
        <p>Онлайн: {{ $user->profile->is_online ? 'Да' : 'Нет' }}</p>
        <p>Аватар: <img src="{{ $user->profile->avatar_path }}" alt="Аватар"></p>
        <p>Дата регистрации: {{ $user->profile->registered_at }}</p>
    @else
        <p>Профиль не заполнен.</p>
    @endif
@endsection
