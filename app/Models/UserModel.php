<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // protected $DBGroup = 'userdata';
    protected $table         = 'test';
    protected $allowedFields = [
        'username', 'email', 'password', 'address', 'phone', 'IDcard'
    ];

    protected $useTimestamps = true;

    protected $returnType = 'App\Entities\User';
    // protected $useSoftDeletes = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';
    protected $validationRules    = [
        'username' => 'required|min_length[3]|max_length[255]',
        'email'        => 'required|valid_email|is_unique[test.email]',
        'password'     => 'required|min_length[8]',
        'matchpassword' => 'required|matches[password]',
        'phone' => 'required|min_length[10]',
        'IDcard' => 'required|min_length[10]|alpha_numeric',
    ];
    protected $validationMessages = [
        'email'        => [
            'is_unique' => '已註冊過',
            'valid_email' => '電子郵件格式不符合'
        ],
        'IDcard'        => [
            'alpha_numeric' => '身分證格式不符'
        ],
        'matchpassword' =>[
            'required' => '兩次密碼輸入不同'
        ],
        'password' =>[
            'required' => '密碼請再次確認'
        ]
    ];
    protected $skipValidation = false;
}
