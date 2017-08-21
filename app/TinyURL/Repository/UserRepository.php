<?php

namespace TinyURL\Repository;

use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function create($name,$email,$pass)
    {
        $link = new \User();
        $link->name = $name;
        $link->email = $email;
        $link->password = $pass;
        $link->save();
        return $link->id;
    }
}