<!DOCTYPE html>
<html>
<body>

<form  name="loginForm" action="/ts1" method="post">
                  <div >
                    <input type="text" class="form-control" placeholder="Email" name="email">
                  </div> 
                  <div >
                    <input type="password" class="form-control" placeholder="Password" name="password">
                  </div> 
                  <div >
                    <div >
                      <div >
                        <input type="submit" class="btn btn-primary btn-block" value="Sign In">
                      </div>
                    </div>
                  </div>
                </form>
</body>
<script>
// loginForm.onsubmit = function(event) {
// event.preventDefault();
// }

// loginForm.onsubmit = function(event) {

//     let form = event.target;
//     let formData = new FormData(form);
//     console.log('form', formData);
//     let postData = Object.fromEntries(formData);
//     console.log('form', form);
//     console.log('postData', postData);
    
//     fetch('/news/toLogin', {
//         body: JSON.stringify(postData),
//         cache: 'no-cache',
//         method: 'post',
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
//     //   location.reload();
//     alert('測試成功'+res.errMsg);
//     }else{
//       alert(res.errMsg);
//     }
// }
 </script>
 </html>
