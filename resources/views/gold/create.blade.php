@extends('layouts.app')

@section('content')
    <div>
        <form action="{{ route('golds.store') }}" method="post">
            @csrf
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
                <h2 class="fw-bold">{{ __('New Offer') }}</h2>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <label for="server">{{ __('Server') }}</label>
                    <select class="form-control" id="server" name="server_id">
                        <option selected>{{ __('Server') }}</option>
                        @foreach($servers as $server)
                            <option
                                {{ old('server') == $server->id ? 'selected' : ''}} value="{{ $server->id }}">
                                {{ $server->name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="faction">{{ __('Faction') }}</label>
                    <select class="form-control" name="faction_id" id="faction">
                        <option selected>{{ __('Faction') }}</option>
                        @foreach($factions as $faction)
                            <option
                                {{ old('faction') == $faction->id ? 'selected' : '' }} value="{{ $faction->id }}">
                                {{ $faction->faction_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2 mt-3">
                    <label for="price">{{ __('Price/1000') }}</label>
                    <input value="{{old('price')}}" class="form-control price" type="text"
                           inputmode="decimal"
                           name="price" id="price">
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 mt-2">Save</button>
            </div>
        </form>
    </div>
@endsection

{{--        <form action="{{ route('golds.delete', $gold->id) }}" method="POST">--}}
{{--            @csrf--}}
{{--            @method('DELETE')--}}
{{--            <input type="submit" value="Delete" class="btn btn-danger">--}}
{{--        </form>--}}
