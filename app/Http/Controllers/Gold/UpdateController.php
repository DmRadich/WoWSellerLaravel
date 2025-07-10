<?php

namespace App\Http\Controllers\Gold;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gold\UpdateRequest;
use App\Models\Gold;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Gold $gold, UpdateRequest $request)
    {
        $data = $request->validated();
        $golds = $gold->update($data);

        return redirect()->route('golds.create', $golds);
    }
}
