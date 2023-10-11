<?php

require_once "includes_file/header.php";
?>

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

$query = "SELECT * FROM productlist" ;


$result = $conn->query($query);
$count = 1;
if ($result->num_rows > 0) {
while (($row = $result->fetch_assoc()) && $count <= 12 ) {
$product_name = $row['product_name'];
$product_id = $row['product_id'];
$brand = $row['brand'];
$style = $row['style']; 
$category = $row['cetagory'];
$price = $row['price'];
$ex_price = $row['ex_price'];
$img_url = ($row['img_url'] == null) ? "img/product/blank-img.png" : $row['img_url'];




echo <<<HTML
    <div class="col-md-3 col-sm-6 px- mb-4">
      <div class="card product-card"><span class="badge bg-danger badge-shadow">Sale</span>
        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Add to wishlist" data-bs-original-title="Add to wishlist"><i class="ci-heart"></i></button>
        <div class="w-100 " style="height:185px">
        <a class="card-img-top w-100 h-100 d-block overflow-hidden" href="shop-single-v1.php"> <img class="w-100 h-100" src="$img_url" alt="Product"></a>
        </div>
        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">$category $style</a>
          <h3 class="product-title fs-sm"><a href="shop-single-v1.php">$product_name</a></h3>
          <div class="d-flex justify-content-between">
            <div class="product-price"><span class="text-accent">$$price</span>
              <del class="fs-sm text-muted">$$ex_price</del>
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
            <button class="col-12 btn btn-primary btn-sm" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
          </div>
          <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
        </div>
      </div>
      <hr class="d-sm-none">
    </div>
HTML;

$count++;
}
}

?>
    </div>
      <div class="text-center pt-3"><a class="btn btn-outline-accent" href="shop-products.php">More products<i class="ci-arrow-right ms-1"></i></a></div> 
    
      </section>


 <?php  require_once "includes_file/home.php";














require_once "includes_file/footer.php";

?>