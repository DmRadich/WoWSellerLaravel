@extends('layouts.app')

@section('content')
    <div class="container mt-2 col-md-5 text-lg-left">
        <div class="profile-cover">
            <div class="avatar">
                <div>
                    <img class="avatar-photo" src="{{ asset('img/layout/avatar.png') }}" alt="Аватар">
                </div>
            </div>
        </div>
        <div class="profile">
            <h1 class="mb-4">
                <span>{{ $user->name }}</span>
                <span class="media-user-status ms-2">
                    @if ($user->isOnline())
                        <span class="online">
                        Онлайн
                    </span>
                    @else
                        <span class="offline">
                        Был {{ $user->last_seen_at ? $user->last_seen_at->translatedFormat('d F в H:i') : '' }}
                    </span>
                    @endif
                </span>
            </h1>
        </div>
        <div class="profile-header-cols">
            <div class="param-item">
                <h5 class="text-bold">
                    Дата регистрации
                </h5>
                <div class="text-nowrap">
                    {{ $create = $user->created_at->translatedFormat('d F Y, H:i') }}
                </div>
            </div>
        </div>
    </div>
@endsection
