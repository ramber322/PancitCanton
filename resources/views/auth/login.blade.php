<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>

body {
  background: rgb(53, 38, 87);
	
}
.flex-container-parent-left {
	display: flex; 
	
	width: 260px; 
	flex-direction: column; 
	flex-wrap: wrap; 
	position: fixed; 
	top: 0px; 
	left: 0px;
}

.flex-container-parent-right {
	display: flex; 
	
	width: 260px; 
	flex-direction: column; 
	flex-wrap: wrap; 
	position: fixed; 
	top: 0px; 
	right: 0px;
}


.flex-container-child {
	display: flex; 
	
	width: 260px; 
	flex-direction: row; flex-wrap: wrap
	
}

.boxnum1blue {
	width:60px;
	height:60px;
	background-color:#191970;
	border: 1px solid white;
}
.boxnum2white {
	width:60px;
	height:60px;
  background: rgb(53, 38, 87);
	border: 1px solid white;
}

.form-center {
	 width: 400px;
  height: 400px;
  position: absolute;
  top: 54%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
 
	
}

h1 {
  color: white; 
  
}

.guest-layout {
    background-color: transparent !important; /* Important to override any existing styles */
}

</style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="flex-container-parent-left">


<div class="flex-container-child">
  <div class = "boxnum1blue"></div>
   <div class = "boxnum2white"></div>
   <div class = "boxnum1blue"></div>
   <div class = "boxnum2white"></div>
   </div>
   
   <div class="flex-container-child">

   <div class = "boxnum2white"></div>
   <div class = "boxnum1blue"></div>
   <div class = "boxnum2white"></div>
   </div>
   
   <div class="flex-container-child">
   <div class = "boxnum1blue"></div>
   <div class = "boxnum2white"></div>
   </div>
  
   <div class="flex-container-child">
    <div class = "boxnum2white"></div>
   </div>


</div>



<div class="flex-container-parent-right">

<div class="flex-container-child" style="flex-direction: row-reverse">
  <div class = "boxnum1blue"></div>
   <div class = "boxnum2white"></div>
   <div class = "boxnum1blue"></div>
   <div class = "boxnum2white"></div>
   </div>
   
   <div class="flex-container-child" style="flex-direction: row-reverse">

   <div class = "boxnum2white"></div>
   <div class = "boxnum1blue"></div>
   <div class = "boxnum2white"></div>
   </div>
   
   <div class="flex-container-child" style="flex-direction: row-reverse">
   <div class = "boxnum1blue"></div>
   <div class = "boxnum2white"></div>
   </div>
  
   <div class="flex-container-child" style="flex-direction: row-reverse">
    <div class = "boxnum2white"></div>
   </div>


</div>


<img src="{{asset('assets/images/spclogo.png')}}" style ="height: 150px; width: 150px;position: fixed;  top: 18%;
  left: 50%;
  transform: translate(-50%, -50%);">

<h1 id ="loginheader" name ="loginheader" style ="  position: fixed;  top: 35%;
  left: 50%;
  transform: translate(-50%, -50%);"> LOGIN </h1>

<a href = "">
<img src="https://cdn-icons-png.freepik.com/512/0/23.png?ga=GA1.1.1871801219.1712326061&" style ="height: 25px; width: 25px; position: fixed;  bottom: 0%;
  left: 1%;
  transform: translate(-50%, -50%);">
</a>

<div class ="form-center">

<form method ="POST" action="{{ route('login') }}" >
    @csrf
  <div class="form-group">
    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp"  placeholder="EMAIL" style="width: 250px; text-align: center; border: 2px solid purple; font-weight: bold;  @error('email') border-color: red; @enderror" >
    @error('email')
            <script>
                document.getElementById('email').placeholder  = "{{ $message }}";
              
            </script>
        @enderror
  </div>

  <div class="form-group">
    <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="PASSWORD" style="width: 250px; text-align: center; border: 2px solid black; font-weight: bold; @error('password') border-color: red; @enderror" >
    @error('password')
    <script>
                document.getElementById('password').placeholder  = "{{ $message }}";
               
            </script>
        @enderror
  </div>

  <button type="submit" class="btn btn-primary" style ="width: 180px; background-color :#5D3FD3; font-weight: bold; border: 0.5px solid white;">LOGIN</button>
</form>

</div>



</body>
</html>











