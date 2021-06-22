
    <div class="modal fadeInUp probootstrap-animated" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="vertical-alignment-helper">
        <div class="modal-dialog modal-md vertical-align-center">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-cross"></i></button>
            <div class="probootstrap-modal-flex">
              <div class="probootstrap-modal-figure" style="background-image: url(/img/modal_bg.jpg);"></div>
              <div class="probootstrap-modal-content">
                <form  name="loginForm" class="probootstrap-form">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email" name="email">
                  </div> 
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                  </div> 
                  <div class="form-group clearfix mb40">
                    <label for="remember" class="probootstrap-remember"><input type="checkbox" > Remember Me</label>
                    <a href="#" class="probootstrap-forgot">Forgot Password?</a>
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
                        <button class="btn btn-primary btn-ghost btn-block btn-connect-facebook"><span>connect with</span> Facebook</button>
                        <button class="btn btn-primary btn-ghost btn-block btn-connect-google"><span>connect with</span> Google</button>
                        <button class="btn btn-primary btn-ghost btn-block btn-connect-twitter"><span>connect with</span> Twitter</button>
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

    <script>
        // loginForm.addEventListener('submit', function(event) {
        //     console.log('on submit!!');

        //     event.preventDefault();
        // });



        // loginForm.onsubmit = function(event) {

        //     let form = event.target;
        //     let formData = new FormData(form);
        //     let postData = Object.fromEntries(formData);
        //     console.log('form', form);
        //     console.log('postData', postData);

        //     fetch('/home/toLogin', {
        //         body: JSON.stringify(postData),
        //         cache: 'no-cache',
        //         method: 'POST',
        //         headers: {
        //             'content-type': 'application/json ',
        //             "X-Requested-With": "XMLHttpRequest"
        //         },
        //     }).then(response => response.json()).then(doResultLogin);
        //     event.preventDefault();
        // }
        // function doResultLogin(res) {
        //     console.log('doResult:', res);
        //     if(res.result){
        //       location.reload();
        //     }else{
        //       alert(res.errMsg);
        //     }
        // }
        


    </script>