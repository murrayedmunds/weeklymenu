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
            $dishs = ['main', 'side'];
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            $datas = ['Url', 'MetadataLinkTitle', 'MetadataLinkDescription', 'Note', 'ImageUrl'];
            $menus = new \App\Menus;
            $menus->user_id = session('user_id');
            $menus->name = $_POST['menuName'];
            foreach ($dishs as $dish) {
                foreach ($days as $day) {
                    foreach ($datas as $data) {
                        $enter = $dish.$day.$data;
                        $menus->$enter = $_POST[$dish.$day.$data];
                    }
                }
            }
            $menus->save();
            return redirect('/menus/');
        }
    }
}
