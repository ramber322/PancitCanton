<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
   
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products">Products</a>
                </li>
            </ul>
        </div>
    </div>


</nav>

<div class="contain">
    <div class="g1" style="background: white;">
        <ul class="ulvnavbar" style ="  display: inline-block;" >
            <li class="vnavbar"><a class="sidebar" href="dashboard"><img src ="{{asset('assets/images/burger.png')}}" style ="position: relative; left: -8px; top: -2px; width: 25px; height: 25px;  display: inline-block;"> Foods</a></li>
            <li class="vnavbar"><a href="ctdrinks"><img src ="{{asset('assets/images/soda.png')}}" style ="position: relative; left: -8px; top: -2px; width: 25px; height: 25px; display: inline-block;"> Drinks</a></li>
            <li class="vnavbar"><a href="ctchips"><img src ="{{asset('assets/images/chips.png')}}" style ="position: relative; left: -8px; top: -2px; width: 25px; height: 25px; display: inline-block;"> Chips</a></li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <img src="{{ asset('assets/images/poweroff.png') }}" style="width: 60px; height: 60px; position: fixed; bottom: 40px; left: 40px;">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</a>


        </ul>
    </div>

    <div style=" background: #36454F;  display:flex;flex-wrap:wrap;align-content:start;height:100vh;">
        @yield ('content')
    </div>

    <div class="g2">


    
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <div class ="tbody" style ="display:flex; flex-wrap: wrap;">
            <tbody>
       @yield('orderline')
       
            </tbody>
        </table>
</div>


    
        <div class="checkout">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ConfirmationModal" style="position: fixed; bottom: 70px; right: 80px;">
             Purchase
            </button>
            <p style="color: white; text-align: center; margin-top: 4px;"><b>BIWW</b></p>
        </div>

        <div class="checkout" style ="text-align: left; ">
            <button type="button" class="btn btn-primary" style="position: fixed; bottom: 5px; right: 95px;  background:blue; width: 160px; height: 38px;">
            @yield('totalcost')
            </button>
           
        </div>


        <div class="checkout" style="text-align: left;">
    <button type="button" id="deleteAllRows" class="btn btn-danger" style="position: fixed; bottom: 5px; right: 10px;">
        Clear
    </button>
</div>

<script>
    document.getElementById('deleteAllRows').addEventListener('click', function() {
        if (confirm('Are you sure you want to clear all items?')) {
            // Send AJAX request to delete all rows
            $.ajax({
                url: '{{ route("ctchips.deleteAllRows") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Reload the page or update the table as needed
                    location.reload(); // Reload the page
                },
                error: function(xhr) {
                    // Handle errors
                    console.log(xhr.responseText);
                }
            });
        }
    });
</script>



    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Purchase Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container d-flex justify-content-center">
                    <form id="purchaseForm" action="" method="post" style="width:50vw; min-width:300px;">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Student ID:</label>
                                <input type="text" class="form-control" name="studentid" placeholder="2020-XXXXX" id="studentid" maxlength="10">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="showSecondModal()">Verify</button>
            </div>
        </div>
    </div>
</div>

<!-- Second Modal -->
<div class="modal fade" id="secondModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Purchase Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 id="secondModalUsername"></h1>
                <h2 id="secondModalBalance"></h2>
                <h3 id="secondModalTotalCost"></h3>
                <button type="button" class="btn btn-primary" onclick="showThirdModal()">Confirm Purchase</button>
            </div>
        </div>
    </div>
</div>

<!-- Third Modal -->
<div class="modal fade" id="thirdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="justify-content: center; align-items: center; text-align: center;">
                <h3>Purchase Complete</h3>
                <img src="{{ asset('assets/images/check_icon.png') }}" style="height: 70px; width: 70px;">
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Add this script in your AdminDashboardLayout.blade.php file -->

<script>
   function showSecondModal() {
    var studentId = document.getElementById("studentid").value;

    $.ajax({
        url: "{{ route('ctchips.validateStudent') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            student_id: studentId
        },
        success: function(response) {
            if (response.success) {
                $('#ConfirmationModal').modal('hide');
                $('#secondModal').modal('show');

                // Display user information and total cost in second modal
                $('#secondModalUsername').text("Username: " + response.user.username);
                $('#secondModalBalance').text("Balance: " + response.user.balance);
                $('#secondModalTotalCost').text("Total Cost: $" + response.totalCost); // Display total cost
            } else {
                alert(response.message);
            }
        },
        error: function(xhr) {
            alert("Error: " + xhr.responseText);
        }
    });
}
function showThirdModal() {
    // Perform purchase process
    $.ajax({
        url: "{{ route('ctchips.purchase') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            total_cost: parseFloat($('#secondModalTotalCost').text().replace('Total Cost: $', '')) // Send total cost with purchase request
        },
        success: function(response) {
            if (response.success) {
                $('#secondModal').modal('hide');
                $('#thirdModal').modal('show');
            } else {
                alert(response.message);
            }
        },
        error: function(xhr) {
            alert("Error: " + xhr.responseText);
        }
    });
}

$('#thirdModal').on('hidden.bs.modal', function (e) {
    window.location.reload(); // Reload the page
});
</script>




</body>
</html>
