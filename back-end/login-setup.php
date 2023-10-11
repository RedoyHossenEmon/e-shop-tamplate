<?php

// Include the database connection
include 'dbconnection.php';


function alertFunc($alertMsg){
  header("location: ../user-signup.php");
  setcookie('alertmsg', "$alertMsg", time() + 5, '/e-shop', 'localhost');
  exit();
}

function alertReturn($alertMsg){
  header("location: ../account-setting.php");
  setcookie('alertmsg', "$alertMsg", time() + 5, '/e-shop', 'localhost');
  exit();
}
function setSession( $sessionEmail ){
  $_SESSION['userId'] = $sessionEmail;
  header("Location: ../index.php"); // Redirect to login page
  exit();
  
}

// triming all value which got by post method

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(isset($_POST['first_name']) || isset($_POST['last_name']) ){
  $_POST['first_name']= trim($_POST['first_name']);
  $_POST['last_name']= trim($_POST['last_name']);
  }  
}


// signup class system checking error and set save data

class singupSetupClass {
  private $conn;
  public function __construct($dbConnection) {
    $this->conn = $dbConnection;
  }
  public function errhendleFunc($first_name, $last_name, $email,$password,$password_2, $phone){

  

    // Check for empty fields
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($password_2) || empty($phone)) {
      alertFunc("Please Insert required filed !");

    }

    // Check if email format is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      alertFunc("Please insert a valied Email !");
    }

    // Check if passwords match
    if ($password !== $password_2) {
      alertFunc("Passwords did not match ! ");
    }

    // Check if email already exists in the database
    $query = "SELECT * FROM userlist WHERE email = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    
    if ($result->num_rows > 0) {
      alertFunc("User With this Email already exists.");
    }

    // If no errors, insert data into the database
    $accountType = "customer";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $insertQuery = "INSERT INTO userlist (first_name, last_name, email, password, phone, account_type) VALUES (?,?,?,?, ?, ?)";
    $insertStmt = $this->conn->prepare($insertQuery);
    $insertStmt->bind_param("ssssss", $first_name, $last_name, $email, $hashedPassword, $phone, $accountType);
   
    if ($insertStmt->execute()) {
        // Registration successful

        setcookie('alertmsg', "Signup Successfull..", time() + 5, '/e-shop', 'localhost');
        setSession($email);

    } else {
      alertFunc("Error registering user.");
    }
    $insertStmt->close();

  }
}


// login setup system error checking and session set 
class UserLogin {
  private $conn;

  public function __construct($dbConnection) {
      $this->conn = $dbConnection;
  }

  public function login($email, $password) {
      if (empty($email) || empty($password)) {
        alertFunc("Both email and password are required.");
      } else {  
        $query = "SELECT * FROM userlist WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

          if ($result->num_rows == 1) {
              $user = $result->fetch_assoc();

              if (password_verify($password, $user["password"])) {
                  // Password matches, successful login
                  $stmt = $this->conn->prepare("SELECT id FROM userlist WHERE email = ?");
                  $stmt->bind_param("s", $email);
                  $stmt->execute(); 
                  $id = ($result = $stmt->get_result()->fetch_assoc()) ? $result['id'] : null;
                  

                  setcookie('alertmsg', "Login successfull..", time() + 5, '/e-shop', 'localhost');
                setSession( $email);

              } else {
                alertFunc("Invalid password.");
              }
          } else {
            alertFunc( "User not found.");
          }
      }
  }
}


// user info update system checking error and update data

class userproUpdate{
  public function __construct($dbConnection) {
    $this->conn = $dbConnection;
  }
  public function userUpdateFunc($first_name,$last_name,$email,$phone,$password,$password_2,$user_pwd) {
    
    if (empty($first_name) || empty($last_name) || empty($phone)) {
      alertReturn("Empty value can not be saved!");
    } else {  
      $stmt = $this->conn->prepare("SELECT * FROM userlist WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if (password_verify($user_pwd, $user["password"])) {

              if(!empty($password) && !empty($password_2)){
                if($password != $password_2){
                  alertReturn("to set new password both filed need to be same.");
              
                }
      $passwordhashed = password_hash($password, PASSWORD_DEFAULT);

                $sql = "UPDATE userlist SET first_name = ?, last_name = ?, phone = ?, `password` = ? WHERE email = ?";

                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$first_name, $last_name, $phone, $passwordhashed, $email]);
              
              }

          // if user update his information without seting new password
              
              $sql = "UPDATE userlist SET first_name = ?, last_name = ?, phone = ? WHERE email = ?";

              // Prepare the statement and execute
              $stmt = $this->conn->prepare($sql);
              $stmt->execute([$first_name, $last_name, $phone, $email]);

              
              alertReturn("Your information successfully updated..");
            }else{
              alertReturn("Wrong Password!  Your information did not update.");
            }
 
          } else {
            alertReturn("Unexpected error please try again.");
          }

    }
  }

}









  // if requested for signup user
if (isset($_POST["signup_submit"])) {

    // Retrieve form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_2 = $_POST["password_2"];
    $phone = $_POST["phone"];

  $singupSetupClass = new singupSetupClass($conn);
  $singupSetupClass->errhendleFunc($first_name, $last_name, $email,$password,$password_2, $phone);


}

  // if requested for login user 
if (isset($_POST["login_submit"])) {

    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];


  $loginResult = new UserLogin($conn);
  $loginResult = $loginResult->login($email, $password);


}

// if requested for update user  information
if (isset($_POST["update_submit"])) {

  // Retrieve form data
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $password_2 = $_POST["password_2"];
  $phone = $_POST["phone"];
  $user_pwd = $_POST["user_pwd"];

  $userproUpdate = new userproUpdate($conn);
 $userproUpdate->userUpdateFunc($first_name,$last_name,$email,$phone,$password,$password_2,$user_pwd);
  

}







?>


