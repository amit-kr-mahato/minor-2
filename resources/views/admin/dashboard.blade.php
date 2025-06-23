@extends('adminLayout.app')

@section('content')

  <!-- Main Content -->
 
    <div class="top" style="background-color: red;width:100%;height:10%;">
    <div class="top-bar" >
      <div>
        <select><option>Product</option></select>
        <input type="text" placeholder="Search">
      </div>
      <div><i class="bi bi-bell"></i> 0</div>
    </div></div>
 <div class="main-content" id="main-content">
    <div class="dashboard-header">
      <h1>Welcome  admin Dashboard</h1>
    </div>

    <div class="cards">
      <div class="card">
        <h3>Total Products</h3>
        <p>0</p>
      </div>
      <div class="card">
        <h3>Best Selling Products</h3>
        <p>0</p>
      </div>
      <div class="card">
        <h3>Customers</h3>
        <p>0</p>
      </div>
      <div class="card">
        <h3>Order Placed</h3>
        <p>0</p>
      </div>
    </div>
  </div>

 @endsection