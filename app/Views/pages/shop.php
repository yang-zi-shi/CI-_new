<?php $this->extend('layout/default');?>

<?php $this->section('head');?>

<?php $this->endSection();?>

<?php $this->section('content');?>
<?php $session = session();?>
    <section class="flexslider">
      <ul class="slides">

        <li style="background-image: url(/img/slider_1.jpg)" class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center">
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
      </div>



      <div>
        <a href="/shoplist" class="btn btn-danger">購物車</a>
        <a href="/clr?del=1" class="btn btn-info">清除購物車</a>
        <a href="/buycarall" class="btn btn-info">一次加入購物車</a>
        <a href="/order" name="c_order" class="btn btn-primary">送出訂單</a>
      </div>
    </section>

<?php echo $this->include('component/contactus'); ?>

<?php $this->endSection();?>