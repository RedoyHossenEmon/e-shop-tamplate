<?php
require_once("dbconnection.php");

$randomBytes = random_bytes(5);
$hexCode = bin2hex($randomBytes);


function alertFunc($alertMsg){
  header("location: ../add-new-product.php");
  setcookie('alertmsg', "$alertMsg", time() + 5, '/e-shop', 'localhost');
  exit();
}

function img_upload(){
  global $hexCode;
    $originalFileName = $_FILES["imgUrl"]["name"];
  $imageFileType = pathinfo($originalFileName, PATHINFO_EXTENSION);
  $savedFilename = pathinfo($originalFileName, PATHINFO_FILENAME) . $hexCode."." . $imageFileType;
  $targetFile ="../img/product/".$savedFilename;
    // Check file size (you can set a maximum file size)
    if ($_FILES["imgUrl"]["size"] > 3000000) { // 3MB
        alertFunc("Sorry, your file is too large.");
      }
      
      // Allow only specific file types ( jpg, png, pdf)
    $allowedExtensions = array("jpg", "png", "pdf");
    if (!in_array($imageFileType, $allowedExtensions)) {
       alertFunc("Sorry, only JPG, PNG, and PDF files are allowed.");
  
    }

    if ( move_uploaded_file($_FILES["imgUrl"]["tmp_name"], $targetFile)) {
      return $savedFilename;
    }else{alertFunc("Sorry, there was an error uploading your file.");
    }
    
}





  
  
if (isset($_POST['add-product'])) {
    // print_r($_POST);

    foreach ($_POST as $key => $value) {
      $_POST[$key] = trim($value);
  }


$product_id = $hexCode;
$product_name = $_POST["pName"];
$price = $_POST["price"];
$ex_price = $_POST["exPrice"];
$brand = ($_POST["pBrand"] == "None") ? "" : $_POST['pBrand'];
$cetagory = ($_POST["pCetagory"] == "None") ? "" : $_POST['pCetagory'];
$style = ($_POST["pStyle"] == "None") ? "" : $_POST['pStyle'];
$description = $_POST["pDesc"];
$product_tags = $_POST["pTages"];
$img_url_name = $_FILES["imgUrl"]["name"];
$img_url = (empty($img_url_name)) ? null : img_upload();

if (empty($product_name) || empty($price) ) {
  alertFunc("Please fill all nessesary info.");

} 


    $sql = "INSERT INTO `productlist` ( `product_id`, `product_name`, `img_url`, `price`, `ex_price`, `brand`, `category`, `style`, `description`, `product_tags`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $product_id, $product_name, $img_url, $price, $ex_price, $brand, $cetagory, $style, $description, $product_tags);


// Execute the query
    if ($stmt->execute()) {
        alertFunc("Record inserted successfully!");
    } else {
      alertFunc("Unexpected Error:");
    }
    

}
  
  
  
  

  

  
  ?>