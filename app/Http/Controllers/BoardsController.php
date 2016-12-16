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
                'boards' => \App\Boards::whereUserId(session('user_id'))->get()
            ]);
        }
    }

    public function loadSettings()
    {
        if (session('isLoggedIn') == false) {
            return redirect('/');
        } else {
            return view('settings', [
                'boards' => \App\Boards::whereUserId(session('user_id'))->get()
            ]);
        }
    }

    public function saveBoard()
    {
        $validator = \Validator::make($_POST, [
            'boardName' => 'required',
            'boardId' => 'required'
        ], [
            'boardName.required' => 'Please enter a name for the board.',
            'boardId.required' => 'Please enter a board ID.'
        ]);

        if ($validator->fails()) {
            return redirect('/assignment3/home.php')
                ->with('form', 'boardError')
                ->withErrors($validator)
                ->withInput();
        } else {
            $boards = new \App\Boards;
            $boards->user_id = session('user_id');
            $boards->name = $_POST['boardName'];
            $boards->board_id = $_POST['boardId'];
            $boards->save();

            return redirect('/home/');
        }
    }

    public function deleteBoard()
    {
        /*$boards = \App\Boards::whereBoardId($_POST('board_id'))->get()
        $boards->delete();

        return redirect('/settings/')*/
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
