<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products">Products</a>
                    </li>
                    <li class="nav-item">
    <a class="nav-link" href="testad">
        Sales 
    </a>
</li>

<img style = "height: 20px; width: 20px; margin-top: 12px; margin-left: -0px;  "src ="https://cdn-icons-png.freepik.com/512/161/161229.png?ga=GA1.1.2048724760.1716480993"> 
                <li>

            </li>
                </ul>
            </div>
        </div>
    </nav>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style ="float: right; background: black; color: white;">
  Add User
</button>




<table class="table">
  <thead>
    <tr>
      <th scope="col" style="width:100px;">ID</th>
      <th scope="col" style="width:240px;"><div style = "margin-left:25px;">Username</div></th>
      <th scope="col" ><div style = "margin-left:80px;">Email </div> </th>
      <th scope="col">Balance</th>
      <th scope="col">Action</th>
    </tr>
  </thead>  


  

  <tbody>
  @foreach ($users as $user)
<tr>
    <td>{{ $user->id }}</td>
    <td><div style="text-align:center; width: 120px;">{{ $user->username }}</div></td>
    <td><div style="text-align: center; width: 200px;">{{ $user->email }}</div></td>
    <td style="margin-left: 20px;">{{ $user->balance }}  </td>
    <td>
  <button type="button" class="btn btn-primary edit-balance" data-toggle="modal" data-target="#editBalanceModal" data-userid="{{ $user->id }}">
    Add Balance
  </button>
</td>
</tr>
@endforeach
  </tbody>
</table>



<!-- Modal for Editing Balance -->
<div class="modal fade" id="editBalanceModal" tabindex="-1" role="dialog" aria-labelledby="editBalanceModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="editBalanceModalLabel" style = "font-size: 20px; ">Add Money</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form id="editBalanceForm" action="{{ route('users.updateBalance') }}" method="POST">
    @csrf
    <input type="hidden" id="userId" name="userId">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" style = "width: 120px; background: 	#89CFF0	; font-weight: bold; " >Amount</span>
      </div>
      <input type="number" class="form-control" id="balance" name="balance" placeholder="Enter Amount">
    </div>
    <div class="row justify-content-end">
      <div class="col-auto">
        <button type="submit" id="submitButton" class="btn btn-primary">Add Balance</button>
      </div>
    </div>
  </form>
</div>
    </div>
  </div>
</div>

<script>
  // Get input field and button elements
  const balanceInput = document.getElementById('balance');
  const submitButton = document.getElementById('submitButton');

  // Add event listener to input field
  balanceInput.addEventListener('input', function() {
    // Get the value entered in the input field
    const balanceValue = this.value;

    // Update the text of the button with the entered value
    submitButton.innerText = `Add ₱${balanceValue}`;
  });
</script>

<script>
  $(document).ready(function() {
    // Handle click event on edit balance button
    $('.edit-balance').click(function() {
      var userId = $(this).data('userid');
      $('#userId').val(userId); // Set the user ID in the hidden input field
      $('#balance').val(''); // Clear any previous value
    });
  });
</script>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{ route('users.createUser') }} " method="post">
          @csrf
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" placeholder="">
          </div>

          <div class="mb-3 position-relative">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" name="password" id="password" placeholder="" aria-describedby="show-password">
              <button type="button" class="btn btn-outline-secondary toggle-password" id="show-password" data-toggle="tooltip" data-placement="top" title="Show/Hide Password">
              <i class="fa fa-eye"></i>
              </button>
            </div>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" placeholder="">
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Balance</label>
            <input type="number" class="form-control" name="balance" placeholder="Initial Balance">
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Student ID</label>
            <input type="text" class="form-control" name="stud_id" placeholder="2022-XXXX">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  // Function to toggle password visibility
  function togglePasswordVisibility() {
    var passwordField = document.getElementById("password");
    if (passwordField.type === "password") {
      passwordField.type = "text";
    } else {
      passwordField.type = "password";
    }
  }

  // Attach event listener to the button
  document.querySelector(".toggle-password").addEventListener("click", togglePasswordVisibility);
</script>





</body>
</html>