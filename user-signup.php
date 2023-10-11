<?php
// session_start();
// if(isset($_SESSION['userId'])){
//   setcookie('alertmsg', "You are already logged in...", time() + 5, '/e-shop', 'localhost');
//   header("location:index.php");
//   exit();
// }
require_once("includes_file/header.php") ;
?>
      <div class="container py-4 py-lg-5 my-4">
        <div class="row">
          <div class="col-md-6">
            <div class="card border-0 shadow">
              <div class="card-body">
                <h2 class="h4 mb-1">Sign in</h2>
                <div class="py-3">
                  <h3 class="d-inline-block align-middle fs-base fw-medium mb-2 me-2">With social account:</h3>
                  <div class="d-inline-block align-middle"><a class="btn-social bs-google me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Google"><i class="ci-google"></i></a><a class="btn-social bs-facebook me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Facebook"><i class="ci-facebook"></i></a><a class="btn-social bs-twitter me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Twitter"><i class="ci-twitter"></i></a></div>
                </div>
                <hr>
                <h3 class="fs-base pt-4 pb-2">Or using form below</h3>


                <form action="back-end/login-setup.php" method="POST" class="needs-validation" novalidate>
                  <div class="input-group mb-3"><i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                    <input name="email" class="form-control rounded-start" type="email" placeholder="Email" required>
                  </div>
                  <div class="input-group mb-3"><i class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                    <div class="password-toggle w-100">
                      <input name="password" class="form-control" type="password" placeholder="Password" required>
                      <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                      </label>
                    </div>
                  </div>
                  <div class="d-flex flex-wrap justify-content-between">
                    <div class="form-check">
                      <input name="remember_me" class="form-check-input" type="checkbox" checked id="remember_me">
                      <label class="form-check-label" for="remember_me">Remember me</label>
                    </div><a class="nav-link-inline fs-sm" href="#account-password-recovery.html">Forgot password?</a>
                  </div>
                  <hr class="mt-4">
                  <div class="text-end pt-4">
                    <button name="login_submit" class="btn btn-primary" type="submit"><i class="ci-sign-in me-2 ms-n21"></i>Sign In</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6 pt-4 mt-3 mt-md-0">
            <h2 class="h4 mb-3">No account? Sign up</h2>
            <p class="fs-sm text-muted mb-4">Registration takes less than a minute but gives you full control over your orders.</p>
            <form method="POST" action="back-end/login-setup.php" class="needs-validation" novalidate>
              <div class="row gx-4 gy-3">
                <div class="col-sm-6">
                  <label class="form-label" for="reg-fn">First Name</label>
                  <input name="first_name" class="form-control" type="text" required id="reg-fn">
                  <div class="invalid-feedback">Please enter your first name!</div>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="reg-ln">Last Name</label>
                  <input name="last_name" class="form-control" type="text" required id="reg-ln">
                  <div class="invalid-feedback">Please enter your last name!</div>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="reg-email">E-mail Address</label>
                  <input name="email" class="form-control" type="email" required id="reg-email">
                  <div class="invalid-feedback">Please enter valid email address!</div>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="reg-phone">Phone Number</label>
                  <input name="phone" class="form-control" type="text" required id="reg-phone">
                  <div class="invalid-feedback">Please enter your phone number!</div>
                </div>

                <div class="col-md-6" >
                <label class="form-label" for="account-pass">Password</label>
                <div class="input-group mb-3 ">
                  <div class="password-toggle w-100">
                      <input name="password" class="form-control" id="account-pass" type="password" required>
                      <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6" >
                <label class="form-label" for="account-confirm-pass">Confirm Password</label>
                <div class="input-group mb-3 ">
                    <div class="password-toggle w-100">
                      <input name="password_2" class="form-control" id="account-confirm-pass" type="password" required>
                      <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                      </label>
                    </div>
                  </div>
                  <div class="invalid-feedback pwdMatch">Please enter password!</div>
                </div>

                <div class="col-12 text-end">
                  <button name="signup_submit" class="btn btn-primary" type="submit"><i class="ci-user me-2 ms-n1"></i>Sign Up</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
   


<?php

function bodyjsScript(){
  echo "

";

  
}

require_once("includes_file/footer.php");