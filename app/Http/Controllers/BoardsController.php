<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoardsController extends Controller
{
    public function loadMain()
    {
        if (session('isLoggedIn') == false) {
            return redirect('/');
        } else {
            return view('home', [
                'boards' => \App\Boards::whereUserId(session('id'))->get()
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
