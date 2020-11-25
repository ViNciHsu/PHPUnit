<?php

namespace App\Models;

class User
{
    public $user;

    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }
}