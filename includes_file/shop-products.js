// Declare an empty array and initialize the resultDiv variable
const ajaxRequestValue = {};
const productList = $('#product-list-wrapp');
const pagination = $('.pageItemlist');


function ajaxRequest(ajaxRequestValue, pageNo = 1){
  ajaxRequestValue["paginate"] = pageNo; 
            $.ajax({
            url:  window.location.origin +"/e-shop/back-end/product-setup.php",
            type: 'GET',
            data: ajaxRequestValue,
            dataType: 'json', 
            success: function(response) {
    
                productList.empty();   pagination.empty();
                productList.append(response.products);
                
                pagination.append(response.pagelist)
                paginateFunc(response.totalProduct); pageclicking();
            
              },
            error: function(error) {
                console.error('Error:', error);
            }
        });

        }
// Function to handle pagination
function paginateFunc(totalProduct) {
  const productamount = $('.total-product');
  productamount.html("of "+ totalProduct +" products");
  if(totalProduct < 15){
  $('#paginateNav').addClass('d-none');
  }else{ $('#paginateNav').removeClass('d-none');}
  const pageItemlist = $('.pageItemlist');
  const pagelinkstatic = $('.page-link-static');

  const activePage = pageItemlist.find('.active').text();
  const totalPage = pageItemlist.find('li').length;
  let translateRate = (activePage - 2) * 41;

  if (activePage >= totalPage - 2) {
    translateRate = (totalPage - 3) * 41;
  }

  if (activePage <= 3) {
    translateRate = 0;
  }

  pagelinkstatic.html(activePage +"/"+totalPage)
  pageItemlist.css('transform', `translateX(-${translateRate}px)`);
}

// Function to handle page clicking
function pageclicking() {
  // Attach a click event to list items within .pageItemlist
  $('.pageItemlist li').click(function(event) {
    event.preventDefault();
    // Make an AJAX request with the clicked page value
    ajaxRequest(ajaxRequestValue, $(this).text());
  });
}

// Click event for previous and next page buttons
$('.pagination .pagePrev, .pagination .pageNext').click(function(event) {
  event.preventDefault();
  const activePage = $('.pageItemlist .active');
  const active = parseInt(activePage.text());
  const total = $('.pageItemlist li').length;
  const page = $(this).hasClass('pagePrev') ? active - 1 : active + 1;

  // Ensure the new page is within a valid range and make an AJAX request
  if (page >= 1 && page <= total) {
    ajaxRequest(ajaxRequestValue, page);
  }
});

// Click event for left arrow button
$('.pagenumWrap .left-page-arrow').click(function(event) {
  const pageItemlist = $('.pageItemlist');
  const currentTranslate = parseFloat(pageItemlist.css('transform').split(',')[4]);
  const translateRate = (currentTranslate >= -180) ? 0 : (currentTranslate + 205);
  pageItemlist.css('transform', `translateX(${translateRate}px)`);
});

// Click event for right arrow button
$('.pagenumWrap .right-page-arrow').click(function(event) {
  const pageItemlist = $('.pageItemlist');

  const paginateWidth =  parseInt(pageItemlist.css('width'));

  const currentTranslate = parseFloat(pageItemlist.css('transform').split(',')[4]);

  const lastTrans = `-${paginateWidth - 470}`;

  const translateRate = (currentTranslate < lastTrans) ? `-${paginateWidth -235 }` : (currentTranslate - 205);

  // Apply the new transformation to the page item list and log for debugging
  pageItemlist.css('transform', `translateX(${translateRate}px)`);

});

// Initial AJAX request
ajaxRequest(ajaxRequestValue);

// Event handler for filtering products based on category
$(".widget-list-link").click(function(event) {
  event.preventDefault();
  var categoryItem = $(this).find(".widget-filter-item-text").text();

  if (categoryItem == "View all") {
    categoryItem = $(this).parents(".accordion-item").find('.accordion-button').text();
  }

  ajaxRequestValue["category"] = categoryItem;
  ajaxRequest(ajaxRequestValue);
});
// Event handler for sorting products based on sections
$("#product-sorting").change(function() {
  
  var sortingval = $(this).val();


  ajaxRequestValue["sorting"] = sortingval;
  ajaxRequest(ajaxRequestValue);
});

// Event handler for filtering products based on search
$("#product-search .search").keyup(function() {
  var search = $(this).val();
  ajaxRequestValue["search"] = search;
  ajaxRequest(ajaxRequestValue);
});

// Function to handle price filter changes
function priceFilterInputChange() {
  delete ajaxRequestValue.minPrice;
  delete ajaxRequestValue.maxPrice;
  var minPrice = $(".range-slider-value-min").val();
  var maxPrice = $(".range-slider-value-max").val();

  if (minPrice > 0) {
    ajaxRequestValue['minPrice'] = minPrice;
  }
  if (maxPrice > 0 && maxPrice >= minPrice) {
    ajaxRequestValue['maxPrice'] = maxPrice;
  }

  ajaxRequest(ajaxRequestValue);
}

// Event handler for price filter changes
$(".range-slider-value-max, .range-slider-value-min").keyup(priceFilterInputChange);

// Event handler for brand filter checkboxes
$('#brand-filter-List input[type="checkbox"]').change(function() {
  var checkedLabels = [];
  $('#brand-filter-List input[type="checkbox"]:checked').each(function() {
    var labelText = $(this).parent().text();
    checkedLabels.push(labelText);
  });

  // Get all checked labels as an array
  var checkedBrandsArray = checkedLabels.map(function(label) {
    return label.trim();
  });

  ajaxRequestValue['brand'] = checkedBrandsArray;
  ajaxRequest(ajaxRequestValue);
});
