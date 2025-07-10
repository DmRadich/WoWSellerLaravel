<?php

namespace App\Http\Controllers\Gold;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gold\StoreRequest;
use App\Models\Gold;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['seller_id'] = auth()->id();

        $gold = Gold::create($data);

        return redirect()->route('golds.create');
    }
}
