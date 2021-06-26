
<?php 
   $user = new \App\Entities\User();
   $isLogin = $user->isLog1();
   $haserr =  $user->isErr();

  // if($isLogin){//如果登入
  //   $currentUser = ($isLogin) ? $user->getCurrentUser() : null; //抓實體session
  //   $partOfEmail = preg_replace('/(.+)@.+/', '$1' ,$currentUser->email); //取@前的字串
    
  // }
?>
<?php $session = session();?>
    <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
      <div class="container">

        <div id="navbar-collapse" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/">Home</a></li>
            <!-- <li class="dropdown">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle">Pages</a>
              <ul class="dropdown-menu">
                <li><a href="#">About Us</a></li>
                <?php //if($isLogin): ?>
                <li><a href="#">shop</a></li>
                <?php //endif ?>
              </ul>
            </li> -->
            <li><a href="/cont">Contact</a></li>

            <?php if(!$isLogin): ?>
            <li class="probootstra-cta-button"><a href="#" class="btn" data-toggle="modal" data-target="#loginModal">Log in</a></li>
            <?php else: ?>
              <li class="loginName"><a><?php echo $session -> get('email')."歡迎".$session -> get('user');?></a></li>
            <li class="probootstra-cta-button last"><a href="/logout" class="btn">Logout</a></li>
            <?php endif ?>

          <li class="probootstra-cta-button last"><a href="#" class="btn btn-ghost" data-toggle="modal" data-target="#signupModal">Sign up</a></li>
<!-- <?php// if(!$isLogin): ?>
            <li class="probootstra-cta-button"><a href="#" class="btn" data-toggle="modal" data-target="#loginModal">Log in</a></li>
            <li class="probootstra-cta-button last"><a href="#" class="btn btn-ghost" data-toggle="modal" data-target="#signupModal">Sign up</a></li>
<?php //else: ?>
            <li class="loginName"><a><?php //echo $partOfEmail?></a></li>
            <li class="probootstra-cta-button last"><a href="/home/logout" class="btn">Logout</a></li>
<?php// endif ?> -->
          </ul>
        </div>
      </div>
    </nav>

  <div class="modal fadeInUp probootstrap-animated" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
      <div class="modal-dialog modal-md vertical-align-center">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-cross"></i></button>
          <div class="probootstrap-modal-flex">
            <div class="probootstrap-modal-figure" style="background-image: url(/img/modal_bg.jpg);"></div>
            <div class="probootstrap-modal-content">
              <form name="loginForm"  class="probootstrap-form">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email" name="email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="form-group text-left">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="submit" class="btn btn-primary btn-block" value="Sign In">
                    </div>
                  </div>
                </div>
                <div class="form-group probootstrap-or">
                  <span><em>or</em></span>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <a class="btn btn-primary btn-ghost btn-block btn-connect-facebook" href="/fblogin"><span>connect with</span> Facebook</a>
                    </div>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END modal login -->

  <!-- Modal signup -->
  <div class="modal fadeInUp probootstrap-animated" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
      <div class="modal-dialog modal-md vertical-align-center">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-cross"></i></button>
          <div class="probootstrap-modal-flex">
            <div class="probootstrap-modal-figure" style="background-image: url(/img/signup.jpg);"></div>
            <div class="probootstrap-modal-content">
              <form  name="regiForm" class="probootstrap-form">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="username" name="username">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="matchpassword" name="matchpassword">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Address" name="address">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Phone" name="phone">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="IDcard" name="IDcard">
                </div>
                
                <div class="form-group text-left">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="submit" class="btn btn-primary btn-block" value="Sign Up">
                    </div>
                  </div>
                </div>
                <div class="form-group probootstrap-or">
                  <span><em>or</em></span>
                  <?php if ($haserr) : ?>
                    <div class="alert alert-danger">
                   <?php foreach ($session -> get('LogiError') as  $error) : ?>
                    <p><?= $error ?></p>
                   <?php endforeach ?>
                   </div>
                 <?php endif ?>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <button class="btn btn-primary btn-ghost btn-block btn-connect-facebook"><span>connect with</span> Facebook</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END modal signup -->