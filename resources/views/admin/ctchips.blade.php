@extends('layouts.AdminDashboardLayout')

<!--  !-->
@section('content')

@foreach($chips as $product)
<div class="productdisplay">
        <img class ="chipsimg" src="{{ asset('assets/images/chips_transparent.png') }}">
        <p>{{ $product->Product_Name }}</p>
        <p>{{ $product->Price }}</p>
    </div>
    @endforeach

@endsection