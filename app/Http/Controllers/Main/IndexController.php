<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Gold;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        $gold = Gold::first();

        return view('main.index');
    }
}
