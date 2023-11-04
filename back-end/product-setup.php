<?php

// Include the database connection file
require_once("../back-end/dbconnection.php");

// Execute the epmty variable to store data dyanamically
$jsonData = "";
$pageList ="";

$conditions = "";
$recordsPerPage = 20;
$currentPage = isset($_GET['paginate'])? $_GET['paginate'] : 1 ;
$start = ($currentPage - 1) * $recordsPerPage;
$totalProduct= 0;


// Check if a search parameter is provided
 if (isset($_GET['search'])) {
  $searchValue = trim(strtolower($_GET['search']));
  $conditions .= "AND (product_name LIKE '%$searchValue%' COLLATE utf8mb4_general_ci OR style LIKE '%$searchValue%' COLLATE utf8mb4_general_ci OR category LIKE '%$searchValue%' COLLATE utf8mb4_general_ci)";
}

// Check if a category parameter is provided
 if (isset($_GET['category'])) {
  $categoryValue = trim(strtolower($_GET['category']));
  $conditions .= " AND (product_name LIKE '%$categoryValue%' COLLATE utf8mb4_general_ci OR style LIKE '%$categoryValue%' COLLATE utf8mb4_general_ci OR category LIKE '%$categoryValue%' COLLATE utf8mb4_general_ci)";
}

// Check if a minimum price parameter is provided
 if (isset($_GET['minPrice'])) {
  $minPriceValue = trim($_GET['minPrice']);
  $conditions .= " AND (price >= $minPriceValue)";
}

// Check if a maximum price parameter is provided
 if (isset($_GET['maxPrice'])) {
  $maxPriceValue = trim($_GET['maxPrice']);
  $conditions .= " AND (price <= $maxPriceValue)";
}
// Check price or product name sorting request is provided
if (isset($_GET['sorting'])) {
  $sortValue = $_GET['sorting'];

 switch ($sortValue) {
  case 'patoz':
    $conditions .= " ORDER BY price ASC ";
    break;
  
  case 'pztoa':
    $conditions .= " ORDER BY price DESC ";
    break;
  
  case 'atoz':
    $conditions .= " ORDER BY product_name ASC ";
    break;
  
  case 'ztoa':
    $conditions .= " ORDER BY product_name DESC ";
    break;
  
 }

}

// Check if a brand parameter is provided
if (isset($_GET['brand'])) {
  $brandValue = implode("','", $_GET['brand']);
  $conditions .= " AND (brand IN ('$brandValue'))";
}

// Append conditions to the query
$query = "SELECT * FROM productlist WHERE id > 0 $conditions" ;
$conditionedQuery = $query." LIMIT  $recordsPerPage  OFFSET $start ";


// Execute the SQL query
$result = $conn->query($conditionedQuery);


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
        <button class="btn-wishlist btn-sm" type="button" title="Add to wishlist" data-proid="$product_id">
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

  $result = $conn->query($query);
 $totalProduct= $result->num_rows ;
$totalPage = ceil($totalProduct/ $recordsPerPage) ;


// $totalPage = 45;
 $counter = 1;

    
    for ($i = 1; $i <= $totalPage ; $i++) {

          $activeClass = ($currentPage == $i) ? "active" : "";

          $pageList .= '<li class="page-item border rounded '.$activeClass .'" style="width:40px"> <a class="page-link "> ' . $i . ' </a></li>';

    }


 }else{   $jsonData = "<h2> No Products availabe with your requerements. </h2>";}






echo json_encode( array('products' => $jsonData, 'pagelist' => $pageList, 'totalProduct' => $totalProduct));



?>











