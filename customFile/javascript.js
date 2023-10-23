// // setting ne password toggle by click div 
// $('.password-change-toggle')
//   .click(function() {
//     $('.confirm-pass-wrap').toggle();
//     $('.pass-wrap').toggle();
//   });

// // confirm password error showing in live when submiting two password 
// const password = $('#account-confirm-pass');
// const confirmPassword = $('#account-pass');

// function pwdMatchFunc(password, confirmPassword) {
//   if (password !== confirmPassword) {
//     $('.pwdMatch').css('display', 'block');
//     $('#updateprofilebtn').each(function() {
//         $(this).removeAttr('data-bs-toggle');
//       })
//   } else {
//     $('.pwdMatch').css('display', 'none');
//     $('#updateprofilebtn').each(function() {
//         $(this).attr('data-bs-toggle', 'modal');
//       })
//   }
// }

// $('#account-pass').on('keyup', function() {
//     pwdMatchFunc($(this).val(), $('#account-confirm-pass').val());
    
//   });
// $('#account-confirm-pass').on('keyup', function() {
//     pwdMatchFunc($(this).val(), $('#account-pass').val());
//   });
//   $('#password-prompt').on('shown.bs.modal', function () {
//     $('#popup-password').focus();
//   });


// // in order page background color chacnging dipending on status 
// statusClass = 'bg-primary';
// stausBtn = $('.statusBtn');

// stausBtn.each(function() {
//   switch ($(this).html().toLowerCase()) {
//     case 'canceled':
//       statusClass = 'bg-danger';
//       break;
//     case 'in progress':
//       statusClass = 'bg-info';
//       break;
//     case 'delayed':
//       statusClass = 'bg-warning';
//       break;
//     case 'delivered':
//       statusClass = 'bg-success';
//       break;
//     default:
//       statusClass = 'bg-primary';
//       break;
//   };
//   $(this).addClass(statusClass);
  
// });

// // orderlist select form filtering 

// orderForm = $('#order-sort');

// orderForm.change(function() {
  
//   stausBtn.each(function() {
//     $(this).parent().parent().show();
 
//     if($(this).html().toLowerCase() !== orderForm.val().toLowerCase()) {
//       // $(this).parent() = '';
//       $(this).parent().parent().hide();
//       }
//     if(orderForm.val().toLowerCase() =='all'){
//       $(this).parent().parent().show();
//       }
//   })
// })



  // $('.dropdown-item').hover(() => $(this).css('margin-right', '10px'));

// // set logout link of every logout button
// $('#logoutBtn').attr('href', '#confirm-logout');
// $('#logoutBtn').attr('data-bs-toggle', 'modal');



// // set grid view and list view link
// $('#view-list').attr('href', 'shop-products.php?shop-list-ls');
// $('#view-grid').attr('href', 'shop-products.php');


// //  add product page make the select cetagory option relational
//   const cetagorytostyle = {

//   "Shoes": ["Pumps & High Heels", "Ballerinas & Flats", "Sandals", "Sneakers", "Boots", "Ankle Boots", "Loafers", "Slip-on", "Flip Flops", "Clogs & Mules", "Athletic Shoes", "Oxfords", "Smart Shoes"],
//   "Clothing": ["Blazers & Suits", "Blouses", "Cardigans & Jumpers", "Dresses", "Hoodie & Sweatshirts", "Jackets & Coats", "Jeans", "Lingerie", "Maternity Wear", "Nightwear", "Shirts", "Shorts", "Socks & Tights", "Sportswear", "Swimwear", "T-shirts & Vests", "Tops", "Trousers", "Underwear"],
//   "Bags": ["Handbags", "Backpacks", "Wallets", "Luggage", "Lumbar Packs", "Duffle Bags", "Bag / Travel Accessories", "Diaper Bags", "Lunch Bags", "Messenger Bags", "Laptop Bags", "Briefcases", "Sport Bags"],
//   "Sunglasses": ["Fashion Sunglasses", "Sport Sunglasses", "Classic Sunglasses"],
//   "Watches": ["Fashion Watches", "Casual Watches", "Luxury Watches", "Sport Watches"],
//   "Accessories": ["Belts", "Hats", "Jewelry", "Cosmetics"]
// };

// function updateStyleOptions() {
//   const selectedCetagory = $('#product-cetagory').val();
//   const productstyle = cetagorytostyle[selectedCetagory] || ['None'];
//   $('#product-style').empty();

//     // Add new options
//     $.each(productstyle, function(index, productstyle) {
//     $('#product-style').append(new Option(productstyle, productstyle));
//   });
// }
//   // Attach an event handler to the country select
//   $('#product-cetagory').change(updateStyleOptions);

// updateStyleOptions();



// $("#quickviewBtn").click(function() {

//   console.log($(this).attr("data-id")); 
// });















