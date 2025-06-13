<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Contractor Listing</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    body {
      background: #f9f9f9;
    }

    .container {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }

    .left {
      flex: 2;
      min-width: 300px;
    }

    .right {
      flex: 1;
      min-width: 300px;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .card {
      background: white;
      padding: 16px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .contractor-img {
      width: 100%;
      height: auto;
      border-radius: 8px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group select,
    .form-group input {
      width: 100%;
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    .button {
      background: #e00707;
      color: white;
      border: none;
      padding: 10px 16px;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
    }

    #map {
      height: 200px;
      width: 100%;
      margin-top: 20px;
      border-radius: 8px;
    }
  </style>
</head>

<body>
<div class="contt ">
    <?php
    include "navbar/navbar.php";
    ?>
  </div>

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
  <div class="container">
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

  <!-- Leaflet Map Script -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    const map = L.map('map').setView([37.7749, -122.4194], 12);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);
    const locations = [
      { coords: [37.7749, -122.4194], popup: "San Francisco City Center" },
      { coords: [37.7849, -122.4094], popup: "Elite Electricians HQ" }
    ];
    locations.forEach(loc => {
      L.marker(loc.coords).addTo(map).bindPopup(loc.popup);
    });
  </script>

</body>

</html>
