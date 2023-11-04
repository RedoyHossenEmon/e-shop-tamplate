<?php
function alertFunc($alertMsg){
  

}
if(isset($_GET['proId'])){

  // if(){
    $check = $_SESSION['userId'];
    echo json_encode( array('alert' => $check));
    exit();
  // }


  $proId = $_GET['proId'];
  echo $proId;
}







?>