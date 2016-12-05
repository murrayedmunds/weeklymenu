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

    public function saveBoard()
    {
        $validator = \Validator::make($_POST, [
            'board_name' => 'required',
            'board_id' => 'required'
        ], [
            'board_name.required' => 'Please enter a name for the board.',
            'board_id.required' => 'Please enter a board ID.'
        ]);

        if ($validator->fails()) {
            return redirect('/assignment3/main.php')
                ->withErrors($validator)
                ->withInput();
        } else {
            $boards = new \App\Boards;
            $boards->user_id = session('id');
            $boards->name = $_POST['board_name'];
            $boards->board_id = $_POST['board_id'];
            $boards->save();

            return redirect('/home/');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
