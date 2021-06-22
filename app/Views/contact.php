<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EC &mdash; shopping</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,700">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
</head>

<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
        <div class="container">
            <div id="navbar-collapse" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/">Home</a></li>
                    <!-- <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Pages</a>
                        <ul class="dropdown-menu">
                        </ul>
                    </li> -->
                    <li class="active"><a href="/">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="flexslider">
        <ul class="slides">

            <li style="background-image: url(img/slider_3.jpg)" class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="probootstrap-slider-text text-center">
                                <h1 class="probootstrap-heading">Get In Touch</h1>
                                <p class="probootstrap-subheading">Let's have a chat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </section>

    <section class="probootstrap-section probootstrap-bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-5 probootstrap-animate" data-animate-effect="fadeIn">
                    <h2>Drop us a line</h2>
                    <?php if (!empty($errors)) : ?>
                      <div class="alert alert-danger">
                        <?php foreach ($errors as  $error) : ?>
                        <p><?= $error ?></p>
                        <?php endforeach ?>
                      </div>
                    <?php endif ?>
                    <form action="/contact" method="post" class="probootstrap-form">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea cols="30" rows="10" class="form-control" id="message" name="message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="Submit Form">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-md-push-1 probootstrap-animate" data-animate-effect="fadeIn">
                <h2>Get in touch</h2>
                <p>You can contact us for website or product-related questions or suggestions</p>
            
                <h4>Taiwan</h4>
                <ul class="probootstrap-contact-info">
                <li><i class="icon-pin"></i> <span> Zhongli District,Taoyuan City</span></li>
                <li><i class="icon-email"></i><span>info@domain.com</span></li>
                <li><i class="icon-phone"></i><span>+123 456 7890</span></li>
                </ul>
            
                <h4>Taiwan</h4>
                <ul class="probootstrap-contact-info">
                <li><i class="icon-pin"></i> <span>Bade District, Taoyuan City</span></li>
                <li><i class="icon-email"></i><span>info1@domain.com</span></li>
                <li><i class="icon-phone"></i><span>+123 456 7890</span></li>
                </ul>
                </div>
            </div>
        </div>
    </section>

<footer class="probootstrap-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="probootstrap-footer-widget">
            <h3>The first one</h3>
            <p>This is a shopping simulation website can use "FB" login</p>
            <ul class="probootstrap-footer-social">
              <li><a href="/fblogin"><i class="icon-facebook"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- END row -->
      <div class="row">
        <div class="col-md-12 copyright">
          <p><small>&copy; 2021 .  <br> Designed &amp; Developed with <i class="icon icon-heart"></i> by Zi-yang(Jerry) & Kuan-Te</small></p>
        </div>
      </div>
    </div>
  </footer>
    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>