<?php $session = session();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<!--<form action="/tsshop">-->
<div class="container" style="border:1px #f00 solid;">
<div class="row">
<?php for ($i =0;$i < count($shop);$i++) : ?>
  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">商品名稱: <?php echo $name[$i] ?></h5>
    <p class="card-text">Price: <?php echo $shop[$i] ?>NT</p>
    <div>
    <a href="/cal?plu=<?=$i?>"  class="btn btn-secondary">+</a><span class="badge badge-info" ><?= $session ->show[$i] ?></span><a href="/cal?drc=<?=$i?>"  class="btn btn-secondary">-</a>
    </div>
    <br>
    <div>
    <a href="/tsshop?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>"  class="btn btn-primary">buy</a>
    <a href="/buycar?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>&amo=<?= $session ->show[$i] ?>"  class="btn btn-primary">加入購物車</a>
    </div>
  </div>
  </div>
  <?php endfor ?>
</div>
<br/>
<div class="row">
<a href="/shoplist" class="btn btn-danger">購物車</a>
<a href="/clr?del=1" class="btn btn-info">清除購物車</a>
<a href="/buycarall" class="btn btn-info">一次加入購物車</a>
<a href="/order" name="c_order" class="btn btn-primary">送出訂單</a>
</div>
</div>
<!--</form>-->
</body>
</html>