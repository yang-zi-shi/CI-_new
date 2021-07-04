<?php

namespace App\Models;

use CodeIgniter\Model;

class c_orderModel extends Model
{
    protected $table         = 'c_order';
    protected $allowedFields = [
        '使用者','商品名稱', '數量', '總價'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}