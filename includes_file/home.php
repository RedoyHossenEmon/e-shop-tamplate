
<!-- Hero slider-->
<section class="tns-carousel tns-controls-lg">
  <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
    <!-- Item-->
    <div class="px-lg-5" style="background-color: #3aafd2;">
      <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/home/hero-slider/01.jpg" alt="Summer Collection">
        <div class="position-relative mx-auto me-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
          <div class="pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap">
            <h3 class="h2 text-light fw-light pb-1 from-start">Has just arrived!</h3>
            <h2 class="text-light display-5 from-start delay-1">Huge Summer Collection</h2>
            <p class="fs-lg text-light pb-3 from-start delay-2">Swimwear, Tops, Shorts, Sunglasses &amp; much more...</p>
            <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-primary" href="shop-products.php">Shop Now<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Item-->
    <div class="px-lg-5" style="background-color: #f5b1b0;">
      <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/home/hero-slider/02.jpg" alt="Women Sportswear">
        <div class="position-relative mx-auto me-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
          <div class="pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap">
            <h3 class="h2 text-light fw-light pb-1 from-bottom">Hurry up! Limited time offer.</h3>
            <h2 class="text-light display-5 from-bottom delay-1">Women Sportswear Sale</h2>
            <p class="fs-lg text-light pb-3 from-bottom delay-2">Sneakers, Keds, Sweatshirts, Hoodies &amp; much more...</p>
            <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-primary" href="shop-products.php">Shop Now<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Item-->
    <div class="px-lg-5" style="background-color: #eba170;">
      <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/home/hero-slider/03.jpg" alt="Men Accessories">
        <div class="position-relative mx-auto me-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
          <div class="pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap">
            <h3 class="h2 text-light fw-light pb-1 from-top">Complete your look with</h3>
            <h2 class="text-light display-5 from-top delay-1">New Men's Accessories</h2>
            <p class="fs-lg text-light pb-3 from-top delay-2">Hats &amp; Caps, Sunglasses, Bags &amp; much more...</p>
            <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-primary" href="shop-products.php">Shop Now<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Popular categories-->
<section class="container position-relative pt-3 pt-lg-0 pb-5 mt-lg-n10" style="z-index: 10;">
  <div class="row">
    <div class="col-xl-8 col-lg-9">
      <div class="card border-0 shadow-lg">
        <div class="card-body px-3 pt-grid-gutter pb-0">
          <div class="row g-0 ps-1">
            <div class="col-sm-4 px-2 mb-grid-gutter"><a class="d-block text-center text-decoration-none me-1" href="shop-products.php"><img class="d-block rounded mb-3" src="img/home/categories/cat-sm01.jpg" alt="Men">
                <h3 class="fs-base pt-1 mb-0">Men</h3></a></div>
            <div class="col-sm-4 px-2 mb-grid-gutter"><a class="d-block text-center text-decoration-none me-1" href="shop-products.php"><img class="d-block rounded mb-3" src="img/home/categories/cat-sm02.jpg" alt="Women">
                <h3 class="fs-base pt-1 mb-0">Women</h3></a></div>
            <div class="col-sm-4 px-2 mb-grid-gutter"><a class="d-block text-center text-decoration-none me-1" href="shop-products.php"><img class="d-block rounded mb-3" src="img/home/categories/cat-sm03.jpg" alt="Kids">
                <h3 class="fs-base pt-1 mb-0">Kids</h3></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Products grid (Trending products)-->
<section class="container pt-md-3 pb-5 mb-md-3">
  <h2 class="h3 text-center">Trending products</h2>
  <div class="row pt-4 mx-n2" >


<?php 
require_once('back-end/dbconnection.php');


$query = "SELECT * FROM productlist WHERE description LIKE '%popular%' " ;
$conditionedQuery = $query." LIMIT 12 ";


// Execute the SQL query
$result = $conn->query($conditionedQuery);

$jsonData = "";
// Check if there are results and limit to a maximum of 16 records
if ($result->num_rows > 0) {
 
  while (($row = $result->fetch_assoc())) {
    // Retrieve data from the result set
    $img_url = ($row['img_url']) ? "img/product/" . $row['img_url'] : "img/product/blank-img.png";
    $category = $row['category'];
    $product_id = $row['product_id'];
    $style = $row['style'];
    $product_name = $row['product_name'];
    $price = $row['price'];
    $ex_price = $row['ex_price'];

    // Generate product card HTML
    $jsonData .= <<<EOD
     <div class="col-md-3 col-sm-6 px- mb-4">
      <div class="card product-card">
        <span class="badge bg-danger badge-shadow">Sale</span>
        <button class="btn-wishlist btn-sm" type="button" data-proId="$product_id">
          <i class="ci-heart"></i>
        </button>
        <div class="w-100" style="height:185px">
          <a class="card-img-top w-100 h-100 d-block overflow-hidden" href="shop-single-v1.php?id=$product_id" >
            <img class="w-100 h-100" src="$img_url" alt="Product">
          </a>
        </div>
        <div class="card-body py-2">
          <a class="product-meta d-block fs-xs pb-1" href="#">$style</a>
          <h3 class="product-title fs-sm">
            <a href="shop-single-v1.php?id=$product_id" >$product_name</a>
          </h3>
          <div class="d-flex justify-content-between">
            <div class="product-price">
              <span class="text-accent">\$$price</span>
              <del class="fs-sm text-muted">\$$ex_price</del>
            </div>
            <div class="star-rating">
              <i class="star-rating-icon ci-star-filled active"></i>
              <i class="star-rating-icon ci-star-filled active"></i>
              <i class="star-rating-icon ci-star-filled active"></i>
              <i class="star-rating-icon ci-star-half active"></i>
              <i class="star-rating-icon ci-star active"></i>
            </div>
          </div>
        </div>
        <div class="card-body card-body-hidden">
          <div class="mb-2">
            <button class="col-12 btn btn-primary btn-sm" type="button">
              <i class="ci-cart fs-sm me-1"></i>Add to Cart
            </button>
          </div>
          <div class="text-center">
            <a class="nav-link-style fs-ms" href="shop-single-v1.php?id=$product_id" >
              <i class="ci-eye align-middle me-1"></i>View more
            </a>
          </div>
        </div>
      </div>
      <hr class="d-sm-none">
      </div>
    EOD;
  
  }


}

echo $jsonData;
?>









          </div>
      <div class="text-center pt-3"><a class="btn btn-outline-accent" href="shop-products.php">More products<i class="ci-arrow-right ms-1"></i></a></div> 
    
      </section>


      <!-- Banners-->
      <section class="container pb-4 mb-md-3">
        <div class="row">
          <div class="col-md-8 mb-4">
            <div class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden rounded-3">
              <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
                <h4 class="fs-lg fw-light mb-2">Hurry up! Limited time offer</h4>
                <h3 class="mb-4">Converse All Star on Sale</h3><a class="btn btn-primary btn-shadow btn-sm" href="#">Shop Now</a>
              </div><img class="d-block ms-auto" src="img/shop/catalog/banner.jpg" alt="Shop Converse">
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="d-flex flex-column h-100 justify-content-center bg-size-cover bg-position-center rounded-3" style="background-image: url(img/blog/banner-bg.jpg);">
              <div class="py-4 my-2 px-4 text-center">
                <div class="py-1">
                  <h5 class="mb-2">Your Add Banner Here</h5>
                  <p class="fs-sm text-muted">Hurry up to reserve your spot</p><a class="btn btn-primary btn-shadow btn-sm" href="#">Contact us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Featured category (Hoodie)-->
      <section class="container mb-4 pb-3 pb-sm-0 mb-sm-5">
        <div class="row">
          <!-- Banner with controls-->
          <div class="col-md-5">
            <div class="d-flex flex-column h-100 overflow-hidden rounded-3" style="background-color: #e2e9ef;">
              <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
                <div>
                  <h3 class="mb-1">Hoodie day</h3><a class="fs-md" href="shop-products.php">Shop hoodies<i class="ci-arrow-right fs-xs align-middle ms-1"></i></a>
                </div>
                <div class="tns-carousel-controls" id="hoodie-day">
                  <button type="button"><i class="ci-arrow-left"></i></button>
                  <button type="button"><i class="ci-arrow-right"></i></button>
                </div>
              </div><a class="d-none d-md-block mt-auto" href="shop-products.php"><img class="d-block w-100" src="img/home/categories/cat-lg04.jpg" alt="For Women"></a>
            </div>
          </div>
          <!-- Product grid (carousel)-->
          <div class="col-md-7 pt-4 pt-md-0">
            <div class="tns-carousel">
              <div class="tns-carousel-inner" data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#hoodie-day&quot;}">
                <!-- Carousel item-->
                <div>
                  <div class="row mx-n2">
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="img/shop/catalog/20.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Hoodies &amp; Sweatshirts</a>
                          <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Block-colored Hooded Top</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">$24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="img/shop/catalog/21.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Hoodies &amp; Sweatshirts</a>
                          <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Block-colored Hooded Top</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">$26.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static"><span class="badge badge-danger badge-shadow">Sale</span>
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="img/shop/catalog/23.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Hoodies &amp; Sweatshirts</a>
                          <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Block-colored Hooded Top</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">$17.<small>99</small></span>
                              <del class="fs-sm text-muted">24.<small>99</small></del>
                            </div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="img/shop/catalog/51.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Hoodies &amp; Sweatshirts</a>
                          <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Mono Color Hooded Top</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">$21.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4 d-none d-lg-block">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="img/shop/catalog/24.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Hoodies &amp; Sweatshirts</a>
                          <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Block-colored Hooded Top</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">$24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4 d-none d-lg-block">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="img/shop/catalog/54.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Hoodies &amp; Sweatshirts</a>
                          <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Mono Color Hooded Top</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">$21.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Carousel item-->
                <div>
                  <div class="row mx-n2">
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4 d-none d-lg-block">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="img/shop/catalog/53.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Hoodies &amp; Sweatshirts</a>
                          <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Mono Color Hooded Top</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">$21.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4 d-none d-lg-block">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="img/shop/catalog/52.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Hoodies &amp; Sweatshirts</a>
                          <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Printed Hooded Top</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">$25.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="img/shop/catalog/22.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Hoodies &amp; Sweatshirts</a>
                          <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Block-colored Hooded Top</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">$24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="img/shop/catalog/56.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Hoodies &amp; Sweatshirts</a>
                          <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Printed Hooded Top</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">$25.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="img/shop/catalog/55.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Hoodies &amp; Sweatshirts</a>
                          <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Block-colored Hooded Top</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">$24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="img/shop/catalog/57.jpg" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Hoodies &amp; Sweatshirts</a>
                          <h3 class="product-title fs-sm"><a href="shop-single-v1.html">Block-colored Hooded Top</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">$23.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Shop by brand-->
      <section class="container py-lg-4 mb-4">
        <h2 class="h3 text-center pb-4">Shop by brand</h2>
        <div class="row">
          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/01.png" style="width: 150px;" alt="Brand"></a></div>
          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/02.png" style="width: 150px;" alt="Brand"></a></div>
          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/03.png" style="width: 150px;" alt="Brand"></a></div>
          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/04.png" style="width: 150px;" alt="Brand"></a></div>
          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/05.png" style="width: 150px;" alt="Brand"></a></div>
          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/06.png" style="width: 150px;" alt="Brand"></a></div>
          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/07.png" style="width: 150px;" alt="Brand"></a></div>
          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/08.png" style="width: 150px;" alt="Brand"></a></div>
          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/09.png" style="width: 150px;" alt="Brand"></a></div>
          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/10.png" style="width: 150px;" alt="Brand"></a></div>
          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/11.png" style="width: 150px;" alt="Brand"></a></div>
          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/12.png" style="width: 150px;" alt="Brand"></a></div>
        </div>
      </section>
      <!-- Blog + Instagram info cards-->
      <section class="container-fluid px-0">
        <div class="row g-0">
          <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-primary" href="blog-list-sidebar.html">
              <div class="card-body text-center"><i class="ci-edit h3 mt-2 mb-4 text-primary"></i>
                <h3 class="h5 mb-1">Read the blog</h3>
                <p class="text-muted fs-sm">Latest store, fashion news and trends</p>
              </div></a></div>
          <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-accent" href="#">
              <div class="card-body text-center"><i class="ci-instagram h3 mt-2 mb-4 text-accent"></i>
                <h3 class="h5 mb-1">Follow on Instagram</h3>
                <p class="text-muted fs-sm">#ShopWithCartzilla</p>
              </div></a></div>
        </div>
      </section>
    </main>
