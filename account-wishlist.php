<?php 
session_start();
if(!isset($_SESSION['userId'])){
  setcookie('alertmsg', "Please log in to your account to ensure security and access to essential services...", time() + 5, '/e-shop', 'localhost');
  header("location:index.php");
  exit();
}
require_once("includes_file/header.php") ?>

      <!-- Page Title-->
      <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
                </li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page">Wishlist</li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">My wishlist</h1>
          </div>
        </div>
      </div>
      <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
          <!-- Sidebar-->

<?php require_once("includes_file/profile-sidebar.php"); ?>

          <!-- Content  -->
          <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
              <h6 class="fs-base text-light mb-0">List of items you added to wishlist:</h6><a class="btn btn-primary btn-sm" id="logoutBtn"><i class="ci-sign-out me-2"></i>Sign out</a>
            </div>
            <!-- Wishlist-->
            <!-- Item-->
            <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
              <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html" style="width: 10rem;"><img src="img/shop/cart/02.jpg" alt="Product"></a>
                <div class="pt-2">
                  <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">TH Jeans City Backpack</a></h3>
                  <div class="fs-sm"><span class="text-muted me-2">Brand:</span>Tommy Hilfiger</div>
                  <div class="fs-sm"><span class="text-muted me-2">Color:</span>Khaki</div>
                  <div class="fs-lg text-accent pt-2">$79.<small>50</small></div>
                </div>
              </div>
              <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                <button class="btn btn-outline-danger btn-sm" type="button"><i class="ci-trash me-2"></i>Remove</button>
              </div>
            </div>
            <!-- Item-->
            <div class="d-sm-flex justify-content-between my-4 pb-3 pb-sm-2 border-bottom">
              <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html" style="width: 10rem;"><img src="img/shop/cart/03.jpg" alt="Product"></a>
                <div class="pt-2">
                  <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">3-Color Sun Stash Hat</a></h3>
                  <div class="fs-sm"><span class="text-muted me-2">Brand:</span>The North Face</div>
                  <div class="fs-sm"><span class="text-muted me-2">Color:</span>Pink / Beige / Dark blue</div>
                  <div class="fs-lg text-accent pt-2">$22.<small>50</small></div>
                </div>
              </div>
              <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                <button class="btn btn-outline-danger btn-sm" type="button"><i class="ci-trash me-2"></i>Remove</button>
              </div>
            </div>
            <!-- Item-->
            <div class="d-sm-flex justify-content-between mt-4">
              <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html" style="width: 10rem;"><img src="img/shop/cart/04.jpg" alt="Product"></a>
                <div class="pt-2">
                  <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">Cotton Polo Regular Fit</a></h3>
                  <div class="fs-sm"><span class="text-muted me-2">Size:</span>42</div>
                  <div class="fs-sm"><span class="text-muted me-2">Color:</span>Light blue</div>
                  <div class="fs-lg text-accent pt-2">$9.<small>00</small></div>
                </div>
              </div>
              <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                <button class="btn btn-outline-danger btn-sm" type="button"><i class="ci-trash me-2"></i>Remove</button>
              </div>
            </div>
          </section>
        </div>
      </div>
 

<?php require_once("includes_file/footer.php"); ?>