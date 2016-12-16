<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function landing()
    {
        return view('login');
    }

    public function saveUser()
    {
        $validator = \Validator::make($_POST, [
            'name' => 'required|regex:@^[\w\-\s]+$@',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8|regex:@^.*(?=.*\W)(?=.*[a-z])(?=.*[A-Z]).*$@',
            'question' => 'required',
            'answer' => 'required',
            'privacy' => 'required'
        ], [
            'name.regex' => 'Name can only be Alphanumeric Characters!',
            'email.email' => 'Please Enter a valid email',
            'email.unique' => 'That email is already taken, please try another.',
            'password.min' => 'Your password must be at least 8 characters long.',
            'password.regex' => 'Your password is not complex enough.',
            'password.confirmed' => "Your passwords don't match",
            'privacy.required' => 'You must check that you have read and agree to privacy policy.'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->with('form', 'regError')
                ->withErrors($validator)
                ->withInput();
        } else {
            $users = new \App\Users;
            $users->name = $_POST['name'];
            $users->email = $_POST['email'];
            $users->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $users->security_question = $_POST['question'];
            $users->security_answer = password_hash($_POST['answer'], PASSWORD_DEFAULT);
            $users->save();
            return redirect('/');
        }
    }

    public function loginValid()
    {
        $validator = \Validator::make($_POST, [
            'email' => 'required|email_exists',
            'password' => 'required|valid_password'
        ], [
            'email.required' => 'Please Enter a Email.',
            'email_exists' => 'Email entered does not exists. Please Register first.',
            'password.required' => 'Please Enter a Password.',
            'valid_password' => 'Incorrect password, try again.'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->with('form', 'loginError')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = \App\Users::whereEmail($_POST['email'])->first();
            $userId = $user['id'];
            $userName = $user['name'];
            session([
                'isLoggedIn' => true,
                'user_id' => $userId,
                'email' => $_POST['email'],
                'name' => $userName
            ]);
            return redirect('home/');
        };
    }
}
