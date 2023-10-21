<?php require_once("includes_file/header.php"); ?>
<!-- Dashboard header-->
<div class="page-title-overlap bg-accent pt-4">
  <div class="container d-flex flex-wrap flex-sm-nowrap justify-content-center justify-content-sm-between align-items-center pt-2">
    <div class="d-flex align-items-center pb-3">
      <div class="img-thumbnail rounded-circle position-relative flex-shrink-0" style="width: 6.375rem;"><img class="rounded-circle" src="img/marketplace/account/avatar.png" alt="Createx Studio"></div>
      <div class="ps-3">
        <h3 class="text-light fs-lg mb-0">Createx Studio</h3>
        <span class="d-block text-light fs-ms opacity-60 py-1">Member since November 2019</span>
      </div>
    </div>
    <div class="d-flex">
      <div class="text-sm-end me-5">
        <div class="text-light fs-base">Total sales</div>
        <h3 class="text-light">426</h3>
      </div>
      <div class="text-sm-end">
        <div class="text-light fs-base">Seller rating</div>
        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
        </div>
        <div class="text-light opacity-60 fs-xs">Based on 98 reviews</div>
      </div>
    </div>
  </div>
</div>
<div class="container mb-5 pb-3">
  <div class="bg-light shadow-lg rounded-3 overflow-hidden">
    <div class="row">
      <!-- Sidebar-->
      <aside class="col-lg-4 pe-xl-5">
        <!-- Account menu toggler (hidden on screens larger 992px)-->
        <div class="d-block d-lg-none p-4"><a class="btn btn-outline-accent d-block" href="#account-menu" data-bs-toggle="collapse"><i class="ci-menu me-2"></i>Account menu</a></div>
        <!-- Actual menu-->
        <div class="h-100 border-end mb-2">
          <div class="d-lg-block collapse" id="account-menu">
            <div class="bg-secondary p-4">
              <h3 class="fs-sm mb-0 text-muted">Account</h3>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="dashboard-settings.html"><i class="ci-settings opacity-60 me-2"></i>Settings</a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="dashboard-purchases.html"><i class="ci-basket opacity-60 me-2"></i>Purchases</a></li>
              <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="dashboard-favorites.html"><i class="ci-heart opacity-60 me-2"></i>Favorites<span class="fs-sm text-muted ms-auto">4</span></a></li>
            </ul>
            <div class="bg-secondary p-4">
              <h3 class="fs-sm mb-0 text-muted">Seller Dashboard</h3>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="dashboard-sales.html"><i class="ci-dollar opacity-60 me-2"></i>Sales<span class="fs-sm text-muted ms-auto">$1,375.00</span></a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="dashboard-products.html"><i class="ci-package opacity-60 me-2"></i>Products<span class="fs-sm text-muted ms-auto">5</span></a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="dashboard-add-new-product.html"><i class="ci-cloud-upload opacity-60 me-2"></i>Add New Product</a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="dashboard-payouts.html"><i class="ci-currency-exchange opacity-60 me-2"></i>Payouts</a></li>
              <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-signin.html"><i class="ci-sign-out opacity-60 me-2"></i>Sign out</a></li>
            </ul>
            <hr>
          </div>
        </div>
      </aside>
      <!-- Content-->
      <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
        <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
          <!-- Title-->
          <div class="d-sm-flex flex-wrap justify-content-between align-items-center pb-2">
            <h2 class="h3 py-2 me-2 text-center text-sm-start">Add New Product</h2>
          </div>
          <form method="post" action="back-end/product-add.php" enctype="multipart/form-data">
            <div class="mb-3 pb-2 row">
              <div class="col-md-8">
                <label class="form-label" for="unp-product-name">Product name</label>
                <input name="pName" class="form-control" type="text" id="unp-product-name" required>
                <div class="invalid-feedback">Please enter your first name!</div>
                <div class="form-text">Maximum 100 characters. No HTML or emoji allowed.</div>
              </div>
              <div class="col-md-4">
                <label class="form-label" for="product-brand">select Brand</label>
                <select name="pBrand" class="form-select" id="product-brand">
                  <option> None </option>
                  <option> Adidas </option>
                  <option> Ann Taylor </option>
                  <option> Armani </option>
                  <option> Banana Republic </option>
                  <option> Bilabong </option>
                  <option> Birkenstock </option>
                  <option> Calvin Klein </option>
                  <option> Columbia </option>
                  <option> Converse </option>
                  <option> Dockers </option>
                  <option> Fruit of the Loom </option>
                  <option> Hanes </option>
                  <option> Jimmy Choo </option>
                  <option> Levi's </option>
                  <option> Lee </option>
                  <option> Men's Wearhouse </option>
                  <option> New Balance </option>
                  <option> Nike </option>
                  <option> Old Navy </option>
                  <option> Polo Ralph Lauren </option>
                  <option> Puma </option>
                  <option> Reebok </option>
                  <option> Skechers </option>
                  <option> Tommy Hilfiger </option>
                  <option> Under Armour </option>
                  <option> Urban Outfitters </option>
                  <option> Victoria's Secret </option>
                  <option> Wolverine </option>
                  <option> Wrangler </option>
                </select>
              </div>
            </div>
            <div class="file-drop-area mb-3">
              <div class="file-drop-icon ci-cloud-upload"></div>
              <span class="file-drop-message">Drag and drop here to upload product screenshot</span>
              <input name="imgUrl" class="file-drop-input" type="file">
              <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select file</button>
              <div class="form-text">1000 x 800px ideal size for hi-res displays</div>
            </div>
            <div class="mb-3 py-2 row">
              <div class="col-md-8">
                <label class="form-label" for="unp-product-description">Product description</label>
                <textarea name="pDesc" class="form-control" rows="6" id="unp-product-description"></textarea>
                <div class="bg-secondary p-3 fs-ms rounded-bottom"><span class="d-inline-block fw-medium me-2 my-1">Markdown supported:</span><em class="d-inline-block border-end pe-2 me-2 my-1">*Italic*</em><strong class="d-inline-block border-end pe-2 me-2 my-1">**Bold**</strong><span class="d-inline-block border-end pe-2 me-2 my-1">- List item</span><span class="d-inline-block border-end pe-2 me-2 my-1">##Heading##</span><span class="d-inline-block">--- Horizontal rule</span></div>
              </div>
              <div class="col-md-4">
                <label class="form-label" for="product-cetagory">select cetagory</label>
                <select name="pCetagory" class="form-select" id="product-cetagory">
                  <option> None </option>
                  <option> Shoes </option>
                  <option> Clothing </option>
                  <option> Bags </option>
                  <option> Sunglasses </option>
                  <option> Watches </option>
                  <option> Accessories </option>
                </select>
                <select name="pStyle" class="form-select mt-4" id="product-style">
                  <option> None </option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mb-3">
                <label class="form-label" for="unp-standard-price">Standard license price</label>
                <div class="input-group"><span class="input-group-text"><i class="ci-dollar"></i></span>
                  <input name="price" class="form-control" type="text" id="unp-standard-price" required>
                </div>
                <div class="form-text">Average marketplace price for this category is $15.</div>
              </div>
              <div class="col-sm-6 mb-3">
                <label class="form-label" for="unp-extended-price">Extended license price</label>
                <div class="input-group"><span class="input-group-text"><i class="ci-dollar"></i></span>
                  <input name="exPrice" class="form-control" type="text" id="unp-extended-price">
                </div>
                <div class="form-text">Typically 10x of the Standard license price.</div>
              </div>
            </div>
            <div class="mb-3 py-2">
              <label class="form-label" for="unp-product-tags">Product tags</label>
              <textarea name="pTages" class="form-control" rows="4" id="unp-product-tags"></textarea>
              <div class="form-text">Up to 10 keywords that describe your item. Tags should all be in lowercase and separated by commas.</div>
            </div>
            <button name="add-product" class="btn btn-primary d-block w-100" type="submit"><i class="ci-cloud-upload fs-lg me-2"></i>Upload Product</button>
          </form>
        </div>
      </section>
    </div>
  </div>
</div>


<?php 
$script .= '
//  add product page make the select cetagory option relational
const categoryToStyle = {
  "None": ["None"],
  "Shoes": [
    "Pumps & High Heels", "Ballerinas & Flats", "Sandals", "Sneakers", "Boots", "Ankle Boots",
    "Loafers", "Slip-on", "Flip Flops", "Clogs & Mules", "Athletic Shoes", "Oxfords", "Smart Shoes"
  ],
  "Clothing": [
    "Blazers & Suits", "Blouses", "Cardigans & Jumpers", "Dresses", "Hoodie & Sweatshirts",
    "Jackets & Coats", "Jeans", "Lingerie", "Maternity Wear", "Nightwear", "Shirts", "Shorts",
    "Socks & Tights", "Sportswear", "Swimwear", "T-shirts & Vests", "Tops", "Trousers", "Underwear"
  ],
  "Bags": [
    "Handbags", "Backpacks", "Wallets", "Luggage", "Lumbar Packs", "Duffle Bags",
    "Bag / Travel Accessories", "Diaper Bags", "Lunch Bags", "Messenger Bags", "Laptop Bags", "Briefcases", "Sport Bags"
  ],
  "Sunglasses": ["Fashion Sunglasses", "Sport Sunglasses", "Classic Sunglasses"],
  "Watches": ["Fashion Watches", "Casual Watches", "Luxury Watches", "Sport Watches"],
  "Accessories": ["Belts", "Hats", "Jewelry", "Cosmetics"]
};

';

  
$script .= "const selectCetagory = document.getElementById('product-cetagory');
const selectstyle = document.getElementById('product-style');

// Add an event listener to selectCetagory to update selectstyle
selectCetagory.addEventListener('change', function () {
  while (selectstyle.options.length > 0) {
    selectstyle.remove(0); 
}
  const selectedOption = selectCetagory.options[selectCetagory.selectedIndex].value;
  const optionsArray = categoryToStyle[selectedOption]
for (var i = 0; i < optionsArray.length; i++) {
    var option = document.createElement('option');
    option.text = optionsArray[i];
    option.value = optionsArray[i]; // You can set the value attribute if needed
    selectstyle.appendChild(option);
}
});
";
  




require_once("includes_file/footer.php"); ?>
