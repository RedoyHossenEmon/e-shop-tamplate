<?php

require_once("../back-end/dbconnection.php");

// // filtering product by category or product type---------

$type = isset($_GET['type']) ? $_GET['type'] : "";

if($type =='cetagoryname'){
  $cetagoryname = $_GET['value'];
  $query = "SELECT * FROM productlist WHERE cetagory LIKE '%$cetagoryname%'";

 }else if($type == 'stylename'){

  $stylename = $_GET['value'];
  $query = "SELECT * FROM productlist WHERE product_name LIKE '%$stylename%' OR style LIKE '%$stylename%'";
 }else if($type == 'search'){

  $stylename = trim($_GET['value']);
  $query = "SELECT * FROM productlist WHERE product_name LIKE '%$stylename%' OR style LIKE '%$stylename%' OR cetagory LIKE '%$stylename%'";

}else{
  $query = "SELECT * FROM productlist" ;
}

$result = $conn->query($query);
$jsonData = "";

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $product_name = $row['product_name'];
    $product_id = $row['product_id'];
    $brand = $row['brand'];
    $style = $row['style']; 
    $category = $row['cetagory'];
    $price = $row['price'];
    $ex_price = $row['ex_price'];
    $img_url = ($row['img_url'] == null) ? "img/product/blank-img.png" : $row['img_url'];

// if(isset($_COOKIE['list-view-cookie'])){
  // $jsonData .= <<<HTML
  //   <div class="card product-card product-list my-1">
  //       <span class="badge bg-danger badge-shadow">Sale</span>
  //       <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Add to wishlist" data-bs-original-title="Add to wishlist"><i class="ci-heart"></i></button>
  //       <div class="d-sm-flex align-items-center">
  //           <a class="product-list-thumb" href="shop-single-v1.php"><img src='$img_url' alt="Product"></a>
  //           <div class="card-body py-2">

  //               <a class="product-meta d-block fs-xs pb-1" href="#">$category $style</a>
  //               <h3 class="product-title fs-base"><a href="shop-single-v1.php">$product_name</a></h3>
  //               <div class="d-flex justify-content-between">
  //                   <div class="product-price"><span class="text-accent">$$price</span>
  //                       <del class="fs-sm text-muted">$$ex_price</del>
  //                   </div>
  //                   <div class="star-rating">
  //                       <i class="star-rating-icon ci-star-filled active"></i>
  //                       <i class="star-rating-icon ci-star-filled active"></i>
  //                       <i class="star-rating-icon ci-star-filled active"></i>
  //                       <i class="star-rating-icon ci-star-half active"></i>
  //                       <i class="star-rating-icon ci-star active"></i>
  //                   </div>
  //               </div>
  //               <div class="card-body card-body-hidden">
  //                   <button class="btn btn-primary btn-sm mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
  //                   <div class="text-start"><a class="nav-link-style fs-ms" id="quickviewBtn" data-id="$product_id" href="#quick-view" data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
  //               </div>
  //           </div>
  //       </div>
  //   </div>
  // HTML;
// }else{

  $jsonData .= <<<HTML
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
// }

  }
} else {
  $jsonData = 'No data found';
}

  echo json_encode($jsonData);





  
  // echo json_encode($brandname);








?>