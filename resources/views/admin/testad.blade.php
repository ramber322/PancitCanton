<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/sb-admin-2.min.css') }}">
 <style>
    .hover-row:hover {
        background-color: #f5f5f5; /* Change to your desired hover background color */
        cursor: pointer; /* Change cursor style on hover */
    }
    .navbar {
    height: 50px;
    background: rgb(53, 38, 87);
}
.navbar-nav .nav-item {
    list-style: none;
    color:white;
}

.navbar-nav .nav-item a {
    text-decoration: none;
}

.nav-item {
    color:white;
}

.navbar-nav a {
color: white
}

.m-0  {

   color: !important solid white;
}
</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

     
       

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="dashboard">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="testad">Sales  <img style = "height: 20px; width: 20px; "src ="https://cdn-icons-png.freepik.com/512/161/161229.png?ga=GA1.1.2048724760.1716480993"> </a>
                </li>
            </ul>
        </div>
    </div>


</nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style = "margin-top: 10px; ">Welcome, Admin</h1>
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                TODAY'S SALE</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱ {{ $totalSales }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <img style ="width: 32px; height: 32px; "src = "https://cdn-icons-png.freepik.com/512/6946/6946089.png?ga=GA1.1.2048724760.1716480993">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Sales</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱ {{ $totalSales }}</div>
                                        </div>
                                        <div class="col-auto">
                                        <img style ="width: 32px; height: 32px; "src = "https://cdn-icons-png.freepik.com/512/6946/6946089.png?ga=GA1.1.2048724760.1716480993">
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">REGISTERED USERS
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $registeredUsersCount }}</div>
                                                </div>

                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <img style ="width: 32px; height: 32px; "src = "https://cdn-icons-png.freepik.com/512/33/33308.png?ga=GA1.1.2048724760.1716480993">
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                TOTAL PRODUCTS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProducts}}</div>
                                        </div>
                                        <div class="col-auto">
                                        <img style ="width: 32px; height: 32px; "src = "https://cdn-icons-png.freepik.com/512/6077/6077711.png?ga=GA1.1.2048724760.1716480993">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style = "background: rgb(53, 38, 87); ">
                                    <h6 class="m-0 font-weight-bold text-primary" style ="color: white !important;  ">Sales Report</h6>
                                    <div class="dropdown no-arrow">
                                      
                                        
                                    </div>
                                </div>

                                <script>
    function purchaseDetails(orderId) {
        // AJAX request to fetch details of the purchase
        $.ajax({
            url: 'admin/testad/purchase-details/' + orderId,
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
                                <!-- Card Body -->
                               <!-- Card Body -->
<div class="card-body">
    <div style="max-height: 60vh; overflow-y: auto;">
    <table class="table" >
        <thead>
            <tr>
                <th scope="col">Order_ID</th>
                <th scope="col">Date</th>
                <th scope="col">Earnings</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $uniqueOrders = [];
            @endphp
            <!-- Loop through the purchases in reverse order -->
            @foreach($purchases->reverse() as $purchase)
            @if (!in_array($purchase->order_id, $uniqueOrders))
            <!-- Calculate total earnings for this order_id -->
            @php
            $totalEarnings = $purchases->where('order_id', $purchase->order_id)->sum(function ($item) {
            return $item->Price * $item->Quantity;
            });
            @endphp
            <tr class = "hover-row">
                <td>{{ $purchase->order_id }}</td>
                <td>{{ $purchase->purchase_date }}</td>
                <td>+{{ $totalEarnings }}</td>
                <td>
                    <button class="btn btn-primary" onclick="purchaseDetails({{ $purchase->order_id }})">
                      <img style = "height: 15px; width: 15px; " src = "https://cdn-icons-png.freepik.com/512/3138/3138315.png?ga=GA1.1.2048724760.1716480993">
                    </button>
                </td>
            </tr>
            <!-- Increment loop counter -->
            @php
            $uniqueOrders[] = $purchase->order_id;
            @endphp
            @endif
            @endforeach
        </tbody>
    </table>
</div>
        </div>
                            </div>
                        </div>



   <!-- Bootstrap JS -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>






                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style = "background: rgb(53, 38, 87);" >
                                    <h6 class="m-0 font-weight-bold text-primary" style = "color: white !important; ">Products Sold</h6>
                               
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" style="max-height:60vh; overflow-y: auto;" >
                                    <div class="chart-pie pt-4 pb-2">
                                      
                                    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product</th>
                <th scope="col">Items Sold</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class = "hover-row">
                <td>{{ $product->Product_ID }}</td>
                <td>{{ $product->Product_Name }}</td>
                <td>
            <?php
                // Calculate total quantity sold for the current product
                $totalQuantitySold = App\Models\Notification::where('Product_Name', $product->Product_Name)->sum('Quantity');
                // Output the total quantity sold
                echo $totalQuantitySold;
            ?>
      
            </tr>
            <!-- Increment loop counter -->
      @endforeach
    </table>
        
                                    </div>
                                    <div class="mt-4 text-center small">
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   

                         
                         

                        </div>
                    </div>

<!-- BOTTOM DIV !-->

<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style = "background:white;">
                                    <h6 class="m-0 font-weight-bold text-primary" style ="color: black !important;  ">Account Transaction</h6>
                    <div class="card-body">
    <div style="max-height: 60vh; overflow-y: auto;">
    <table class="table" >
        <thead>
            <tr style = "background: rgb(53, 38, 87); color: white;">
                <th scope="col">Transact_ID</th>
                <th scope="col">User Balance</th>
                <th scope="col">Amount</th>
                <th scope="col">Username</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notificationsbalance->reverse() as $notificationbalance)
            <tr class = "hover-row">
                <td>{{ $notificationbalance->transaction_id }}</td>
                <td>{{ $notificationbalance->oldbalance }}</td>
                <?php
                $amount = $notificationbalance->amount;
                ?>

                @if ($amount > 0)
                <td> +{{ $amount }} </td>
                @else
                <td> {{ $amount }} </td>
                @endif
                 
                

        <?php
        $user = App\Models\User::find($notificationbalance->user_id);
        ?>
        @if($user)
          <td>  {{ $user->username }} </td>
        @else
            User does not exist
        @endif
    </td>

            </tr>
            <!-- Increment loop counter -->
           
            @endforeach
        </tbody>
    </table>
</div>
        </div>

        </div>


                            </div>
                        </div>
                </div>
                <!-- /.container-fluid -->





                
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Cafeteria Cashless System SPC ILIGAN</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel" style = "font-size: 23px; ">Purchase Details</h1>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
