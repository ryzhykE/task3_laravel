<?php

class AuthController extends BaseController
{
    protected $userRepo;
    protected $auth;

    public function __construct(\TinyURL\Repository\User\DbUserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getLogin()
    {
        if(\Auth::id() == null)
        {
            return View::make('auth.login');
        }
        return Redirect::to('/');
    }

    public function postLogin()
    {
        $data = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
            );
        $validator = Validator::make($data,
            [
                'email'                 => 'required|email|exists:users',
                'password'              => 'required|min:6|max:20'
            ],
            [
                'email.required'        => 'Email is required',
                'email.exists'          => 'Login does not exist',
                'email.email'           => 'Email is invalid',
                'password.required'     => 'Password is required',
                'password.min'          => 'Password needs to have at least 6 characters',
                'password.max'          => 'Password maximum length is 20 characters',
            ]
        );
        if($validator->fails())
        {
            return Redirect::to('auth/login')->withErrors($validator);
        } else
        {
            if (Auth::attempt($data))
            {
                return Redirect::intended('/');
            }
            return Redirect::to('auth/login');
        }

    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function getRegister()
    {
        return View::make('auth.register');
    }

    public function postRegister()
    {
        $data = array(
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'password_confirmation' => Input::get('password_confirmation'),

        );
        $validator = Validator::make($data,
            [
                'name'                  => 'required',
                'email'                 => 'required|email|unique:users',
                'password'              => 'required|min:6|max:20',
                'password_confirmation' => 'required|same:password',
            ],
            [
                'name.required'                  => 'Name is required',
                'email.required'                 => 'Email is required',
                'email.unique'                   => 'Email is exist',
                'email.email'                    => 'Email is invalid',
                'password.required'              => 'Password is required',
                'password.min'                   => 'Password needs to have at least 6 characters',
                'password.max'                   => 'Password maximum length is 20 characters',
                'password_confirmation.required' => 'Confirm Password is required',
                'password_confirmation.same'     => 'Password must match',
            ]
        );
        if($validator->fails())
        {
            return Redirect::to('auth/register')->withErrors($validator);
        } else
        {
            //dd($data['name']);
            $this->userRepo->create($data['name'],$data['email'],$data['password']);
            if (Auth::attempt($data))
            {
                return Redirect::intended('/');
            }
        }

    }
}

