@extends('layouts.app')
@section('content')
    <div class="container n mt-2 col-md-3 text-lg-left">
        <div>
            <a href="{{ route('golds.index') }}">Back</a>
        </div>
        <div class="page-content">
            <h1 class="text-lg-center">Gold World of Warcraft</h1>
            <div class="param-list">
                <div class="row">
                    <div class="col-xs-2">
                        <div class="param-item">
                            <h5>Сервер</h5>
                            <div class="text-bold">
                                {{ $gold->server->name }}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="param-item text-lg-end">
                            <h5>Сторона</h5>
                            <div class="text-bold">
                                {{ $gold->faction->faction_name }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="param-item">
                    <h5>
                        Наличие
                    </h5>
                    <div class="text-bold">
                        {{ $gold->price}}
                    </div>
                </div>

                <form action="#" method="post" class="mb-1">
                    <div class="form-group">
                        <label for="#" class="control-label payment-method"> Способ оплаты
                            <span class="text-lg-center">за 1000 ед.</span>
                        </label>
                    </div>
                    <div class="row form-group-swap offer-calc-box">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label class="control-label payment-method">
                                    Получу
                                </label>
                                <input type="text" class="form-control" name="amount" inputmode="decimal"
                                       autocomplete="off" value>
                            </div>
                        </div>
                        <div class="swap-btn">
                            <i class="fa-solid fa-right-left">

                            </i>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group has-feedback">
                                <label class="control-label">Заплачу</label>
                                <input type="text" class="form-control" name="sum" inputmode="decimal"
                                       autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        @auth
                            <button type="submit" class="btn btn-primary btn-block">Купить</button>
                        @endauth

                        @guest
                            <a href="{{ route('login') }}" class="btn btn-primary btn-block">Купить</a>
                        @endguest
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
