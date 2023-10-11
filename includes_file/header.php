<?php
include('back-end/dbconnection.php');
// execute javascript code for function for header functionalty mantain 
$script = null;

function headerjsScript(){
  global $conn;

  //  alert massege showing and hide if isset coockie
  if(isset($_COOKIE['alertmsg'])){
   echo "
      document.querySelector('.alertContainer').style.top='0px';
      document.querySelector('.alertMsg').innerHTML='" . $_COOKIE['alertmsg'] . "';

      setTimeout(function() {
        document.querySelector('.alertContainer').style.top='-100px';
    }, 8000)
    ";
  }
  echo "
  // set logout link of every logout button
  $('#logoutBtn').attr('href', '#confirm-logout');
  $('#logoutBtn').attr('data-bs-toggle', 'modal');
  ";
 // settitng all profile information from database by session checking

 if (isset($_SESSION['userId'])) {

  $stmt = $conn->prepare("SELECT * FROM userlist WHERE email = ?");
  $stmt->bind_param("s", $_SESSION['userId']);  $stmt->execute(); 
  $user = $stmt->get_result()->fetch_assoc();

  $firstname = $user['first_name'];
  $lastname = $user['last_name'];
  $email = $user['email'];
  $phone = $user['phone'];
  // global $firstname, $lastname, $email, $phone;
  echo"
  
    document.querySelector('.userNamechar a').setAttribute('href', 'account-setting.php');
    document.querySelector('.userNamechar').classList.add('dropdown');

    document.querySelector('.userProName small').innerHTML = '". $firstname."' ;
    document.querySelector('.userProName span').innerHTML = '". $lastname."' ; 
    
    $('.userProName small').html((index, currentText) =>
      currentText.length > 10 ? currentText.substring(0, 9) + '...' : currentText
    );
    $('.userProName span').html((index, currentText) =>
      currentText.length > 10 ? currentText.substring(0, 9) + '...' : currentText
    );

  ";
 }else{

  // setting account link to signin form if not looged in 
   echo "
   
   $('.userNamechar a').each(function() { $(this).attr('href', '#signin-modal'); })
   $('.userNamechar a').each(function() { $(this).attr('data-bs-toggle', 'modal'); })
 
 ";}

}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cartzilla | Fashion Store v.1</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Cartzilla - Bootstrap E-commerce Template">
    <meta name="keywords" content="bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet" media="screen" href="vendor/drift-zoom/dist/drift-basic.min.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">

    <link rel="stylesheet" type="text/css" href="css/css.css">
   
   
  </head>
 
  <body class="handheld-toolbar-enabled">

    <div class="alertContainer" style="text-align:center; font-size:22px; position:fixed; top:-100px; width:100%; z-index:9999; transition: all 1s ">
      <div class="alertMsg alert alert-warning rounded-0 p-1">  </div>
    </div>

    <!-- Sign in / sign up modal-->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link fw-medium active" href="#signin-tab"  role="tab" aria-selected="true"><i class="ci-unlocked me-2 mt-n1"></i>Sign in</a></li>
              <li class="nav-item"><a class="nav-link fw-medium" href="user-signup.php" ><i class="ci-user me-2 mt-n1"></i>Sign up</a></li>
            </ul>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body tab-content py-4">
            <form method="POST" action="back-end/login-setup.php" class="needs-validation tab-pane fade show active" novalidate id="signin-tab">
              <div class="mb-3">
                <label class="form-label" for="si-email">Email address</label>
                <input name="email" class="form-control" type="email" id="si-email" placeholder="johndoe@example.com" required>
                <div class="invalid-feedback">Please provide a valid email address.</div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="si-password">Password</label>
                <div class="password-toggle">
                  <input name="password" class="form-control" type="password" id="si-password" required>
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                  <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>
              <div class="mb-3 d-flex flex-wrap justify-content-between">
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="si-remember">
                  <label class="form-check-label" for="si-remember">Remember me</label>
                </div>
                <a class="fs-sm" href="#">Forgot password?</a>
              </div>
              <button name="login_submit" class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
        <!-- sign out modal   -->


        <div class="modal fade" id="confirm-logout" tabindex="-1" role="dialog" aria-modal="true" >
          <div class="modal-dialog modal-dialog-centered " style="display:revert" role="document" >
            <div class="modal-content">
 
                <div class="text-center mt-4">
                  <h4>Log out </h4>
                  <h6> Are you sure you want to logout! </h6>
                </div>
                
                
                <div class="row justify-content-around m-4">
               <a class="col-md-5 btn btn-danger btn-shadow d-block" data-bs-dismiss="modal" aria-label="Close"> Cancel</a>
               <a  href="back-end/logout.php" class="text-white col-md-5 btn btn-primary btn-shadow d-block"> Confirm   </a>
            </div>
            </div>
          </div>
        </div>
      </div>





    <main class="page-wrapper">

    <!-- Navbar 3 Level (Light)-->
    <header class="shadow-sm">
      <!-- Topbar-->
      <div class="topbar topbar-dark bg-dark">
        <div class="container">
          <div class="topbar-text dropdown d-md-none">
            <a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Useful links</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#tel:00331697720"><i class="ci-support text-muted me-2"></i>(00) 33 169 7720</a></li>
              <li><a class="dropdown-item" href="#order-tracking.html"><i class="ci-location text-muted me-2"></i>Order tracking</a></li>
            </ul>
          </div>
          <div class="topbar-text text-nowrap d-none d-md-inline-block"><i class="ci-support"></i><span class="text-muted me-1">Support</span><a class="topbar-link" href="tel:00331697720">(00) 33 169 7720</a></div>
          <div class="tns-carousel tns-controls-static d-none d-md-block">
            <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false}">
              <div class="topbar-text">Free shipping for order over $200</div>
              <div class="topbar-text">We return money within 30 days</div>
              <div class="topbar-text">Friendly 24/7 customer support</div>
            </div>
          </div>
          <div class="ms-3 text-nowrap">
            <a class="topbar-link me-4 d-none d-md-inline-block" href="#order-tracking.html"><i class="ci-location"></i>Order tracking</a>
            <div class="topbar-text dropdown disable-autohide">
              <a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><img class="me-2" src="img/flags/en.png" width="20" alt="English">Eng / $</a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li class="dropdown-item">
                  <select class="form-select form-select-sm">
                    <option value="usd">$ USD</option>
                    <option value="eur">€ EUR</option>
                    <option value="ukp">£ UKP</option>
                    <option value="jpy">¥ JPY</option>
                  </select>
                </li>
                <li><a class="dropdown-item pb-1" href="#"><img class="me-2" src="img/flags/fr.png" width="20" alt="Français">Français</a></li>
                <li><a class="dropdown-item pb-1" href="#"><img class="me-2" src="img/flags/de.png" width="20" alt="Deutsch">Deutsch</a></li>
                <li><a class="dropdown-item" href="#"><img class="me-2" src="img/flags/it.png" width="20" alt="Italiano">Italiano</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
      <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="index.php"><img src="img/custom-logo.jpg" width="142" alt="Cartzilla"></a><a class="navbar-brand d-sm-none flex-shrink-0 me-2" href="index.php"><img src="img/logo-icon.png" width="74" alt="Cartzilla"></a>
            <div id="product-search" class="input-group d-none d-lg-flex mx-4">
              <input class="form-control rounded-end pe-5 search" type="text" placeholder="Search for products"><i class="ci-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3"></i>
            </div>
            <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
              <a class="navbar-tool navbar-stuck-toggler" href="#">
                <span class="navbar-tool-tooltip">Expand menu</span>
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
              </a>
              <a class="navbar-tool d-none d-lg-flex" href="account-wishlist.php">
                <span class="navbar-tool-tooltip">Wishlist</span>
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-heart"></i></div>
              </a>
              <div class="navbar-tool dropdown ms-3  ">
                <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="#shop-cart.html"><span class="navbar-tool-label">4</span><i class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text" href="#shop-cart.html"><small>My Cart</small>$265.00</a>
                <!-- Cart dropdown-->
                <div class="dropdown-menu dropdown-menu-end ">
                  <div class="widget widget-cart px-3 pt-2 pb-3 " style="width: 20rem;">
                    <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                      <div class="widget-cart-item pb-2 border-bottom">
                        <button class="btn-close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                        <div class="d-flex align-items-center">
                          <a class="flex-shrink-0" href="#shop-single-v1.html"><img src="img/shop/cart/widget/01.jpg" width="64" alt="Product"></a>
                          <div class="ps-2">
                            <h6 class="widget-product-title"><a href="#shop-single-v1.html">Women Colorblock Sneakers</a></h6>
                            <div class="widget-product-meta"><span class="text-accent me-2">$150.<small>00</small></span><span class="text-muted">x 1</span></div>
                          </div>
                        </div>
                      </div>
                      <div class="widget-cart-item py-2 border-bottom">
                        <button class="btn-close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                        <div class="d-flex align-items-center">
                          <a class="flex-shrink-0" href="#shop-single-v1.html"><img src="img/shop/cart/widget/02.jpg" width="64" alt="Product"></a>
                          <div class="ps-2">
                            <h6 class="widget-product-title"><a href="#shop-single-v1.html">TH Jeans City Backpack</a></h6>
                            <div class="widget-product-meta"><span class="text-accent me-2">$79.<small>50</small></span><span class="text-muted">x 1</span></div>
                          </div>
                        </div>
                      </div>
                      <div class="widget-cart-item py-2 border-bottom">
                        <button class="btn-close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                        <div class="d-flex align-items-center">
                          <a class="flex-shrink-0" href="#shop-single-v1.html"><img src="img/shop/cart/widget/03.jpg" width="64" alt="Product"></a>
                          <div class="ps-2">
                            <h6 class="widget-product-title"><a href="#shop-single-v1.html">3-Color Sun Stash Hat</a></h6>
                            <div class="widget-product-meta"><span class="text-accent me-2">$22.<small>50</small></span><span class="text-muted">x 1</span></div>
                          </div>
                        </div>
                      </div>
                      <div class="widget-cart-item py-2 border-bottom">
                        <button class="btn-close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                        <div class="d-flex align-items-center">
                          <a class="flex-shrink-0" href="#shop-single-v1.html"><img src="img/shop/cart/widget/04.jpg" width="64" alt="Product"></a>
                          <div class="ps-2">
                            <h6 class="widget-product-title"><a href="#shop-single-v1.html">Cotton Polo Regular Fit</a></h6>
                            <div class="widget-product-meta"><span class="text-accent me-2">$9.<small>00</small></span><span class="text-muted">x 1</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                      <div class="fs-sm me-2 py-2"><span class="text-muted">Subtotal:</span><span class="text-accent fs-base ms-1">$265.<small>00</small></span></div>
                      <a class="btn btn-outline-secondary btn-sm" href="#shop-cart.html">Expand cart<i class="ci-arrow-right ms-1 me-n1"></i></a>
                    </div>
                    <a class="btn btn-primary btn-sm d-block w-100" href="#checkout-details.html"><i class="ci-card me-2 fs-base align-middle"></i>Checkout</a>
                  </div>
                </div>
              </div>
              <div class=" navbar-tool userNamechar" style="width: 125px; margin-left: 30px;">
        
                <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" >
                  <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                  <div class=" navbar-tool-text d-block ms-n3 userProName"><small> Hello, Sign in</small> <span>My Account </span></div>

                      <ul class="dropdown-menu " style="text-align: right; right:-15%;" >
                        <li><a class="dropdown-item" href="account-orders.php">Orders History</a></li>
                        <li><a class="dropdown-item" href="account-setting.php">Profile Settings</a></li>
                        <li><a class="dropdown-item" href="account-address.php">Account Addresses</a></li>
                        <li><a class="dropdown-item" href="account-payment.php">Payment Methods</a></li>
                        <li><a class="dropdown-item" href="account-wishlist.php">Wishlist</a></li>
                        <li><a class="dropdown-item" href="dashboard-settings.php">Settings</a></li>
                        <li><a class="dropdown-item" class="logoutBtn" href="#confirm-logout" data-bs-toggle="modal"> <i class="ci-sign-out me-2"></i> Log out</a></li>
                      </ul>
         




















                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
          <div class="container">
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <!-- Search-->
              <div class="input-group d-lg-none my-3"><i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                <input class="form-control rounded-start" type="text" placeholder="Search for products">
              </div>
              <!-- Departments menu-->
              <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle ps-lg-0" href="#" data-bs-toggle="dropdown"><i class="ci-view-grid me-2"></i>Departments</a>
                  <div class="dropdown-menu px-2 pb-4">
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                      <div class="mega-dropdown-column pt-3 pt-sm-4 px-2 px-lg-3">
                        <div class="widget widget-links">
                          <a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/01.jpg" alt="Clothing"></a>
                          <h6 class="fs-base mb-2">Clothing</h6>
                          <ul class="widget-list">
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Women's clothing</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Men's clothing</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Kid's clothing</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                        <div class="widget widget-links">
                          <a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/02.jpg" alt="Shoes"></a>
                          <h6 class="fs-base mb-2">Shoes</h6>
                          <ul class="widget-list">
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Women's shoes</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Men's shoes</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Kid's shoes</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                        <div class="widget widget-links">
                          <a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/03.jpg" alt="Gadgets"></a>
                          <h6 class="fs-base mb-2">Gadgets</h6>
                          <ul class="widget-list">
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Smartphones &amp; Tablets</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Wearable gadgets</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">E-book readers</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                      <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                        <div class="widget widget-links">
                          <a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/04.jpg" alt="Furniture"></a>
                          <h6 class="fs-base mb-2">Furniture &amp; Decor</h6>
                          <ul class="widget-list">
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Home furniture</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Office furniture</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Lighting and decoration</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                        <div class="widget widget-links">
                          <a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/05.jpg" alt="Accessories"></a>
                          <h6 class="fs-base mb-2">Accessories</h6>
                          <ul class="widget-list">
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Hats</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Sunglasses</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Bags</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                        <div class="widget widget-links">
                          <a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/06.jpg" alt="Entertainment"></a>
                          <h6 class="fs-base mb-2">Entertainment</h6>
                          <ul class="widget-list">
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Kid's toys</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Video games</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Outdoor / Camping</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              <!-- Primary menu-->
              <ul class="navbar-nav">
                <li class="nav-item dropdown active ">
                  <a class="nav-link dropdown-toggle " href="#" data-bs-toggle="dropdown">Home</a>
                  <ul class="dropdown-menu overflow-hidden">
                    <li class="dropdown position-static mb-0">
                      <a class="dropdown-item border-bottom py-2" href="#home-nft.html"><span class="d-block text-heading">NFT Marketplace<span class="badge bg-danger ms-1">NEW</span></span><small class="d-block text-muted">NFTs, Multi-vendor, Auctions</small></a>
                      <div class="dropdown-menu h-100 animation-none mt-0 p-3"><a class="d-block" href="#home-nft.html" style="width: 250px;"><img src="img/home/preview/th08.jpg" alt="NFT Marketplace"></a></div>
                    </li>
                    <li class="dropdown position-static mb-0">
                      <a class="dropdown-item py-2 border-bottom" href="#home-fashion-store-v1.html"><span class="d-block text-heading">Fashion Store v.1</span><small class="d-block text-muted">Classic shop layout</small></a>
                      <div class="dropdown-menu h-100 animation-none mt-0 p-3"><a class="d-block" href="#home-fashion-store-v1.html" style="width: 250px;"><img src="img/home/preview/th01.jpg" alt="Fashion Store v.1"></a></div>
                    </li>
                    <li class="dropdown position-static mb-0">
                      <a class="dropdown-item py-2 border-bottom" href="#home-electronics-store.html"><span class="d-block text-heading">Electronics Store</span><small class="d-block text-muted">Slider + Promo banners</small></a>
                      <div class="dropdown-menu h-100 animation-none mt-0 p-3"><a class="d-block" href="#home-electronics-store.html" style="width: 250px;"><img src="img/home/preview/th03.jpg" alt="Electronics Store"></a></div>
                    </li>
                    <li class="dropdown position-static mb-0">
                      <a class="dropdown-item py-2 border-bottom" href="#home-marketplace.html"><span class="d-block text-heading">Marketplace</span><small class="d-block text-muted">Multi-vendor, digital goods</small></a>
                      <div class="dropdown-menu h-100 animation-none mt-0 p-3"><a class="d-block" href="#home-marketplace.html" style="width: 250px;"><img src="img/home/preview/th04.jpg" alt="Marketplace"></a></div>
                    </li>
                    <li class="dropdown position-static mb-0">
                      <a class="dropdown-item py-2 border-bottom" href="#home-grocery-store.html"><span class="d-block text-heading">Grocery Store</span><small class="d-block text-muted">Full width + Side menu</small></a>
                      <div class="dropdown-menu h-100 animation-none mt-0 p-3"><a class="d-block" href="#home-grocery-store.html" style="width: 250px;"><img src="img/home/preview/th06.jpg" alt="Grocery Store"></a></div>
                    </li>
                    <li class="dropdown position-static mb-0">
                      <a class="dropdown-item py-2 border-bottom" href="#home-food-delivery.html"><span class="d-block text-heading">Food Delivery Service</span><small class="d-block text-muted">Food &amp; Beverages delivery</small></a>
                      <div class="dropdown-menu h-100 animation-none mt-0 p-3"><a class="d-block" href="#home-food-delivery.html" style="width: 250px;"><img src="img/home/preview/th07.jpg" alt="Food Delivery Service"></a></div>
                    </li>
                    <li class="dropdown position-static mb-0">
                      <a class="dropdown-item py-2 border-bottom" href="#home-fashion-store-v2.html"><span class="d-block text-heading">Fashion Store v.2</span><small class="d-block text-muted">Slider + Featured categories</small></a>
                      <div class="dropdown-menu h-100 animation-none mt-0 p-3"><a class="d-block" href="#home-fashion-store-v2.html" style="width: 250px;"><img src="img/home/preview/th02.jpg" alt="Fashion Store v.2"></a></div>
                    </li>
                    <li class="dropdown position-static mb-0">
                      <a class="dropdown-item py-2" href="#home-single-store.html"><span class="d-block text-heading">Single Product Store</span><small class="d-block text-muted">Single product / mono brand</small></a>
                      <div class="dropdown-menu h-100 animation-none mt-0 p-3"><a class="d-block" href="#home-single-store.html" style="width: 250px;"><img src="img/home/preview/th05.jpg" alt="Single Product / Brand Store"></a></div>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Shop</a>  </li>
                  
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">Account</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Shop User Account</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="account-orders.php">Orders History</a></li>
                        <li><a class="dropdown-item" href="account-setting.php">Profile Settings</a></li>
                        <li><a class="dropdown-item" href="account-address.php">Account Addresses</a></li>
                        <li><a class="dropdown-item" href="account-payment.php">Payment Methods</a></li>
                        <li><a class="dropdown-item" href="account-wishlist.php">Wishlist</a></li>
                        <li><a class="dropdown-item" href="dashboard-settings.php">Settings</a></li>
                      </ul>
                    </li>
                    <li><a class="dropdown-item " href="#" >Vendor Dashboard</a> </li>
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">NFT Marketplace<span class="badge bg-danger ms-1">NEW</span></a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#dashboard-purchases.html">Purchases</a></li>
                        <li><a class="dropdown-item" href="#dashboard-favorites.html">Favorites</a></li>
                        <li><a class="dropdown-item" href="#dashboard-sales.html">Sales</a></li>
                        <li><a class="dropdown-item" href="#dashboard-products.html">Products</a></li>
                        <li><a class="dropdown-item" href="#dashboard-add-new-product.html">Add New Product</a></li>
                      </ul>
                    </li>
                    <li><a class="dropdown-item" href="#nft-account-my-collections.html">My Collections</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">Pages</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Navbar Variants</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#navbar-1-level-light.html">1 Level Light</a></li>
                        <li><a class="dropdown-item" href="#navbar-1-level-dark.html">1 Level Dark</a></li>
                        <li><a class="dropdown-item" href="#navbar-2-level-light.html">2 Level Light</a></li>
                        <li><a class="dropdown-item" href="#navbar-2-level-dark.html">2 Level Dark</a></li>
                        <li><a class="dropdown-item" href="#navbar-3-level-light.html">3 Level Light</a></li>
                        <li><a class="dropdown-item" href="#navbar-3-level-dark.html">3 Level Dark</a></li>
                        <li><a class="dropdown-item" href="#home-electronics-store.html">Electronics Store</a></li>
                        <li><a class="dropdown-item" href="#home-marketplace.html">Marketplace</a></li>
                        <li><a class="dropdown-item" href="#home-grocery-store.html">Side Menu (Grocery)</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#about.html">About Us</a></li>
                    <li><a class="dropdown-item" href="#contacts.html">Contacts</a></li>
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Help Center</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#help-topics.html">Help Topics</a></li>
                        <li><a class="dropdown-item" href="#help-single-topic.html">Single Topic</a></li>
                        <li><a class="dropdown-item" href="#help-submit-request.html">Submit a Request</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">404 Not Found</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#404-simple.html">404 - Simple Text</a></li>
                        <li><a class="dropdown-item" href="#404-illustration.html">404 - Illustration</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#sticky-footer.html">Sticky Footer Demo</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">Blog</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Blog List Layouts</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#blog-list-sidebar.html">List with Sidebar</a></li>
                        <li><a class="dropdown-item" href="#blog-list.html">List no Sidebar</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Blog Grid Layouts</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#blog-grid-sidebar.html">Grid with Sidebar</a></li>
                        <li><a class="dropdown-item" href="#blog-grid.html">Grid no Sidebar</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Single Post Layouts</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#blog-single-sidebar.html">Article with Sidebar</a></li>
                        <li><a class="dropdown-item" href="#blog-single.html">Article no Sidebar</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Docs / Components</a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="#docs/dev-setup.html">
                        <div class="d-flex">
                          <div class="lead text-muted pt-1"><i class="ci-book"></i></div>
                          <div class="ms-2"><span class="d-block text-heading">Documentation</span><small class="d-block text-muted">Kick-start customization</small></div>
                        </div>
                      </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                      <a class="dropdown-item" href="#components/typography.html">
                        <div class="d-flex">
                          <div class="lead text-muted pt-1"><i class="ci-server"></i></div>
                          <div class="ms-2"><span class="d-block text-heading">Components<span class="badge bg-info ms-2">40+</span></span><small class="d-block text-muted">Faster page building</small></div>
                        </div>
                      </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                      <a class="dropdown-item" href="#docs/changelog.html">
                        <div class="d-flex">
                          <div class="lead text-muted pt-1"><i class="ci-edit"></i></div>
                          <div class="ms-2"><span class="d-block text-heading">Changelog<span class="badge bg-success ms-2">v2.4.0</span></span><small class="d-block text-muted">Regular updates</small></div>
                        </div>
                      </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                      <a class="dropdown-item" href="#mailto:support@createx.studio">
                        <div class="d-flex">
                          <div class="lead text-muted pt-1"><i class="ci-help"></i></div>
                          <div class="ms-2"><span class="d-block text-heading">Support</span><small class="d-block text-muted">support@createx.studio</small></div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>