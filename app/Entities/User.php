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

    private function _saveToSession($user)
    {
        $session = session();
        $session->set('user', $user);
 
    }
    //如果登入要做什麼
    public function isLogin()
    {
        $session = session();
        return $session->has('user');
    }
    //存取已登入用戶sessioin
    public function getCurrentUser()
    {
        $session = session();
        return $session->get('user');
    }
 
    //處理登入訊息要帶email和password
    public function doLogin($email, $password)
    {
        $result = false;
 
        //$userModel = \App\Models\UserModel();
        $userModel = model('App\Models\UserModel');
        //找尋輸入email並填入實體然後比對資料庫，尋找第一筆
 
        $hash_pass = password_hash($password, PASSWORD_BCRYPT);
 
        $user = $userModel->where([
            'email' => $email,
        ])->first();
 
        $isValid = password_verify($password, $user->password);
 
        if ($isValid) {
            $this->_saveToSession($user);
            $result = true;
        }
        return $result;
    }
 
    public function doLogout()
    {
        $session = session();
        $session->remove('user');
        // $session->destory();
    }
 
    public function doRegister($userData)
    {
        //初始化狀態
        $result = [
            'result' => false,
            'errMsg' => null,
        ];
        //將資料填入實體
        $this->fill($userData);
 
        // $userModel = \App\Models\UserModel();
        $userModel = model('App\Models\UserModel');
        //將註冊資料填入資料庫時如果失敗就回傳errMsg，成功就將result回傳true
        if ($userModel->save($userData) === false) {
            $result['errMsg'] = $userModel->errors();
        } else {
            $result['result'] = true;
        }
        return $result;
    }

    public function isLog1()
    {
        $session = session();
        return $session->has('user');
    }

    public function isErr()
    {
        $session = session();
        return $session->has('LogiError');
    }
}


