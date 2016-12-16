<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenusController extends Controller
{

    public function loadMenus()
    {
        if (session('isLoggedIn') == false) {
            return redirect('/');
        } else {
            return view('menus', [
                'menus' => \App\Menus::whereUserId(session('user_id'))->get()
            ]);
        }
    }

    public function saveMenu()
    {
        $validator = \Validator::make($_POST, [
            'menuName' => 'required',
        ], [
            'menuName.required' => 'Please enter a name for the menu.',
        ]);

        if ($validator->fails()) {
            return redirect('/home/')
                ->with('form', 'menuError')
                ->withErrors($validator)
                ->withInput();
        } else {
            $menus = new \App\Menus;
            $menus->user_id = session('user_id');
            $menus->name = $_POST['menuName'];
            $menus->mainMondayUrl = $_POST['mainMondayUrl'];
            $menus->mainMondayMetadataLinkTitle = $_POST('mainMondayMetadataLinkTitle');
            $menus->mainMondayMetadataLinkDescription = $_SESSION('mainMondayMetadataLinkDescription');
            $menus->mainMondayNote = $_SESSION('mainMondayNote');
            $menus->mainMondayImageUrl = $_SESSION('mainMondayImageUrl');
            $menus->save();

            return redirect('/menus/');
        }
    }
}
