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
    max-width: 350px; /* Adjust this value as needed */ss
    margin: auto;
	margin-top: 150px;
  }
</style>
</head>
<body>

<div class="container">

  
  <div class="top-section">
  
  <div class="circle-img mx-auto mb-3" id="circle-img">
    <a href ="{{ route ('dashboard.testindex') }} "> <img src="https://cdn-icons-png.freepik.com/512/13742/13742341.png?ga=GA1.1.1730158141.1712038229&" class="img-fluid" alt="Back"> </a>
    </div>
	
 
  
  </div><!--ENDING TOP SECTION -->
  
  <div class="bottom-section">
    <div class="reversed-triangle"></div>
    <div class="reversed-triangle"></div>
	

  </div> <!--ENDING BOT SECTION-->

  <script>
  function balanceDetails(transaction_id) {
        // AJAX request to fetch details of the purchase
        $.ajax({
            url: '/balance/purchase-details/' + transaction_id,
            type: 'GET',
            success: function(response) {
                // Display details in modal
                $('#exampleModal').modal('show');
                $('#modalbody').empty(); // Clear previous details
                
                // Access the variables from the response
                var amount = response.amount;
                var oldbalance = response.oldbalance;
                var currentbalance = response.currentbalance;
                var created_at = new Date(response.created_at); // Convert to Date object
                var transaction_id = response.transaction_id;
                var user_id = response.user_id;

                // Format date as day/month/year
                var formatted_date = created_at.getDate() + '/' + (created_at.getMonth() + 1) + '/' + created_at.getFullYear();

                // Format time in 12-hour format with AM/PM
                var hours = created_at.getHours();
                var trulse = (hours > 12);
                var minutes = created_at.getMinutes();
                var am_pm = hours >= 12 ? 'PM' : 'AM';
                if (trulse) {
                    hours = (hours % 12) - 4;

                } else {
            hours = hours % 12;
        }
               
                minutes = minutes < 10 ? '0' + minutes : minutes;
                var formatted_time = hours + ':' + minutes + ' ' + am_pm;


                
                // Determine the message based on the sign of the amount
                var message;
                if (amount > 0) {
                    message = '₱' + amount + ' amount has been added to your account:';
                } else if (amount < 0) {
                    message = '₱' + Math.abs(amount) + ' amount has been deducted from your account: ₱' + (Math.abs(amount) + currentbalance);
                } else {
                    message = 'No change in your account balance.';
                }

                // Append the message, current balance, formatted date, and time to modal body
                $('#modalbody').append('<p>' + message + '</p>');
                $('#modalbody').append('<p>Your new balance: ₱' + currentbalance + '</p>');
                $('#modalbody').append('<p>Date: ' + formatted_time + ',  ' + formatted_date +'</p>');
                
            },
            error: function(xhr) {
                console.error("ERROR");
            }
        });
    }
</script>


<div class ="displayedpurchases" style =" position: fixed;  height: 190px; width: 220px;margin-left: 50px;
 top: 32%; display: flex; justify-content: center; /* align item horizontally */
        align-items: center; flex-direction: column;" >
  
  
    @foreach($purchases->reverse() as $purchase)
     
        <div class="purchasenotify" style="margin-bottom: 10px;">
        <button class="btn btn-primary" onclick="balanceDetails({{ $purchase->transaction_id }})" style="width: 200px; background: #36454F; border-radius: 100px;">
                new balance: {{ $purchase->currentbalance }}
            </button>
        </div>    
 
    @endforeach



  
  </div><!--ENDING displayedpurchases -->

  <div class ="threedots" style ="width: 100px; position: relative; bottom: 50px; justify-content: center; left: 39%; " >
    <i class="fa fa-circle" style ="color: white;  "></i>
    <i class="fa fa-circle" style ="color: white; margin-left: 8px;" ></i>
    <i class="fa fa-circle" style ="color: white; margin-left: 8px;" ></i>
</div>
 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" id = "modalheader">
      <h1 class="modal-title fs-5" id="exampleModalLabel" style = "font-size: 20px; ">Account Details:</h1>
      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
     
      <div class="modal-body" id="modalbody">
	  
	 

     </div> <!--end modalbody div !-->
     
	 



      </div>
      
    </div>
  </div>

  
  

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</div><!--ENDING CONTAINER-->
</body>
</html>
