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
<div class="container" style="border:1px #f00 solid;">
<div class="row">
<?php foreach ($session -> get('list') as $item ):?>
  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">購買結果</h5>
    <p class="card-text">商品編號:<?=$item['id'] ?></p>
    <p class="card-text">商品名稱名稱:<?=$item['name'] ?> </p>
    <p class="card-text">商品價格:<?=$item['buy'] ?> </p>
    <p class="card-text">商品數量:<?=$item['amo'] ?> </p>
  </div>
  </div>
<?php endforeach;?>
</div>
<button type="button" class="btn btn-primary">合計金額 <span class="badge badge-secondary"><?=$session->sum ?></span></button>
<a href="/shop" name="buy" class="btn btn-primary">繼續購買</a>
</body>
</div>
</html>