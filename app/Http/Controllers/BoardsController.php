<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;


class BoardsController extends Controller
{
    public function loadMain()
    {
        if (session('isLoggedIn') == false) {
            return redirect('/');
        } else {
            return view('home', [
                'boards' => \App\Boards::whereUserId(session('user_id'))->get(),
                'dishs' => ['main', 'side'],
                'days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                'datas' => ['Url', 'MetadataLinkTitle', 'MetadataLinkDescription', 'Note', 'ImageUrl'],
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
        $deleted_board = \App\Boards::whereId($_GET['id'])->delete();

        return redirect('/settings/');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
