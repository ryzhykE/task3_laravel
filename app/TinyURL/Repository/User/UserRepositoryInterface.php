<?php

namespace TinyURL\Repository\User;

interface UserRepositoryInterface
{
    public function create($name,$email,$pass);
}