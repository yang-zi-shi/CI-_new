<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Form extends Controller
{
    public function index()
    {
        helper(['form', 'url']);

        // $validation =  \Config\Services::validation();

        // echo view('Signup', [
        //      'validation1' => $this->validator]);

        if (!$this->validate('signup')) {         
            //  $validation->getRuleGroup('signup');
            echo view('Signup', [
                'validation' => $this->validator
            ]);
        } else {
            echo view('Success');
        }
    }
}
