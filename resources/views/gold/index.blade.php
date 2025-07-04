@extends('layouts.app')

@section('content')
    <div>
        <div class="container mt-2 col-md-5 text-lg-left">
            <h2>World of Warcraft Gold</h2>
            <p class="text-left" style="color: gray">
                Need to throw a few coins in gearing up with BoEs and crafting? Wanna
                stack up flasks before the new content? You can buy WoW gold on WoWSeller directly from players and forget
                about the boring grind.
            </p>
            <div class="counter-list counter-list-pills">
                <a href="{{ route('golds.index') }}" class="counter-item {{ request()->routeIs('golds.index') ? 'active' : '' }}">{{ __('Gold') }}</a>
                <a href="#" class="counter-item">{{ __('Gearing') }}</a>
                <a href="#" class="counter-item">{{ __('Boosting') }}</a>
            </div>
            <div class="mt-3">
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <select class="form-select w-auto" name="server">
                        <option selected>Server</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="form-select w-auto" name="side">
                        <option selected>Faction</option>
                        <option value="1">Alliance</option>
                        <option value="2">Horde</option>
                    </select>
                        <a href="{{ route('golds.create') }}" class="btn btn-default btn-wide ms-auto">Sell game currency</a>
                </div>
            </div>


        </div>
        <div class="container mt-2 col-md-5 text-lg-left">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{ __('Serve') }}</th>
                    <th scope="col">{{ __('Fraction') }}</th>
                    <th scope="col">{{ __('Seller') }}</th>
                    <th scope="col">{{ __('Price/1000') }}</th>
                </tr>
                </thead>
            </table>
            <div class="tc-header">
                <a href="#">Купить</a>
            </div>
        </div>
    </div>

@endsection
