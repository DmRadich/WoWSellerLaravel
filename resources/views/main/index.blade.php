@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-lg-center">
            <div class="col-4">
                <a href="{{ route('golds.index') }}" class="text-decoration-none text-dark">{{ __('Золото') }}</a>
            </div>
            <div class="col-4">
                <a href="#" class="text-decoration-none text-dark">{{ __('Экипировка') }}</a>
            </div>
            <div class="col-4">
                <a href="#" class="text-decoration-none text-dark">{{ __('Прокачка') }}</a>
            </div>

        </div>
    </div>
@endsection
