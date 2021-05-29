<?php

namespace App\Entities;

use CodeIgniter\Entity;

class User extends Entity
{
    protected $attributes = [

        'username' => null,        // Represents a username
        'email' => null,
        'password' => null,
        'address' => null,
        'IDcard' => null,
        'created_at' => null,
        'updated_at' => null,
    ];
    public function setPassword(string $pass)
    {
        $this->attributes['password'] = password_hash($pass, PASSWORD_BCRYPT);

        return $this;
    }
}
