<?php

namespace App\Http\Controllers\Gold;

use App\Http\Controllers\Controller;
use App\Http\Filters\GoldFilter;
use App\Http\Requests\Gold\FilterRequest;
use App\Http\Requests\Gold\StoreRequest;
use App\Http\Requests\Gold\UpdateRequest;
use App\Models\Faction;
use App\Models\Gold;
use App\Models\Server;
use Illuminate\Http\Request;

class GoldController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(FilterRequest $request)
    {
            $data = $request->validated();

            $filter = app()->make(GoldFilter::class, ['queryParams' => array_filter($data)]);
            $golds = Gold::with(['server', 'faction', 'seller'])->filter($filter)->paginate(10);
            $goldsCount = $golds->total();
            $servers = Server::pluck('name', 'id');
            $factions = Faction::pluck('faction_name', 'id');


            return view('gold.index', compact('golds', 'servers', 'factions', 'goldsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $golds = Gold::with(['server', 'faction', 'seller'])->where('seller_id', auth()->id())->latest()->get();

        $servers = Server::pluck('name', 'id');
        $factions = Faction::pluck('faction_name', 'id');

        return view('gold.create', compact('golds', 'servers', 'factions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['seller_id'] = auth()->id();

        $gold = Gold::create($data);

        return redirect()->route('golds.create', $gold);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gold $gold)
    {
        return view('gold.show', compact('gold'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gold $gold)
    {
        if ($gold->seller_id !== auth()->id()) {
            abort(403);
        }

        $servers = Server::pluck('name', 'id');
        $factions = Faction::pluck('faction_name', 'id');

        return view('gold.edit', compact('gold', 'servers', 'factions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Gold $gold)
    {
        if ($gold->seller_id !== auth()->id()) {
            abort(403);
        }

        $data = $request->validated();
        $gold->update($data);
        return redirect()->route('golds.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gold $gold)
    {
        if ($gold->seller_id !== auth()->id()) {
            abort(403);
        }

        $gold->delete();

        return redirect()->route('golds.index');
    }
}
