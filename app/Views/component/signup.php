
    <div class="modal fadeInUp probootstrap-animated" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
      <div class="vertical-alignment-helper">
        <div class="modal-dialog modal-md vertical-align-center">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-cross"></i></button>
            <div class="probootstrap-modal-flex">
              <div class="probootstrap-modal-figure" style="background-image: url(/img/modal_bg.jpg);"></div>
              <div class="probootstrap-modal-content">
                <form name="SingUp" class="probootstrap-form">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email" name="email" >
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Re-type Password" name="pass_confirm">
                  </div>
                  <div class="form-group clearfix mb40">
                    <label for="remember" class="probootstrap-remember"><input type="checkbox" > Remember Me</label>
                    <a href="#" class="probootstrap-forgot">Forgot Password?</a>
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
        function doResultSingUp(res) {
            console.log('doResultSingUp:', res);
            if(res.result){
              alert('註冊成功');
              location.reload();
            }else{
              let msg = Object.values(res.errMsg).join('\n');
              alert(msg);
            }
        }

        SingUp.onsubmit = function(event) {
            let form = event.target;
            console.log('form', form);
            let formData = new FormData(form);
            let postData = Object.fromEntries(formData);
            console.log('postData', postData);
            fetch('/home/toRegister', {
                body: JSON.stringify(postData),
                cache: 'no-cache',
                method: 'POST',
                headers: {
                    'content-type': 'application/json ',
                    "X-Requested-With": "XMLHttpRequest"
                },
            }).then(response => response.json()).then(doResultSingUp);
            event.preventDefault();
        }

    </script>
