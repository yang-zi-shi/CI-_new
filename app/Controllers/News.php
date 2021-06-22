<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class News extends Controller
{
    public function index()
    {
        $model = new NewsModel();

        $data = [
            'news'  => $model->getNews(),
            'title' => 'News archive',
        ];


        echo view('news/overview', $data);
    }

    public function view($slug = null)
    {
        $model = new NewsModel();

        $data['news'] = $model->getNews($slug);
        $data['title'] = $data['news']['title'];

        echo view('news/view', $data);
    }
    public function create()
    {
        helper('form');
        $model = new NewsModel();
        
        if (!$this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'  => 'required'
        ])) {
            
            echo view('news/create');
          
        } else {
            $model->save([
                'title' => $this->request->getVar('title'),
                'slug'  => url_title($this->request->getVar('title')),
                'body'  => $this->request->getVar('body'),
            ]);
            echo view('news/success');
        }
    }
    public function testcreate(){
        echo 1;
        // return view('news/create');
    }


    public function ts()
    {
        echo view('tsForm');
    }

    public function toLogin()
    {
        //初始化登入資訊值
        $result = [
            'result' => false,
            'errMsg' => '',
        ];
 
        //存取網頁請求值POST
        $method = $this->request->getMethod();
 
        //die是一中PHP函數當條件成立後直接跳出
        //檢查是否為AJAX資訊
        if (!$this->request->isAJAX()) {
            die('bad request AJAX');
        }
 
        //檢查網頁方法是否為POST
        if ($method != 'post') {
            die('bad request');
        }
 
        $postData = $this->request->getJSON();
        // $user = new \App\Entities\User();
        
        $result['result'] =true ;
        $result['errMsg'] ="測試";
        // if ($user->doLogin($postData->email, $postData->password)) {
        //     $result['result'] = true;
        // } else {
        //     $result['errMsg'] = '登入失敗，請確認帳戶及密碼是否正確';
        // }
 
        return $this->response->setJSON($result);
    }

    public function toLogin1()
    {
        $ts = $this->request->getPost('email');
        $ts1 = $this->request->getPost('password');
        echo $ts;
        
    }
}
