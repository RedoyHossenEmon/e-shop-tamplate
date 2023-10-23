<?php 
session_start();
if(!isset($_SESSION['userId'])){
  setcookie('alertmsg', "Please log in to your account to ensure security and access to essential services...", time() + 5, '/e-shop', 'localhost');
  header("location:index.php");
  exit();
}
require_once("includes_file/header.php");
$profilePageTitle = "Profile info";

?>

<div class="container pb-5 mb-2 mb-md-4">
  <div class="row">
 
    <div class="page-title-overlap bg-dark pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="ci-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"> Profile info </li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
          <h1 class="h3 text-light mb-0"> Profile info </h1>
        </div>
      </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <!-- Sidebar-->

<?php require_once("includes_file/profile-sidebar.php"); ?>



<section class="col-lg-8">
  <!-- Toolbar-->
  <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
    <h6 class="fs-base text-light mb-0">Update you profile details below:</h6>
    <a class="btn btn-primary btn-sm" id="logoutBtn"><i class="ci-sign-out me-2"></i>Sign out</a>
  </div>
  <!-- Profile form-->
  <form method="post" action="back-end/login-setup.php" id="update-profile-form">
    <!-- password pupup prompt -->
    <div class="modal fade" id="password-prompt" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <div>
              <h4>Confirm Your authority </h4>
            </div>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body tab-content py-4">
            <div class="mb-3">
              <label class="form-label" for="popup-password">Password</label>
              <div class="password-toggle">
                <input name="user_pwd" class="form-control" type="password" id="popup-password" required >
                <label class="password-toggle-btn" aria-label="Show/hide password">
                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                </label>
              </div>
            </div>
            <div class="mb-3 d-flex flex-wrap justify-content-between">
              <div class="form-check mb-2">
              </div>
              <a class="fs-sm" href="#">Forgot password?</a>
            </div>
            <button name="update_submit" type="submit" class=" btn btn-primary btn-shadow d-block w-100">Confirm</button>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-secondary rounded-3 p-4 mb-4">
      <div class="d-flex align-items-center">
        <img class="rounded" src="img/shop/account/avatar.jpg" width="90" alt="Susan Gardner">
        <div class="ps-3">
          <button class="btn btn-light btn-shadow btn-sm mb-2" type="button"><i class="ci-loading me-2"></i>Change avatar</button>
          <div class="p mb-0 fs-ms text-muted">Upload JPG, GIF or PNG image. 300 x 300 required.</div>
        </div>
      </div>
    </div>
    <div class="row gx-4 gy-3">
      <div class="col-sm-6">
        <label class="form-label" for="account-fn">First Name</label>
        <input name="first_name" class="form-control" type="text" id="account-fn">
      </div>
      <div class="col-sm-6">
        <label class="form-label" for="account-ln">Last Name</label>
        <input name="last_name" class="form-control" type="text" id="account-ln">
      </div>
      <div class="col-sm-6">
        <label class="form-label" for="account-email">Email Address</label>
        <input class="form-control" type="email" id="account-email" value="" disabled="">
        <input name="email" id="emailhide" type="hidden" value="mrmanikhossen@gmail.com">
      </div>
      <div class="col-sm-6">
        <label class="form-label" for="account-phone">Phone Number</label>
        <input name="phone" class="form-control" type="text" id="account-phone" value="">
      </div>
      <div class="col-sm-12">
        <div class="password-change-toggle nav-link dropdown-toggle" style="cursor: pointer; width:max-content">Change Password</div>
      </div>
      <div class="col-sm-6 pass-wrap " style="display:none; ">
        <label class="form-label" for="account-pass">New Password</label>
        <div class="password-toggle">
          <input name="password" class="form-control" type="password" id="account-pass">
          <label class="password-toggle-btn" aria-label="Show/hide password">
          <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
          </label>
        </div>
      </div>
      <div class="col-sm-6 confirm-pass-wrap" style="display:none">
        <label class="form-label" for="account-confirm-pass">Confirm Password</label>
        <div class="password-toggle">
          <input name="password_2" class="form-control" type="password" id="account-confirm-pass">
          <label class="password-toggle-btn" aria-label="Show/hide password">
          <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
          </label>
        </div>
        <div class="invalid-feedback pwdMatch">Password did not match!</div>
      </div>
    </div>
    <div class="col-12">
      <hr class="mt-2 mb-3">
      <div class="d-flex flex-wrap justify-content-between align-items-center">
        <div class="form-check">
          <input nsame="me_in_newsletter" class="form-check-input" type="checkbox" id="subscribe_me" checked="">
          <label class="form-check-label" for="subscribe_me">Subscribe me to Newsletter</label>
        </div>
        <button href="#password-prompt" data-bs-toggle="modal" id="updateprofilebtn" class="btn btn-primary mt-3 mt-sm-0" type="button">Update profile</button>
      </div>
    </div>
  </form>
</section>







 <!-- sidebar wrap endings of container tags  -->
</div>
</div>
</div>
</div>


<?php


  if (isset($_SESSION['userId'])) {

    $stmt = $conn->prepare("SELECT * FROM userlist WHERE email = ?");
    $stmt->bind_param("s", $_SESSION['userId']);  $stmt->execute(); 
    $user = $stmt->get_result()->fetch_assoc();
  
    $firstname = $user['first_name'];
    $lastname = $user['last_name'];
    $email = $user['email'];
    $phone = $user['phone'];
  }
  $script .= "
  // setting ne password toggle by click div 
  $('.password-change-toggle')
  .click(function() {
    $('.confirm-pass-wrap').toggle();
    $('.pass-wrap').toggle();
  });
   
  // confirm password error showing in live when submiting two password 
  const password = $('#account-confirm-pass');
const confirmPassword = $('#account-pass');

function pwdMatchFunc() {
  const match = password.val() === confirmPassword.val();
  $('.pwdMatch').css('display', match ? 'none' : 'block');
  $('#updateprofilebtn').attr('data-bs-toggle', match ? 'modal' : null);
}

$('#account-pass, #account-confirm-pass').on('keyup', pwdMatchFunc);

$('#password-prompt').on('shown.bs.modal', () => {
  $('#popup-password').focus();
});
   
$('.profileUsername').each(function() { $(this).html('". $firstname." ". $lastname."'); });
$('.profileEmail').each(function() { $(this).html('". $email ."'); });

$('#account-phone').each(function() { $(this).val('".$phone."'); });
$('#account-fn').each(function() { $(this).val('". $firstname ."'); });
$('#account-ln').each(function() { $(this).val('". $lastname ."'); });
$('#account-email').each(function() { $(this).val('". $email ."'); });
$('#emailhide').each(function() { $(this).val('". $email ."'); });


 ";

require_once("includes_file/footer.php");
?>