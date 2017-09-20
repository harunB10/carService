<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PomocniController extends Controller
{
    public function test()
    {

        return view('loginMehanicar');
    }

    public function test2()
    {
        if (Auth::user()->isMechanic == 1) {
            return redirect()->route('mehanicar');
        }
    }
}
