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

    public function enterEmail()
    {
        return view('security');
    }

    public function checkEmail()
    {
        $validator = \Validator::make($_POST, [
            'email' => 'required|email_exists',
        ], [
            'email.required' => 'Please Enter a Email.',
            'email_exists' => 'Email entered does not exists. Please Register.'
        ]);

        if ($validator->fails()) {
            return redirect('/security/')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = \App\Users::whereEmail($_POST['email'])->first();
            $userQuestion = $user['security_question'];
            session([
                'emailExists' => true,
                'email' => $_POST['email'],
                'question' => $userQuestion
            ]);
            return redirect('/security/test/');
        };
    }

    public function securityTest()
    {
        if (session('emailExists') == false) {
            return redirect('/security/');
        } else {
            return view('securityTest');
        }
    }

    public function securityCheck()
    {
        $validator = \Validator::make($_POST, [
            'answer' => 'required|answer_correct',
        ], [
            'answer.required' => 'Please Enter a Answer.',
            'answer_correct' => 'Sorry but that is not the right answer.'
        ]);

        if ($validator->fails()) {
            return redirect('/security/test/')
                ->withErrors($validator)
                ->withInput();
        } else {
            session([
                'securityPassed' => true,
            ]);
            return redirect('/reset/');
        };
    }

    public function resetPassword()
    {
        if (session('securityPassed') == false) {
            return redirect('/security/test/');
        } else {
            return view('reset');
        }
    }

    public function passwordUpdate(Request $request)
    {
        $validator = \Validator::make($_POST, [
            'password' => 'required|confirmed|min:8|regex:@^.*(?=.*\W)(?=.*[a-z])(?=.*[A-Z]).*$@',
        ], [
            'password.min' => 'Your password must be at least 8 characters long.',
            'password.regex' => 'Your password is not complex enough.',
            'password.confirmed' => "Your passwords don't match"
        ]);

        if ($validator->fails()) {
            return redirect('/reset/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // save new user password
            $users = \App\Users::whereEmail(session('email'))->first();
            $users->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $users->save();

            //destory session data
            $request->session()->flush();

            return redirect('/');
        };
    }
}
