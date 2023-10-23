<?php
require_once('./back-end/dbconnection.php');

// //  alert massege showing and hide if isset coockie
// if(isset($_COOKIE['alertmsg'])){
//   echo "
//       document.querySelector('.alertContainer').style.top='0px';
//       document.querySelector('.alertMsg').innerHTML='" . $_COOKIE['alertmsg'] . "';

//       setTimeout(function() {
//         document.querySelector('.alertContainer').style.top='-100px';
//     }, 8000)
//   ";
// }

// settitng all profile information from database by session checking

// if (isset($_SESSION['userId'])) {

  // $stmt = $conn->prepare("SELECT * FROM userlist WHERE email = ?");
  // $stmt->bind_param("s", $_SESSION['userId']);  $stmt->execute(); 
  // $user = $stmt->get_result()->fetch_assoc();

  // $firstname = $user['first_name'];
  // $lastname = $user['last_name'];
  // $email = $user['email'];
  // $phone = $user['phone'];
  
 // echo"
  

  //   document.querySelector('.userNamechar a').setAttribute('href', 'account-setting.php');
  //   document.querySelector('.userNamechar').classList.add('dropdown');

  //   document.querySelector('.userProName small').innerHTML = '". $firstname."' ;
  //   document.querySelector('.userProName span').innerHTML = '". $lastname."' ; 

    
  //   $('.profileUsername').each(function() { $(this).html('". $firstname." ". $lastname."'); });
  //   $('.profileEmail').each(function() { $(this).html('". $email ."'); });
    
  //   $('#account-phone').each(function() { $(this).val('".$phone."'); });
  //   $('#account-fn').each(function() { $(this).val('". $firstname ."'); });
  //   $('#account-ln').each(function() { $(this).val('". $lastname ."'); });
  //   $('#account-email').each(function() { $(this).val('". $email ."'); });
  //   $('#emailhide').each(function() { $(this).val('". $email ."'); });

  //   $('.userProName small').html((index, currentText) =>
  //     currentText.length > 10 ? currentText.substring(0, 9) + '...' : currentText
  //   );
  //   $('.userProName span').html((index, currentText) =>
  //     currentText.length > 10 ? currentText.substring(0, 9) + '...' : currentText
  //   );

// ";

}else{

  // setting account link to signin form if not looged in 
   echo "
   
   $('.userNamechar a').each(function() { $(this).attr('href', '#signin-modal'); })
   $('.userNamechar a').each(function() { $(this).attr('data-bs-toggle', 'modal'); })
 
 ";}

// quick modal view image link set dynamicaly 
// echo "
// $('.image-zoom').attr('src', '". $img_url."');
// $('.image-view-thumb').attr('src', '". $img_url."');
// $('.image-zoom').attr('data-zoom',  '". $img_url."');

// ";


require_once("javascript.js");

// $conn->close();

?>