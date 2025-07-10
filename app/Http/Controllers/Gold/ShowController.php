<?php

namespace App\Http\Controllers\Gold;

use App\Http\Controllers\Controller;
use App\Models\Gold;
use Illuminate\Http\Request;

class ShowController extends Controller
{

    public function __invoke(Gold $gold)
    {

        return view('gold.show', compact('gold'));
    }
}
