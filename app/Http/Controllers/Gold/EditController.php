<?php

namespace App\Http\Controllers\Gold;

use App\Http\Controllers\Controller;
use App\Models\Faction;
use App\Models\Gold;
use App\Models\Server;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Gold $gold)
    {
        $servers = Server::all();
        $factions = Faction::all();

        return view('gold.edit', compact('gold', 'servers', 'factions'));
    }
}
