@extends('layouts.app')

@section('content')
  <!-- Header -->
  <div class="container my-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contractors</li>
      </ol>
    </nav>
    <h1>Top Contractors Near San Francisco, CA</h1>
    <div class="d-flex flex-wrap gap-2 my-3">
      <button class="btn btn-outline-secondary">Price</button>
      <button class="btn btn-outline-primary">Open Now</button>
      <button class="btn btn-outline-secondary">Available Today</button>
    </div>
  </div>

  <!-- Main Content -->
  <div class="container contter">
    <!-- Left Section -->
    <div class="left">
      <div class="card">
        <div class="row g-3">
          <div class="col-md-3">
            <img src="https://images.unsplash.com/photo-1581092333989-25c07b9847b5?fit=crop&w=600&q=80" alt="Contractor" class="contractor-img" />
          </div>
          <div class="col-md-9">
            <h5 class="fw-bold">Bay Area Home Repairs</h5>
            <div class="text-muted mb-1">⭐⭐⭐⭐ 4.5 (89 reviews)</div>
            <div class="text-muted mb-2">📍 Mission District · <span class="text-danger fw-semibold">Closed until 8:00 AM</span></div>
            <p class="mb-1">"Reliable, quick, and professional. They fixed my plumbing issue in no time!"</p>
            <div class="d-flex justify-content-between">
              <span class="badge bg-secondary">Handyman</span>
              <button class="btn btn-danger btn-sm"><i class="bi bi-calendar-event me-1"></i> Book</button>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="row g-3">
          <div class="col-md-3">
            <img src="https://images.unsplash.com/photo-1597000722484-89c963e325c0?fit=crop&w=600&q=80" alt="Contractor" class="contractor-img" />
          </div>
          <div class="col-md-9">
            <h5 class="fw-bold">Elite Electricians</h5>
            <div class="text-muted mb-1">⭐⭐⭐⭐⭐ 4.9 (112 reviews)</div>
            <div class="text-muted mb-2">📍 SoMa · <span class="text-success fw-semibold">Open now</span></div>
            <p class="mb-1">"Best electricians I’ve worked with—on time and very courteous."</p>
            <div class="d-flex justify-content-between">
              <span class="badge bg-warning text-dark">Electrical</span>
              <button class="btn btn-danger btn-sm"><i class="bi bi-calendar-event me-1"></i> Book</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Section -->
    <div class="right">
      <h4>Free Quotes from Local Pros</h4>
      <p>Tell us what you need and get matched with top-rated professionals.</p>
      <form>
        <div class="form-group">
          <label for="service_needed">Service</label>
          <select id="service_needed" name="service_needed">
            <option value="">Select a service</option>
            <option>Plumbing</option>
            <option>Electrical</option>
            <option>Painting</option>
          </select>
        </div>
        <div class="form-group">
          <label for="timeline">Timeline</label>
          <select id="timeline" name="timeline">
            <option value="">Select time</option>
            <option>Today</option>
            <option>This week</option>
            <option>This month</option>
          </select>
        </div>
        <div class="form-group">
          <label for="zipcode">ZIP Code</label>
          <input type="text" id="zipcode" name="zipcode" placeholder="Enter ZIP code" />
        </div>
        <button type="submit" class="button">Get Started</button>
      </form>
      <div id="map"></div>
    </div>
  </div>

  @endsection
