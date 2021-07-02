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
   
    #page_btn {
      display: flex;
      justify-content: center;
    }
   #page_btn input{
    border-radius: 25px;
    width: 50px;
    height: 30px;
    background-color: white;
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
        <div id="show_con_item" class="row probootstrap-gutter60">
        </div>
        <div id="page_btn"> 
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
<script>
let item_cont = <?= count($shop);?>;
let pg_ch = Boolean(sessionStorage.getItem('pg_ch'));
let pg_ch1 = Boolean(sessionStorage.getItem('pg_ch1'));


//alert(pg_ch);
if(item_cont < 7){
  let str=`<div class="container">
        <div class="row probootstrap-gutter60">
          <?php for ($i = 0; $i < count($shop); $i++): ?>
          <div class="col-md-4 probootstrap-animate" data-animate-effect="fadeIn">
            <div class="service hover_service text-center">
              <div class="icon"><i class="icon-mobile3"></i></div>
                <div class="text">
                  <h3>商品名稱: <?php echo $name[$i] ?></h3>
                  <p>Price: <?php echo $shop[$i] ?>NT</p>
                </div>
                <a href="/cal?plu=<?=$i?>"  class="btn btn-secondary">+</a>
                <span id="tal" class="badge badge-info" ><?=$session->show[$i]?></span>
                <a href="/cal?drc=<?=$i?>"  class="btn btn-secondary">-</a>
                <a href="/tsshop?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>"  class="btn btn-primary">buy</a>
                <a href="/buycar?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>&amo=<?=$session->show[$i]?>"  class="btn btn-primary">加入購物車</a>
              </div>
            </div>
            <?php endfor?>
          </div>
        </div>`;
  document.getElementById("show_con_item").innerHTML=str;
} else if(item_cont >= 7 && item_cont < 13){
  let onpage = 0;
  show_btn();
  document.getElementById("page_btn").childNodes[0].style.backgroundColor="#ff3399";
  act_page(1);
  if(pg_ch){
    document.getElementById("pg2").click();
    sessionStorage.removeItem("pg_ch");
    W_scroll();
  }  
}else{
  let onpage = 0;
  show_btn1();
  document.getElementById("page_btn").childNodes[0].style.backgroundColor="#ff3399";
  act_page1(1);
  if(pg_ch){
    document.getElementById("pg2").click();
    sessionStorage.removeItem("pg_ch");
    W_scroll();
  }  
  if(pg_ch1){
    document.getElementById("pg3").click();
    sessionStorage.removeItem("pg_ch1");
    W_scroll();
  }  
}

function on_pg_ch(){
  let actpg = document.querySelectorAll(".actpg");
    actpg.forEach(
    function(e){
      e.addEventListener("click", function() {
        sessionStorage.setItem('pg_ch', 'true');
        pg_ch = true;
      });
    });
}

function on_pg_ch1(){
  let actpg = document.querySelectorAll(".actpg1");
    actpg.forEach(
    function(e){
      e.addEventListener("click", function() {
        sessionStorage.setItem('pg_ch1', 'true');
        pg_ch1 = true;
      });
    });
}

function btnact(itm){
  onpage = itm.value;
  act_page(onpage);
  show_btn();
  btncolor(onpage);
 }

 function btnact1(itm){
  onpage = itm.value;
  act_page1(onpage);
  show_btn1();
  btncolor(onpage);
 }

function show_btn(){
    document.getElementById("page_btn").innerHTML='';
    for(var i=1;i<=2;i++){
    document.getElementById("page_btn").innerHTML+=`<input id="pg${i}" type="button" value="${i}" onclick="btnact(this)"/>`;
    }
  }

  function show_btn1(){
    document.getElementById("page_btn").innerHTML='';
    for(var i=1;i<=3;i++){
    document.getElementById("page_btn").innerHTML+=`<input id="pg${i}" type="button" value="${i}" onclick="btnact1(this)"/>`;
    }
  }

 
 
  function act_page(page){
   document.getElementById("show_con_item").innerHTML='';
   if(page == 1){
     let cha_str1=`<div class="container">
        <div class="row probootstrap-gutter60">
          <?php for ($i = 0; $i < 6; $i++): ?>
          <div id="cont" class="col-md-4 probootstrap-animate" data-animate-effect="fadeIn">
            <div class="service hover_service text-center">
              <div class="icon"><i class="icon-mobile3"></i></div>
                <div class="text">
                  <h3>商品名稱: <?php echo $name[$i] ?></h3>
                  <p>Price: <?php echo $shop[$i] ?>NT</p>
                </div>
                <a href="/cal?plu=<?=$i?>"  class=" btn btn-secondary">+</a>
                <span id="tal" class="badge badge-info" ><?=$session->show[$i]?></span>
                <a href="/cal?drc=<?=$i?>"  class=" btn btn-secondary">-</a>
                <a href="/tsshop?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>"  class="btn btn-primary">buy</a>
                <a href="/buycar?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>&amo=<?=$session->show[$i]?>"  class="btn btn-primary">加入購物車</a>
              </div>
            </div>
            <?php endfor?>
          </div>
        </div>`;
        
        document.getElementById("show_con_item").innerHTML=cha_str1;
        let Item =document.querySelectorAll("#cont");

        for(let i =0; i< Item.length; i++){
          Item[i].classList.add("fadeIn");
          Item[i].classList.add("probootstrap-animated");
        }
    } 

    if(page == 2){
     document.getElementById("show_con_item").innerHTML='';
     let cha_str2=`<div class="container">
        <div class="row probootstrap-gutter60">
          <?php for ($i = 6; $i < count($shop); $i++): ?>
          <div id="cont" class="col-md-4 probootstrap-animate" data-animate-effect="fadeIn">
            <div class="service hover_service text-center">
              <div class="icon"><i class="icon-mobile3"></i></div>
                <div class="text">
                  <h3>商品名稱: <?php echo $name[$i] ?></h3>
                  <p>Price: <?php echo $shop[$i] ?>NT</p>
                </div>
                <a href="/cal?plu=<?=$i?>"  class="actpg btn btn-secondary">+</a>
                <span id="tal" class="badge badge-info" ><?=$session->show[$i]?></span>
                <a href="/cal?drc=<?=$i?>"  class="actpg btn btn-secondary">-</a>
                <a href="/tsshop?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>"  class="btn btn-primary">buy</a>
                <a href="/buycar?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>&amo=<?=$session->show[$i]?>"  class="btn btn-primary">加入購物車</a>
              </div>
            </div>
            <?php endfor?>
          </div>
        </div>`;
        document.getElementById("show_con_item").innerHTML=cha_str2;
        let Item =document.querySelectorAll("#cont");
        for(let i =0; i< Item.length; i++){
          Item[i].classList.add("fadeIn");
          Item[i].classList.add("probootstrap-animated");
        }
        on_pg_ch();
    } 
 }

 function act_page1(page){
   document.getElementById("show_con_item").innerHTML='';
   if(page == 1){
     let cha_str1=`<div class="container">
        <div class="row probootstrap-gutter60">
          <?php for ($i = 0; $i < 6; $i++): ?>
          <div id="cont" class="col-md-4 probootstrap-animate" data-animate-effect="fadeIn">
            <div class="service hover_service text-center">
              <div class="icon"><i class="icon-mobile3"></i></div>
                <div class="text">
                  <h3>商品名稱: <?php echo $name[$i] ?></h3>
                  <p>Price: <?php echo $shop[$i] ?>NT</p>
                </div>
                <a href="/cal?plu=<?=$i?>"  class=" btn btn-secondary">+</a>
                <span id="tal" class="badge badge-info" ><?=$session->show[$i]?></span>
                <a href="/cal?drc=<?=$i?>"  class="btn btn-secondary">-</a>
                <a href="/tsshop?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>"  class="btn btn-primary">buy</a>
                <a href="/buycar?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>&amo=<?=$session->show[$i]?>"  class="btn btn-primary">加入購物車</a>
              </div>
            </div>
            <?php endfor?>
          </div>
        </div>`;
        
        document.getElementById("show_con_item").innerHTML=cha_str1;
        let Item =document.querySelectorAll("#cont");

        for(let i =0; i< Item.length; i++){
          Item[i].classList.add("fadeIn");
          Item[i].classList.add("probootstrap-animated");
        }
    } 

    if(page == 2){
     document.getElementById("show_con_item").innerHTML='';
     let cha_str2=`<div class="container">
        <div class="row probootstrap-gutter60">
          <?php for ($i = 6; $i < 12; $i++): ?>
          <div id="cont" class="col-md-4 probootstrap-animate" data-animate-effect="fadeIn">
            <div class="service hover_service text-center">
              <div class="icon"><i class="icon-mobile3"></i></div>
                <div class="text">
                  <h3>商品名稱: <?php echo $name[$i] ?></h3>
                  <p>Price: <?php echo $shop[$i] ?>NT</p>
                </div>
                <a href="/cal?plu=<?=$i?>"  class="actpg btn btn-secondary">+</a>
                <span id="tal" class="badge badge-info" ><?=$session->show[$i]?></span>
                <a href="/cal?drc=<?=$i?>"  class="actpg btn btn-secondary">-</a>
                <a href="/tsshop?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>"  class="btn btn-primary">buy</a>
                <a href="/buycar?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>&amo=<?=$session->show[$i]?>"  class="btn btn-primary">加入購物車</a>
              </div>
            </div>
            <?php endfor?>
          </div>
        </div>`;
        document.getElementById("show_con_item").innerHTML=cha_str2;
        let Item =document.querySelectorAll("#cont");
        for(let i =0; i< Item.length; i++){
          Item[i].classList.add("fadeIn");
          Item[i].classList.add("probootstrap-animated");
        }
        on_pg_ch();
    } 

    if(page == 3){
     document.getElementById("show_con_item").innerHTML='';
     let cha_str3='';
     if(item_cont < 18){
      cha_str3=`<div class="container">
        <div class="row probootstrap-gutter60">
          <?php for ($i =12 ; $i < count($shop); $i++): ?>
          <div id="cont" class="col-md-4 probootstrap-animate" data-animate-effect="fadeIn">
            <div class="service hover_service text-center">
              <div class="icon"><i class="icon-mobile3"></i></div>
                <div class="text">
                  <h3>商品名稱: <?php echo $name[$i] ?></h3>
                  <p>Price: <?php echo $shop[$i] ?>NT</p>
                </div>
                <a href="/cal?plu=<?=$i?>"  class="actpg1 btn btn-secondary">+</a>
                <span id="tal" class="badge badge-info" ><?=$session->show[$i]?></span>
                <a href="/cal?drc=<?=$i?>"  class="actpg1 btn btn-secondary">-</a>
                <a href="/tsshop?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>"  class="btn btn-primary">buy</a>
                <a href="/buycar?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>&amo=<?=$session->show[$i]?>"  class="btn btn-primary">加入購物車</a>
              </div>
            </div>
            <?php endfor?>
          </div>
        </div>`;
     }else{
      cha_str3=`<div class="container">
        <div class="row probootstrap-gutter60">
          <?php for ($i =12 ; $i < 18; $i++): ?>
          <div id="cont" class="col-md-4 probootstrap-animate" data-animate-effect="fadeIn">
            <div class="service hover_service text-center">
              <div class="icon"><i class="icon-mobile3"></i></div>
                <div class="text">
                  <h3>商品名稱: <?php echo $name[$i] ?></h3>
                  <p>Price: <?php echo $shop[$i] ?>NT</p>
                </div>
                <a href="/cal?plu=<?=$i?>"  class="actpg1 btn btn-secondary">+</a>
                <span id="tal" class="badge badge-info" ><?=$session->show[$i]?></span>
                <a href="/cal?drc=<?=$i?>"  class="actpg1 btn btn-secondary">-</a>
                <a href="/tsshop?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>"  class="btn btn-primary">buy</a>
                <a href="/buycar?buy=<?php echo $shop[$i] ?>&id=<?php echo $id[$i] ?>&name=<?php echo $name[$i] ?>&amo=<?=$session->show[$i]?>"  class="btn btn-primary">加入購物車</a>
              </div>
            </div>
            <?php endfor?>
          </div>
        </div>`;
     }
        document.getElementById("show_con_item").innerHTML=cha_str3;
        let Item =document.querySelectorAll("#cont");
        for(let i =0; i< Item.length; i++){
          Item[i].classList.add("fadeIn");
          Item[i].classList.add("probootstrap-animated");
        }
        on_pg_ch1();
    } 
 }

  function btncolor(choose){
    document.getElementById("page_btn").childNodes[choose-1].style.backgroundColor="#ff3399";
  }

function W_scroll(){
  let tal = document.querySelectorAll("#tal");
  for(let i =0; i < tal.length; i++){
  if(parseInt(tal[i].textContent) > 0){
    window.scrollTo(0, 590);
  }
 } 
}
W_scroll();
</script>
</body>
</html>