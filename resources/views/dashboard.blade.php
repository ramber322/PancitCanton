<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<style>
  body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    overflow: hidden; /* Prevent scrolling */
  }

  .container {
    max-width: 350px; /* Set maximum width for the container */
    margin: 0 auto; /* Center the container horizontally */
	
	background: black;
	 overflow:hidden;
	 height: 100%;
  }

  .top-section {
    height: 50%; /* 50% height of the viewport */
    background-color: #E6E6FA;
  }

  .bottom-section {
    position: relative;
    height: 50%; /* 50% height of the viewport */
    background: rgb(53, 38, 87);
    display: flex;
    justify-content: center; /* Horizontally center the triangles */
    align-items: flex-start; /* Align rectangles to top edge */
  }

  .reversed-triangle {
    width: 0;
    height: 0;
    border-left: 75px solid transparent; /* Adjust size of the triangles */
    border-right: 75px solid transparent; /* Adjust size of the triangles */
    position: relative;
    margin: 0 10px; /* Add margin to create space between triangles */
  }

  .reversed-triangle:first-child {
    border-top: 160px solid #E6E6FA; /* Adjust size of the triangles */
  }

  .reversed-triangle:last-child {
    border-top: 160px solid #E6E6FA; /* Adjust size of the triangles */
  }

  @media only screen and (max-width: 600px) {
    /* Adjustments for smaller screens */
    .top-section, .bottom-section {
      height: 50vh;
    }
  }
  ::-webkit-scrollbar {
    display: none;
}
  .petot {
    position: fixed;
	
    top: 25%; /* Moves the div down by half of its height */
    left: 49%; /* Moves the div right by half of its width */
    transform: translate(-50%, -50%); /* Centers the div */
    text-align: center; /* Centers the content horizontally */
    display: flex;
    align-items: center;
    justify-content: center;
	font-family: Arial, Helvetica, sans-serif;
	  font-weight: bold;
	 font-size: 39px;
	 margin: 0; /* Override Bootstrap margin */
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
  
   .modal-content {
    width: 80%; /* Adjust this value as needed */
    max-width: 350px; /* Adjust this value as needed */
    margin: auto;
	margin-top: 150px;
  }
  
  .popover-link {
    font-size: 15px;
	color: black;
	justify-content: center;
	font-weight: bold;
	
    color: inherit; /* Use the default text color */
	
}




.circular-dropdown {
  background-image: url('https://cdn-icons-png.freepik.com/512/552/552721.png?ga=GA1.2.1745870953.1711975251&');
  background-size: cover; /* or use 'contain' depending on how you want the image to fit */
  width: 60px; /* Adjust the width as needed */
  height: 60px; /* Adjust the height as needed */
  border-radius: 50%; /* Makes the button circular */
  border: none; /* Removes any default button border */
  padding: 0; /* Removes extra padding */
}

.circular-dropdown.dropdown-toggle::after {
  display: none; /* Hides the default dropdown arrow */
 
}
.btn-group dropend {
	width: 50px;
	 margin: 200px;
	background-image: url("https://cdn-icons-png.freepik.com/512/552/552721.png?ga=GA1.2.1745870953.1711975251&");
	
}

.dropdown-menu.dropdown-menu-start li a:hover {
  background-color: #E6E6FA !important; /* Change to the color you want */
}
</style>
</head>
<body>

<div class="container">

  <div class="top-section">
  <div class="btn-group dropend">
  
  <button type="button" class="btn btn-secondary dropdown-toggle circular-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
   
  </button>
  <ul class="dropdown-menu dropdown-menu-start">
  <li><a class="dropdown-item" href="info">INFO</a></li>

 <li> <a class ="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    LOGOUT
    
</a><form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
    @csrf
</form></li>

  
   
  </ul>
 
</div>

<div style="display: flex; justify-content: flex-end; align-items: flex-start; margin-top: -50px; margin-right: 10px; ">
  <!-- Your other content here -->

  <div>{{ Auth::user()->username }}</div>
</div>




  
	
  <div class ="petot" style ="position: fixed; "> 
  <img style = "width: 40px; height: 40px; margin-right: 5px; margin-bottom: 20px;" src ="https://cdn-icons-png.freepik.com/512/6897/6897755.png?ga=GA1.1.1745870953.1711975251&"> 
  <p>500 </p>
  
  </div>
  
  </div><!--ENDING TOP SECTION -->
  
  <div class="bottom-section">
    <div class="reversed-triangle"></div>
    <div class="reversed-triangle"></div>
  </div> <!--ENDING BOT SECTION-->

 <div style="position: fixed; width: 200px; height: 45px;  margin-left: 60px; bottom: 90px; display: flex; justify-content: center; align-items: center; background: #36454F; border: 1px solid white;">
    <a href="" style="text-decoration: none; color: white; font-size: 18px; cursor: pointer; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">Transaction History</a>
</div>

<div class ="threedots" style ="width: 100px; position: relative; bottom: 50px; justify-content: center; left: 39%; " >
    <i class="fa fa-circle" style ="color: white;  "></i>
    <i class="fa fa-circle" style ="color: white; margin-left: 8px;" ></i>
    <i class="fa fa-circle" style ="color: white; margin-left: 8px;" ></i>
</div>
<script>
    function purchaseDetails(orderId) {
        // AJAX request to fetch details of the purchase
        $.ajax({
            url: '/dashboard/purchase-details/' + orderId,
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





<div class="displayedpurchases" style="position: fixed; height: 190px; width: 220px; margin-left: 50px; top: 32%; display: flex; justify-content: center; align-items: center; flex-direction: column;">
    @php
        $uniqueOrders = [];
        $count = 0; // Initialize loop counter
    @endphp

    <!-- Loop through the purchases in reverse order -->
    @foreach($purchases->reverse() as $purchase)
        @if (!in_array($purchase->order_id, $uniqueOrders))
        <div class="purchasenotify" style="margin-bottom: 10px;">
            <button class="btn btn-primary" onclick="purchaseDetails({{ $purchase->order_id }})" style="width: 200px; background: #36454F; border-radius: 100px;">
                purchase {{ $purchase->purchase_date }}
            </button>
        </div>
        <!-- Increment loop counter -->
        @php
            $uniqueOrders[] = $purchase->order_id;
            $count++;
        @endphp

        <!-- Break the loop if 3 rows are displayed -->
        @if($count == 3)
            @break
        @endif
        @endif
    @endforeach
</div>




 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Purchased Items</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
	  
	  
    
      <table class="table">
    <thead>
        <tr>
            <th scope="col" >Product</th>
            <th scope="col" style="padding-left: 55px;">Price</th>
            <th scope="col" class="text-right">Sub Total</th>
        </tr>
    </thead>
  <tbody id="purchaseDetails" >
  @foreach($purchases as $purchase)
    <tr>
      <td>FOOD </td>
      <td>2 </td>
      <td>400 </td>
    </tr>
    @endforeach
   
  </tbody>
</table>
  
	
	
      
    </div>
  </div>

  
  
 <!-- Hidden Popover Content -->
  <div id="popover-content" class="d-none">
  <div class ="popoverdiv" style ="justify-content: Center; align-items: center; background: black; border: 3px solid black; width: 200px;">

	 <a class="popover-link" href="">INFO</a><br>
   <div>{{ Auth::user()->username }}</div>
   
  
    

	 </div>
  </div>



  
  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Initialize Popover -->
  <script>
    $(document).ready(function(){
      $('#circle-img').popover({
        content: function() {
          return $('#popover-content').html();
        },
        html: true
      });
    });
  </script>



</div><!--ENDING CONTAINER-->
</body>
</html>
