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
</style>
</head>
<body>

<div class="container">

  
  <div class="top-section">
  
  <div class="circle-img mx-auto mb-3" id="circle-img" data-toggle="popover">
      <img src="https://cdn-icons-png.freepik.com/512/552/552721.png?ga=GA1.2.1745870953.1711975251&" class="img-fluid" alt="Profile Picture">
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

<div class ="displayedpurchases" style =" position: fixed;  height: 190px; width: 220px;margin-left: 50px;
 top: 32%; display: flex; justify-content: center; /* align item horizontally */
        align-items: center; flex-direction: column;" >
  
  @yield ('content')
  
  
  </div><!--ENDING displayedpurchases -->
 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Purchased Items</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  
	  
	<div style="display: flex; justify-content: space-between;">
    <p>Coke</p>
    <p>20</p>
    </div>
	
	<div style="display: flex; justify-content: space-between;">
    <p>Spaghetti</p>
    <p>75</p>
    </div>
	
	<div style="display: flex; justify-content: space-between;">
    <p>Cobra</p>
    <p>25</p>
    </div>
	
	<div style="display: flex; justify-content: space-between;">
    <p>Tempura</p>
    <p>30</p>
    </div>
	 
	 
	 
	 <hr>  
	 <div style="display: flex; justify-content: space-between;">
    <h1>Total</h1>
    <h1>150</h1>
    </div>
	 


      </div>
      
    </div>
  </div>
</div>
  
  
 <!-- Hidden Popover Content -->
  <div id="popover-content" class="d-none">
  <div class ="popoverdiv" style ="justify-content: Center; align-items: center; background: black; border: 3px solid black; width: 200px;">
     
	 <a class="popover-link" href="">INFO</a><br>
     </x-responsive-nav-link>

<!-- Authentication -->
<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-responsive-nav-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-responsive-nav-link>
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
