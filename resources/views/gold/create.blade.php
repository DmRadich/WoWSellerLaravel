@extends('layouts.app')

@section('content')
    <div>
        <form action="{{ route('golds.store') }}" method="post">
            @csrf
{{--            Your Offer          --}}
            <div class="container mt-2 col-md-5 text-lg-left">
                <h2 class="fw-bold">{{ __('Your Offer') }}</h2>
                @auth
                    @if($golds->isEmpty())
                        <p class="text-muted">{{ __('You have no offers yet') }}</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('Server') }}</th>
                                <th scope="col">{{ __('Fraction') }}</th>
                                <th scope="col">{{ __('Price/1000') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($golds as $gold)
                                @if(auth()->id() === $gold->seller_id)
                                    <tr>
                                        <td>{{ $gold->server->name }}</td>
                                        <td>{{ $gold->faction->faction_name }}</td>
                                        <td>{{ $gold->price }}</td>
                                        <td>
                                            <a href="{{ route('golds.edit', $gold) }}" class="btn btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                @endauth

{{--                New Offer           --}}
                <h2 class="fw-bold">{{ __('New Offer') }}</h2>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <label for="server">{{ __('Server') }}</label>
                    <select class="form-control" id="server" name="server_id">
                        <option selected>{{ __('Server') }}</option>
                        @foreach($servers as $id => $name)
                            <option
                                {{ old('server_id') == $id ? 'selected' : ''}} value="{{ $id }}">
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('server_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                    <label for="faction">{{ __('Faction') }}</label>
                    <select class="form-control" name="faction_id" id="faction">
                        <option selected>{{ __('Faction') }}</option>
                        @foreach($factions as $id => $faction_name)
                            <option
                                {{ old('faction_id') == $id ? 'selected' : '' }} value="{{ $id }}">
                                {{ $faction_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('faction_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2 mt-3">
                    <label for="price">{{ __('Price/1000') }}</label>
                    <input value="{{old('price')}}" class="form-control price" type="text"
                           inputmode="decimal"
                           name="price" id="price">
                    @error('price')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 mt-2">Save</button>
            </div>
        </form>
    </div>
@endsection
