<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Gold;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GoldController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:sanctum')->except(['index', 'show']);
//    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Gold::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'server_id' => 'required|exists:servers,id',
            'faction_id' => 'required|exists:factions,id',
            'price' => 'required', 'numeric', 'min:0.01',
        ]);

        $gold = $request->user()->golds()->create($data);

        return ['data' => $gold];
    }

    /**
     * Display the specified resource.
     */
    public function show(Gold $gold)
    {
        return ['data' => $gold];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gold $gold)
    {
        Gate::authorize('modify', $gold);

        $data = $request->validate([
            'server_id' => 'required|exists:servers,id',
            'faction_id' => 'required|exists:factions,id',
            'price' => 'required', 'numeric', 'min:0.01',
        ]);

        $gold->update($data);

        return ['data' => $gold];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gold $gold)
    {
        Gate::authorize('modify', $gold);

        $gold->delete();

        return [
            'message' => 'This lot was deleted'
        ];
    }
}
