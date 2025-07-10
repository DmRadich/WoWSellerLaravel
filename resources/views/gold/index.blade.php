@extends('layouts.app')

@section('content')
    <div class="container mt-2 col-md-5 text-lg-left">
        <h2>World of Warcraft Gold</h2>
        <p class="text-left" style="color: gray">
            Need to throw a few coins in gearing up with BoEs and crafting? Wanna
            stack up flasks before the new content? You can buy WoW gold on WoWSeller directly from players and forget
            about the boring grind.
        </p>
        <div class="counter-list counter-list-pills">
            <a href="{{ route('golds.index') }}"
               class="counter-item {{ request()->routeIs('golds.index') ? 'active' : '' }}">
                <div class="inside">
                    <div class="counter-param">{{__('Gold')}}</div>
                    <div class="counter-value">{{ $goldsCount }}</div>
                </div>

            </a>
            <a href="#" class="counter-item">
                <div class="inside">
                    <div class="counter-param">{{ __('Gearing') }}</div>
                </div>
            </a>
            <a href="#" class="counter-item">
                <div class="inside">
                    <div class="counter-param">{{ __('Boosting') }}</div>
                </div>
            </a>
        </div>
        <div class="mt-3">
            <div class="d-flex flex-wrap align-items-center gap-2">
                <select class="form-select w-auto" name="server">
                    <option selected>Server</option>
                @foreach($servers as $server)
                        <option value="{{ $server->id }}">{{ $server->name }}</option>
                    @endforeach
                </select>

                <select class="form-select w-auto" name="side">
                    <option selected>Faction</option>
                    @foreach($factions as $faction)
                        <option value="{{ $faction->id }}">{{ $faction->faction_name }}</option>
                    @endforeach
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
            <tbody>
            @foreach($golds as $gold)
                <tr class="clickable-row" data-href="{{ route('golds.show', $gold) }}">
                    <td><a href="{{ route('golds.show', $gold) }}" class="tc-item">{{ $gold->server->name }}</a></td>
                    <td><a href="{{ route('golds.show', $gold) }}"
                           class="tc-item">{{ $gold->faction->faction_name }}</a></td>
                    <td><a href="{{ route('golds.show', $gold) }}" class="tc-item">{{ $gold->seller->name }}</a></td>
                    <td><a href="{{ route('golds.show', $gold) }}" class="tc-item">{{ $gold->price }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $golds->links() }}

    </div>
@endsection
