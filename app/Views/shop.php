<?php $session = session();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles-merged.css">
    <link rel="stylesheet" href="/css/style.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,700">
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
    .pos0{
      /* border:1px #f00 solid; */
      margin:5px auto;
    }
    .pos1{
      position: absolute;
      top: 200px;
    }
    </style>
</head>
<body>
<section class="flexslider" style="height:500px;">

      <ul class="slides" style="height:500px;">

        <li style="background-image: url(/img/shopback.jpg);height:500px;">
          <div class="container">
            <div class="row" style="height:100px;">
              <div class="col-md-8 col-md-offset-2" style="height:200px;">
                <div class=" text-center pos1 col-md-offset-3" style="height:100px;">
                  <h1 class="probootstrap-heading">Services</h1>
                  <p class="probootstrap-subheading">Our specialty, we love to work with you</p>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
</section>

<section class="probootstrap-section proboostrap-clients probootstrap-bg-white">
      <div class="container">
        <div class="row probootstrap-gutter60">
          <?php for ($i = 0; $i < count($shop); $i++): ?>
          <div class="col-md-4 probootstrap-animate" data-animate-effect="fadeIn">
            <div class="service hover_service text-center">
              <div class="icon"><i class="icon-mobile3"></i></div>
                <div class="text">
                  <h3>商品名稱: <?php echo $name[$i] ?></h3>
                  <p>Price: <?php echo $shop[$i] ?>NT</p>
                </div>
                <a href="/cal?plu=<?=$i?>"  class="btn btn-secondary">+</a><span class="badge badge-info" ><?=$session->show[$i]?></span><a href="/cal?drc=<?=$i?>"  class="btn btn-secondary">-</a>
                <a href="/tsshop?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>"  class="btn btn-primary">buy</a>
                <a href="/buycar?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>&amo=<?=$session->show[$i]?>"  class="btn btn-primary">加入購物車</a>
              </div>
            </div>
            <?php endfor?>
          </div>
        </div>
        <br/>
        <div class="row">
        <div class="pos0">
          <a href="/shoplist" class="btn btn-danger">購物車</a>
          <a href="/clr?del=1" class="btn btn-info">清除購物車</a>
          <a href="/buycarall" class="btn btn-info">一次加入購物車</a>
          <a href="/order" name="c_order" class="btn btn-primary">送出訂單</a>
          <a href="/" name="c_order" class="btn btn-success">HOME</a>
        </div>
       </div>
      </div>
</section>
<script src="/js/scripts.min.js"></script>
<script src="/js/custom.js"></script>
</body>
</html>