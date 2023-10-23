<?php 
session_start();
if(!isset($_SESSION['userId'])){
  setcookie('alertmsg', "Please log in to your account to ensure security and access to essential services...", time() + 5, '/e-shop', 'localhost');
  header("location:index.php");
  exit();
}
 require_once("includes_file/header.php");?>

<!-- Order Details Modal-->
      <div class="modal fade" id="order-details">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Order No - 34VB5540K83</h5>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-0">
              <!-- Item-->
              <div class="d-sm-flex justify-content-between mb-4 pb-3 pb-sm-2 border-bottom">
                <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto" href="shop-single-v1.html" style="width: 10rem;"><img src="img/shop/cart/01.jpg" alt="Product"></a>
                  <div class="ps-sm-4 pt-2">
                    <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">Women Colorblock Sneakers</a></h3>
                    <div class="fs-sm"><span class="text-muted me-2">Size:</span>8.5</div>
                    <div class="fs-sm"><span class="text-muted me-2">Color:</span>White &amp; Blue</div>
                    <div class="fs-lg text-accent pt-2">$154.<small>00</small></div>
                  </div>
                </div>
                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                  <div class="text-muted mb-2">Quantity:</div>1
                </div>
                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                  <div class="text-muted mb-2">Subtotal</div>$154.<small>00</small>
                </div>
              </div>
              <!-- Item-->
              <div class="d-sm-flex justify-content-between my-4 pb-3 pb-sm-2 border-bottom">
                <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto" href="shop-single-v1.html" style="width: 10rem;"><img src="img/shop/cart/02.jpg" alt="Product"></a>
                  <div class="ps-sm-4 pt-2">
                    <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">TH Jeans City Backpack</a></h3>
                    <div class="fs-sm"><span class="text-muted me-2">Brand:</span>Tommy Hilfiger</div>
                    <div class="fs-sm"><span class="text-muted me-2">Color:</span>Khaki</div>
                    <div class="fs-lg text-accent pt-2">$79.<small>50</small></div>
                  </div>
                </div>
                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                  <div class="text-muted mb-2">Quantity:</div>1
                </div>
                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                  <div class="text-muted mb-2">Subtotal</div>$79.<small>50</small>
                </div>
              </div>
              <!-- Item-->
              <div class="d-sm-flex justify-content-between my-4 pb-3 pb-sm-2 border-bottom">
                <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto" href="shop-single-v1.html" style="width: 10rem;"><img src="img/shop/cart/03.jpg" alt="Product"></a>
                  <div class="ps-sm-4 pt-2">
                    <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">3-Color Sun Stash Hat</a></h3>
                    <div class="fs-sm"><span class="text-muted me-2">Brand:</span>The North Face</div>
                    <div class="fs-sm"><span class="text-muted me-2">Color:</span>Pink / Beige / Dark blue</div>
                    <div class="fs-lg text-accent pt-2">$22.<small>50</small></div>
                  </div>
                </div>
                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                  <div class="text-muted mb-2">Quantity:</div>1
                </div>
                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                  <div class="text-muted mb-2">Subtotal</div>$22.<small>50</small>
                </div>
              </div>
              <!-- Item-->
              <div class="d-sm-flex justify-content-between my-4">
                <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto" href="shop-single-v1.html" style="width: 10rem;"><img src="img/shop/cart/04.jpg" alt="Product"></a>
                  <div class="ps-sm-4 pt-2">
                    <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">Cotton Polo Regular Fit</a></h3>
                    <div class="fs-sm"><span class="text-muted me-2">Size:</span>42</div>
                    <div class="fs-sm"><span class="text-muted me-2">Color:</span>Light blue</div>
                    <div class="fs-lg text-accent pt-2">$9.<small>00</small></div>
                  </div>
                </div>
                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                  <div class="text-muted mb-2">Quantity:</div>1
                </div>
                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                  <div class="text-muted mb-2">Subtotal</div>$9.<small>00</small>
                </div>
              </div>
            </div>
            <!-- Footer-->
            <div class="modal-footer flex-wrap justify-content-between bg-secondary fs-md">
              <div class="px-2 py-1"><span class="text-muted">Subtotal:&nbsp;</span><span>$265.<small>00</small></span></div>
              <div class="px-2 py-1"><span class="text-muted">Shipping:&nbsp;</span><span>$22.<small>50</small></span></div>
              <div class="px-2 py-1"><span class="text-muted">Tax:&nbsp;</span><span>$9.<small>50</small></span></div>
              <div class="px-2 py-1"><span class="text-muted">Total:&nbsp;</span><span class="fs-lg">$297.<small>00</small></span></div>
            </div>
          </div>
        </div>
      </div>
      <!-- Page Title-->
      <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="ci-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
                </li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page">Orders history</li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">My orders</h1>
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
            <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
              <div class="d-flex align-items-center">
                <label class="d-none d-lg-block fs-sm text-light text-nowrap opacity-75 me-2" for="order-sort">Sort orders:</label>
                <label class="d-lg-none fs-sm text-nowrap opacity-75 me-2" for="order-sort">Sort orders:</label>
                <select class="form-select" id="order-sort">
                  <option>All</option>
                  <option>Delivered</option>
                  <option>In Progress</option>
                  <option>Delayed</option>
                  <option>Canceled</option>
                </select>
              </div><a class="btn btn-primary btn-sm d-none d-lg-inline-block" id="logoutBtn"><i class="ci-sign-out me-2"></i>Sign out</a>
            </div>
            <!-- Orders list-->
            <div class="table-responsive fs-md mb-4">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>Order #</th>
                    <th>Date Purchased</th>
                    <th>Status</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
<?php

require_once("back-end/dbconnection.php");


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Perform SELECT query
$sql = "SELECT * FROM orderlist";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while ($row = $result->fetch_assoc()) {
   $order_id = $row['order_id'];
   $purchaseDate = $row['purchaseDate'];
   $order_price = $row['order_price'];
   $status = $row['status'];
      echo '
    <tr class="nav-link-style fw-medium fs-sm" href="#order-details" data-bs-toggle="modal">
      <td class="py-3"><b>'. $order_id .'</b> </td>
      <td class="py-3">'. $purchaseDate .'</td>
      <td class="py-3"><span class="badge statusBtn m-0 " style="font-size:0.85em">'. $status .'</span></td>
      <td class="py-3">$'. $order_price .'</td>
    </tr>
      ';
  }
} else {
  echo "No records found";
} 

?>







                </tbody>
              </table>
            </div>
            <!-- Pagination-->
            <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Prev</a></li>
              </ul>
              <ul class="pagination">
                <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
              </ul>
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></a></li>
              </ul>
            </nav>
          </section>
        </div>
      </div>
 
 
<?php

$script .= "
  
  // in order page background color chacnging dipending on status 
  statusClass = 'bg-primary';
  stausBtn = $('.statusBtn');

 stausBtn.each(function() {
  switch ($(this).html().toLowerCase()) {
    case 'canceled':
      statusClass = 'bg-danger';
      break;
    case 'in progress':
      statusClass = 'bg-info';
      break;
    case 'delayed':
      statusClass = 'bg-warning';
      break;
    case 'delivered':
      statusClass = 'bg-success';
      break;
    default:
      statusClass = 'bg-primary';
      break;
  };
  $(this).addClass(statusClass);
  
 });
";
$script .="
  // orderlist select form filtering 

  orderForm = $('#order-sort');

  orderForm.change(function() {
  
  stausBtn.each(function() {
    $(this).parent().parent().show();
 
    if($(this).html().toLowerCase() !== orderForm.val().toLowerCase()) {
      // $(this).parent() = '';
      $(this).parent().parent().hide();
      }
    if(orderForm.val().toLowerCase() =='all'){
      $(this).parent().parent().show();
      }
  })
 })
";



require_once("includes_file/footer.php"); ?>