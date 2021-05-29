<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ContactModel;
use App\Models\ShopModel;
use App\Models\c_orderModel;
use CodeIgniter\HTTP\Request;
use phpDocumentor\Reflection\Types\Boolean;
use App\Entities\User;

class Home extends BaseController
{
	
	public function index()
	{
		return view('index');
	}

	public function phpinfo()
	{
		phpinfo();
	}
	public function register()
	{
		helper('form');
		$model = new UserModel();
		$ts1 = $this->request->getPost('password');
		$ts2 = $this->request->getPost('matchpassword');

		if ($ts1 === $ts2) {
			$pas = md5($ts1);
		}

		$registeruser = [
			'username' => $this->request->getPost('username'),
			'email'  => $this->request->getPost('email'),
			'password'  => $pas,
			'matchpassword'  => $pas,
			'address'  => $this->request->getPost('address'),
			'phone'  => $this->request->getPost('phone'),
			'IDcard'  => $this->request->getPost('IDcard'),
		];

		if (!$model->save($registeruser) === false) {
			echo view('news/success');
		} else {
			return view('register', ['errors' => $model->errors()]);
		}
	}

	public function regi()
	{
		echo view('register');
	}

	public function login()
	{
		helper('form');
		$model = new UserModel();
		$findEmail = $model->findColumn('email');
		$findPassword = $model->findColumn('password');
		$postEmail = $this->request->getPost('email');
		$usr = $model->where('email', $postEmail)->findColumn('username');
		$postPassword = $this->request->getPost('password');
		$postPassword = md5($postPassword);
		$session = session();
		$session->set('email',$postEmail );
		$session->set('user',$usr[0] );
		
		foreach ($findEmail as $value) {
			if ($value === $postEmail) {
				$a = "true";
			} 
		}
		foreach ($findPassword as $value) {
			if ($value === $postPassword) {
				$c = "true";
			} 
		}
		
		if (isset($a,$c)) {
			echo view('loginSuss');
		} else   {
			echo  view('index');
		}
	}
	public function log()
	{
		echo env('test');
		//echo view('index');
	}
	public function contact()
	{
		$model = new ContactModel();
		helper('form');
		$receive = $this->request->getPost('email');
		$feedback = [
			'username' => $this->request->getPost('username'),
			'email'  => $receive,
			'subject'  => $this->request->getPost('subject'),
			'message'  => $this->request->getPost('message'),
		];
		if ($model->save($feedback) === true) {
			echo view('news/success');
			$this->sendmail($receive);
		} else {
			echo view('contact',['errors' => $model->errors()]);
		}
	}
	public function cont()
	{
		echo view('contact');
	}

	public function sendmail($getmail){
		$email = \Config\Services::email();
		$config['SMTPUser'] = env('SMTPUser');
		$config['SMTPPass'] = env('SMTPPass');
		$email->initialize($config);
		$email->setFrom('mdtd20789@gmail.com', 'zi-yang');
		$email->setTo($getmail);
		$email->setSubject('回饋通知');
		$email->setMessage('已收到您的回饋意見 感謝您!');
		//$email->send() === true
		$ts =$email->send();
		if($ts === true){
			echo "<br>我們已收到回饋";
			var_dump($ts);
		}else{
			echo "fail";
			var_dump($ts);
			echo $email->printDebugger(['headers']);
		}

	}

	public function shop($x = null){
	    $session = session();
		$showzero = [];
		$model = new  ShopModel();
		$shops = $model->findColumn('price');
		$shop_id = $model->findColumn('pid');
		$shop_name = $model->findColumn('pname');

		 if(isset($session ->list)){
		   $list=$session ->list;
	 	   $session->set('list',$list);
		 }else{
			$list=array();
			$session->set('list',$list);
		}
		
		if(isset($x)){
			for($i=0;$i < count($x); $i++){
				$showzero[$i] = $x[$i];
			}
		}else{
			for($i=0;$i < count($shops); $i++){
				$showzero[$i] = 0;
			}
		}
		
		$session->set('show',$showzero);
		// echo var_dump($session->show);
		// echo var_dump($session->list);
		//echo var_dump($x);
		echo view('shop.php',['shop'=>$shops,'id'=>$shop_id,'name'=>$shop_name]);

	}

	public function tsshop(){
		// $ts = $this->request->getGet('buy');
		// $ts1 = $this->request->getGet('id');
		// $ts2 = $this->$data['']
		echo "測試用目前已封閉";
		
	}

	public function buycar(){
		$session = session();
		$sum =0;
		$ts = $this->request->getGet('buy');
		$ts1 = $this->request->getGet('id');
		$ts2 = $this->request->getGet('name');
		$ts3 = $this->request->getGet('amo');
		$list;
		$res;
		$arr =[];
		$pass = true;
		$idx;
		$list = $session ->list;
		   if(!empty($session ->list)){
			
			if(count($list)>0){
              for($i=0;$i<count($list);$i++){
				$arr[$i] = array_flip($list[$i]);
			}
		
			for($i=0;$i<count($arr);$i++){
				if (array_key_exists($ts2,$arr[$i])){
					$pass = false;
				}
			}
		}
	}
            
			if ($pass){
				array_push($list,['id'=>$ts1,'buy'=>$ts,'name'=>$ts2,'amo'=>$ts3]); 
				$session->set('list',$list);
			}
		 //}
		 for($i =0;$i < count($list); $i++){

		   $sum += ($list[$i]['buy']*$list[$i]['amo']);
		 }
		 
		 $session->set('sum',$sum);
		//  echo var_dump($idx)."idx在這";
		//  echo "<br>";
		//  echo "list_session:  ";
		//  echo "<br>";
		//  echo var_dump($session->list)."<br>";
		//  echo "show_session:  ";
		//  echo "<br>";
		//  echo var_dump($session->show)."<br>";
		 echo view('buycar.php');
		
	}

	public function shoplist(){
		$session = session();
		if(!empty($session ->list)){
		  echo view('shop_list.php');
		}else{
		  echo "目前購物車沒有商品喔!!";
		  echo "<a href='/shop'>回到主頁</a>";
		}
		
		//echo var_dump($session->list);
	}

	public function clr(){
		$session = session();
		$clr = $this->request->getGet('del');
		if($clr == '1'){
			unset($_SESSION['list']);
			unset($_SESSION['sum']);
		}
		echo view('clr.php');
	}

	public function cal(){
		$session = session();
		$plu = $this->request->getGet('plu');
		$drc = $this->request->getGet('drc');

		if(isset($plu)){
			$x = $session ->show;
			// $x[$plu] = $x[$plu]+1;
			$x[$plu] += 1;
			// $session->set('show',$x);
			// $session ->show[$plu] += 1;
		}
		if(isset($drc)){
			$x = $session ->show;
		    $x[$drc]-=1;
			if($x[$drc] < 0){
				$x[$drc] = 0;
			}
			// $session->set('show',$x);
		}
	//    echo var_dump($session ->show[$plu]);
	//    echo var_dump($plu);
	//    echo var_dump($session ->show)."<br>";
	//    echo var_dump($session ->list);
	   $this ->shop($x);

	}
	
	public function buycarall(){
		$session = session();
		$model = new  ShopModel();
		$shops = $model->findColumn('price');
		$shop_id = $model->findColumn('pid');
		$shop_name = $model->findColumn('pname');
		$list =[];
		$qua = count($session ->show);
       for($i =0;$i<$qua;$i++){
         if($session ->show[$i] > 0){
			 array_push($list,['id'=>$shop_id[$i],'buy'=>$shops[$i],'name'=>$shop_name[$i],'amo'=>$session ->show[$i]]); 
		 }
	 }
	 $session ->list =$list;
	 for($i =0;$i < count($list); $i++){

		$sum += ($list[$i]['buy']*$list[$i]['amo']);
	  }
	  
	  $session->set('sum',$sum);
	 if(empty($session ->list)){
		echo "目前購物車沒有商品喔!!";
		echo "<a href='/shop'>回到主頁</a>";
   }else{
	echo view('buycarall.php');
   }
	}

	public function order(){
		$session = session();
		$order = $session ->list;
		$cou = count($session ->list);
		$model = new c_orderModel();
		$order_n = $order_a ='';
		
		for($i = 0;$i <$cou; $i++ ){
			$order_n .= $order[$i]['name']."--";
			$order_a .= $order[$i]['amo']."--";
		}
		$c_order = [
			'商品名稱' => $order_n,
			'數量'  => $order_a,
			'總價'  => $session->sum
		];
		if ($model->save($c_order) === true) {
			echo "成功";
		} else {
			echo "訂單失敗";
		}
	}
}
