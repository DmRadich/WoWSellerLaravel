@extends('layouts.app')
@section('content')
    <div class="container n mt-2 col-md-3 text-lg-left">
        <div>
            <a href="{{ route('golds.index') }}">Back</a>
        </div>
        <div class="page-content">
            <h1 class="text-lg-center page-header">World of Warcraft Gold</h1>
            <div class="param-list">
                <div class="row">
                    <div class="col-xs-2">
                        <div class="param-item">
                            <h5>Server</h5>
                            <div class="text-bold">
                                {{ $gold->server->name }}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="param-item text-lg-end">
                            <h5>Faction</h5>
                            <div class="text-bold">
                                {{ $gold->faction->faction_name }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="param-item">
                    <h5>
                        Price/1000
                    </h5>
                    <div class="text-bold">
                        {{ $gold->price}}
                    </div>
                </div>

                <form action="#" method="post" class="mb-1">
{{--                    <div class="form-group">--}}
{{--                        <label for="#" class="control-label payment-method"> Способ оплаты--}}
{{--                            <span class="text-lg-center">за 1000 ед.</span>--}}
{{--                        </label>--}}
{{--                    </div>--}}
                    <div class="row form-group-swap offer-calc-box">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label class="control-label payment-method">
                                    {{ __('To be received') }}
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
                                <label class="control-label">{{ __('To be paid') }}</label>
                                <input type="text" class="form-control" name="sum" inputmode="decimal"
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{ __('Character name') }}</label>
                            <input type="text" class="form-control" name="player">
                        </div>
                    </div>
                    <div class="form-group">
                        @auth
                            @if(auth()->id() === $gold->seller_id)
                                <a href="{{ route('golds.edit', $gold->id) }}" class="btn btn-secondary btn-block">
                                    Edit an offer
                                </a>
                            @else
                                <button type="submit" class="btn btn-primary btn-block">
                                    Buy
                                </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-block">
                                Buy
                            </a>
                        @endauth
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
