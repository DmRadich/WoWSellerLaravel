<?php

namespace App\Http\Controllers\Gold;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gold\FilterRequest;
use App\Models\Faction;
use App\Models\Gold;
use App\Models\Server;

class IndexController extends Controller
{
    public function __invoke()
    {
        $golds = Gold::query()->paginate(5);
        $goldsCount = Gold::count();
        $servers = Server::all();
        $factions = Faction::all();

        return view('gold.index', ['goldsCount' => $goldsCount], compact('golds', 'servers', 'factions'));
    }
}
