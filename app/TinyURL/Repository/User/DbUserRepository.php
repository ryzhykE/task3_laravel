<?php

namespace TinyURL\Repository\User;

use Illuminate\Support\Facades\Hash;

class DbUserRepository implements UserRepositoryInterface
{

    protected $_model;

    public function __construct($model)
    {
        $this->_model = $model;
    }

    public function create($name,$email,$pass)
    {
        $link = $this->_model;
        $link->name = $name;
        $link->email = $email;
        $link->password = Hash::make($pass);
        $link->remember_token = str_random(64);
        $link->save();
        return $link->name;
    }
}