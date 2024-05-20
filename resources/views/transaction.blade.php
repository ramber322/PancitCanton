<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden; /* Prevent scrolling */
    }

    .container {
      max-width: 350px;
      margin: 0 auto;
      background: black;
      overflow: hidden;
      height: 100%;
    }

    .top-section {
      height: 50%;
      background-color: #E6E6FA;
    }

    .bottom-section {
      position: relative;
      height: 50%;
      background: rgb(53, 38, 87);
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }

    .reversed-triangle {
      width: 0;
      height: 0;
      border-left: 75px solid transparent;
      border-right: 75px solid transparent;
      position: relative;
      margin: 0 10px;
    }

    .reversed-triangle:first-child {
      border-top: 160px solid #E6E6FA;
    }

    .reversed-triangle:last-child {
      border-top: 160px solid #E6E6FA;
    }

    ::-webkit-scrollbar {
      display: none;
    }

    .modal-content {
      width: 80%;
      max-width: 350px;
      margin: auto;
      margin-top: 150px;
    }

    /* Styling for displayedpurchases */
    .displayedpurchases {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      max-height: 60%; /* Adjust maximum height as needed */
      overflow-y: auto;
      width: 220px;
    
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;



      background: rgba( 255, 255, 255, 0.15 );
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );

-webkit-backdrop-filter: blur( 0px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );

    }

    /* Style for the purchase buttons */
    .purchasenotify {
      margin-bottom: 10px;
    }

    .purchasenotify button {
      width: 200px;
      background: #36454F;
      border-radius: 100px;
    }
    .circle-img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    overflow: hidden;
    position: relative; /* Change fixed to relative */
    top: 5px;
    left: -40%; /* Use percentage value for left margin */
   
    z-index: 3; /* Increase the z-index to ensure it's above other elements */
}
.circle-img:hover {
    transform: scale(1.1); /* Increase the size on hover */
    transition: transform 0.3s ease; /* Add smooth transition */
    cursor: pointer; /* Change cursor to pointer on hover */
  }
  </style>
</head>
<body>

<div class="container">
  <div class="top-section">
    
    <div class="circle-img mx-auto mb-3" id="circle-img">
      <a href ="{{ route ('dashboard.testindex') }} "> <img src="https://cdn-icons-png.freepik.com/512/13742/13742341.png?ga=GA1.1.1730158141.1712038229&" class="img-fluid" alt="Back"> </a>
    </div>
    <h1 style ="font-size: 35px; text-align: center;" >Purchase History </h1>
  </div><!--ENDING TOP SECTION -->
  
  <div class="bottom-section">
    <div class="reversed-triangle"></div>
    <div class="reversed-triangle"></div>
  </div> <!--ENDING BOT SECTION-->

  <div class="displayedpurchases">
    @php
      $uniqueOrders = [];
    @endphp
    @foreach($purchases->reverse() as $purchase)
      @if (!in_array($purchase->order_id, $uniqueOrders))
        <div class="purchasenotify">
          <button class="btn btn-primary " style ="border-radius: 100px; " onclick="purchaseDetails({{ $purchase->order_id }})" >
            purchase: {{ $purchase->purchase_date }}
          </button>
        </div>
        @php
          $uniqueOrders[] = $purchase->order_id;
        @endphp
      @endif
    @endforeach
  </div><!--ENDING displayedpurchases -->

  <div class="threedots" style="width: 100px; position: relative; bottom: 50px; justify-content: center; left: 39%;">
    <i class="fa fa-circle" style="color: white;"></i>
    <i class="fa fa-circle" style="color: white; margin-left: 8px;"></i>
    <i class="fa fa-circle" style="color: white; margin-left: 8px;"></i>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-size: 20px;">You purchased the following products:</h1>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col" style="padding-left: 55px;">Price</th>
              <th scope="col" class="text-right">Sub Total</th>
            </tr>
          </thead>
          <tbody id="purchaseDetails">
            <!-- Content dynamically inserted here -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    function purchaseDetails(orderId) {
      // AJAX request to fetch details of the purchase
      $.ajax({
        url: '/transaction/purchase-details/' + orderId,
        type: 'GET',
        success: function(response) {
          // Display details in modal
          $('#exampleModal').modal('show');
          $('#purchaseDetails').empty(); // Clear previous details
          
          // Variable to hold the total price
          var totalPrice = 0;

          response.forEach(function(purchase) {
            // Calculate the total price for the current purchase
            var purchaseTotal = purchase.Price * purchase.Quantity;
            // Append table row for the current purchase
            $('#purchaseDetails').append('<tr><td style="height: 30px; line-height: 15px; overflow: hidden;">' + purchase.Product_Name + ' <p style="margin: 0; font-size: 15px; position:relative; top: 6px;">' + purchase.Price + ' x ' + purchase.Quantity + '</p></td><td style ="padding-left: 60px; " >' + purchase.Price + '</td><td style = "text-align: right;" >$' + purchaseTotal + '</td></tr>');
            // Add the current purchase's total to the total price
            totalPrice += purchaseTotal;
          });

          // Append a row for the total price
          $('#purchaseDetails').append('<tr><td></td>><td  style="padding-left: 55px;font-weight: bold; font-size: 20px; ">Total:</td><td style ="text-align: right; font-weight: bold; font-size: 20px; " >$' + totalPrice + '</td></tr>');
        },
        error: function(xhr) {
          console.error("ERROR");
        }
      });
    }
  </script>
</div><!--ENDING CONTAINER-->
</body>
</html>
