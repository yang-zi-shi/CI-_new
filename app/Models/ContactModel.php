<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table         = 'feedback';
    protected $allowedFields = [
        'username', 'email', 'subject', 'message'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $validationRules    = [
        'username' => 'required|min_length[3]|max_length[255]',
        'email'        => 'required',
        'message '=> 'required|min_length[10]|max_length[255]',
     ];
    //  protected $validationMessages = [
    //      'email'=> ['valid_email' => '電子郵件格式不符合'],
    //     ];
     protected $skipValidation = false;
}
