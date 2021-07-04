<!DOCTYPE html>
<html lang="zh-Hant-TW">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EC &mdash; shopping</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,700">
    <link rel="stylesheet" href="/css/styles-merged.css">
    <link rel="stylesheet" href="/css/style.min.css">
    <style>
    .carouselfixed {
      width: 480px;
      height:320px; 
      /* border:2px #f00
       solid; */
    }

    #shopin > a >img:hover{
      opacity: 0.9;
      box-shadow: 0 4px 6px 0 rgba(0, 140, 186, 0.5), 0 6px 10px 10px rgba(0, 140, 186, 0.5);
      border:3px #cccccc solid;
    }

    .auryang{
      width:100px;
      height:100px;
      border-radius:15px;
    }

    .aurde{
      width:100px;
      height:100px;
      border-radius:15px;
    }
    #author1:hover{
      box-shadow: 0 4px 6px 0 rgba(0, 140, 186, 0.5), 0 6px 10px 10px rgba(0, 140, 186, 0.5);
      border:3px #cccccc solid;
    }
    #author2:hover{
      box-shadow: 0 4px 6px 0 rgba(0, 140, 186, 0.5), 0 6px 10px 10px rgba(0, 140, 186, 0.5);
      border:3px #cccccc solid;
    }

    .galaxy{
      font-size:20px;
    }
    .galaxy:hover{
      font-size:30px;
    }

    </style>
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Fixed navbar -->
    <?php echo $this->include('component/header'); ?>

    <?php  $this->renderSection('content');?>

    <?php echo $this->include('component/footer'); ?>

    <!-- Modal login -->
    <?php //echo $this->include('component/login'); ?>
    <!-- END modal login -->

    <!-- Modal signup -->
    <?php //echo $this->include('component/signup'); ?>
    <!-- END modal signup -->

    <script src="/js/scripts.min.js"></script>
    <script src="/js/custom.js"></script>
  <script>
  loginForm.onsubmit = function(event) {
    let form = event.target;
    let formData = new FormData(form);
    //console.log('form', formData);
    let postData = Object.fromEntries(formData);
    // console.log('form', form);
    // console.log('postData', postData);
    
    fetch('/home/login', {
        body: JSON.stringify(postData),
        cache: 'no-cache',
        method: 'post',
        headers: {
            'content-type': 'application/json ',
            "X-Requested-With": "XMLHttpRequest"
        },
    }).then(response => response.json()).then(doResultLogin);
    event.preventDefault();
}
function doResultLogin(res) {
    //console.log('doResult:', res);
    if(res.result){
      alert('登入成功');
      location.reload();
    }else{
      alert(res.errMsg);
    }
}

regiForm.onsubmit = function(event) {
    let form = event.target;
    let formData = new FormData(form);
    let postData = Object.fromEntries(formData);
    
    fetch('/home/register', {
        body: JSON.stringify(postData),
        cache: 'no-cache',
        method: 'post',
        headers: {
            'content-type': 'application/json ',
            "X-Requested-With": "XMLHttpRequest"
        },
    }).then(response => response.json()).then(doResultSingUp);
    event.preventDefault();
}
function doResultSingUp(res) {
    //console.log('doResult:', res);
    if(res.result){
      alert('註冊成功');
      location.reload();
    }else{
      let res1='';
      let err =res.errMsg;
      for(let [key,val] of Object.entries(err)){
        res1+=val+'\n';
      }
      alert(res1);
      location.reload();
    }
}

function imgac(){
  document.getElementById("imts").src = "/img/opshop1.jpg";
}

function imgac1(){
  document.getElementById("imts").src = "/img/opshop.jpg";
}
</script>

  </body>
</html>