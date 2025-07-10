@extends('layouts.app')

@section('content')
    <div>
        <form action="{{ route('golds.update', $gold->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="container mt-2 col-md-5 text-lg-left">
                <h2 class="fw-bold">{{ __('Edit Offer') }}</h2>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <label for="server">{{ __('Server') }}</label>
                    <select class="form-control" id="server" name="server_id">
                        @foreach($servers as $server)
                            <option
                                    {{ old('server_id', $gold->server_id) == $server->id ? 'selected' : ''}} value="{{ $server->id }}">
                                {{ $server->name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="faction">{{ __('Faction') }}</label>
                    <select class="form-control" name="faction_id" id="faction">
                        @foreach($factions as $faction)
                            <option
                                    {{ old('faction_id', $gold->faction_id) == $faction->id ? 'selected' : '' }} value="{{ $faction->id }}">
                                {{ $faction->faction_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2 mt-3">
                    <label for="price">{{ __('Price/1000') }}</label>
                    <input value="{{old('price', $gold->price)}}" class="form-control price" type="text"
                           inputmode="decimal"
                           name="price" id="price">
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 mt-2">Update</button>
            </div>
        </form>
    </div>
@endsection
