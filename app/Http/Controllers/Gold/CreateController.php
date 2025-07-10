<?php

namespace App\Http\Controllers\Gold;

use App\Http\Controllers\Controller;
use App\Models\Faction;
use App\Models\Gold;
use App\Models\Server;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $golds = Gold::with(['server', 'faction', 'seller'])
            ->where('seller_id', auth()->id())
            ->latest()
            ->get();

        $servers = Server::all();
        $factions = Faction::all();


        return view('gold.create', compact('golds', 'servers', 'factions'));
    }
}
