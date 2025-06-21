<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mountain Mike's Pizza Gallery</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css">
  <style>
    
    #pizza-gallery {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      justify-content: center;
    }
    #pizza-gallery a {
      width: 200px;
      height: 150px;
      overflow: hidden;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
      transition: transform 0.2s;
    }
    #pizza-gallery a:hover {
      transform: scale(1.05);
    }
    #pizza-gallery img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

       .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .header h2 {
      margin: 0;
      font-size: 24px;
    }
    .add-photo-btn {
      border: 2px solid #ccc;
      padding: 8px 22px;
      border-radius: 5px;
      background-color: rgb(241, 5, 5);
      cursor: pointer;
      display: flex;
      align-items: center;
      margin-right: 20px;
      text-decoration: none;
      color: #000
    }
    .add-photo-btn:hover {
      background-color: #f35c5c;
    }
    .add-photo-btn::before {
      content: '+';
      font-weight: bold;
      margin-right: 6px;
    }
    .tabs {
      margin-top: 20px;
      display: flex;
      gap: 18px;
      border-bottom: 2px solid #eee;
    }
    .tab {
      padding-bottom: 8px;
      cursor: pointer;
      font-weight: 500;
      color: #555;
    }
    .tab.active {
      border-bottom: 3px solid #e60023;
      color: #000;
      font-weight: 600;
    }
  </style>
</head>
<body>

 <div class="header">
    <h2>Photos and videos for Mountain Mike's Pizza</h2>
    <a href="{{route('addphoto')}}" target="_blank" class="add-photo-btn ">Add photos</a>

  </div>

  <div class="tabs" id="tabs">
    <div class="tab active">All (154)</div>
    <div class="tab">Food (73)</div>
    <div class="tab">Inside (48)</div>
    <div class="tab">Outside (14)</div>
    <div class="tab">Menu (4)</div>
    <div class="tab">Drink (1)</div>
    <div class="tab">Videos (2)</div>
  </div>

  <div id="pizza-gallery">
    <a href="https://images.unsplash.com/photo-1603574670812-d24560880210?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1603574670812-d24560880210?fit=crop&w=300&q=80" alt="Pizza 1">
    </a>
    <a href="https://images.unsplash.com/photo-1571091718767-18b5b1457add?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1571091718767-18b5b1457add?fit=crop&w=300&q=80" alt="Pizza 2">
    </a>
    <a href="https://images.unsplash.com/photo-1601924582971-c8f23329e1b6?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1601924582971-c8f23329e1b6?fit=crop&w=300&q=80" alt="Pizza 3">
    </a>
    <a href="https://images.unsplash.com/photo-1585238341982-78a5c25b2d4b?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1585238341982-78a5c25b2d4b?fit=crop&w=300&q=80" alt="Pizza 4">
    </a>
    <a href="https://images.unsplash.com/photo-1576858650381-0e5cc94c77dc?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1576858650381-0e5cc94c77dc?fit=crop&w=300&q=80" alt="Pizza 5">
    </a>
     <a href="https://images.unsplash.com/photo-1603574670812-d24560880210?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1603574670812-d24560880210?fit=crop&w=300&q=80" alt="Pizza 1">
    </a>
    <a href="https://images.unsplash.com/photo-1571091718767-18b5b1457add?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1571091718767-18b5b1457add?fit=crop&w=300&q=80" alt="Pizza 2">
    </a>
    <a href="https://images.unsplash.com/photo-1601924582971-c8f23329e1b6?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1601924582971-c8f23329e1b6?fit=crop&w=300&q=80" alt="Pizza 3">
    </a>
    <a href="https://images.unsplash.com/photo-1585238341982-78a5c25b2d4b?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1585238341982-78a5c25b2d4b?fit=crop&w=300&q=80" alt="Pizza 4">
    </a>
    <a href="https://images.unsplash.com/photo-1576858650381-0e5cc94c77dc?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1576858650381-0e5cc94c77dc?fit=crop&w=300&q=80" alt="Pizza 5">
    </a>
     <a href="https://images.unsplash.com/photo-1603574670812-d24560880210?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1603574670812-d24560880210?fit=crop&w=300&q=80" alt="Pizza 1">
    </a>
    <a href="https://images.unsplash.com/photo-1571091718767-18b5b1457add?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1571091718767-18b5b1457add?fit=crop&w=300&q=80" alt="Pizza 2">
    </a>
    <a href="https://images.unsplash.com/photo-1601924582971-c8f23329e1b6?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1601924582971-c8f23329e1b6?fit=crop&w=300&q=80" alt="Pizza 3">
    </a>
    <a href="https://images.unsplash.com/photo-1585238341982-78a5c25b2d4b?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1585238341982-78a5c25b2d4b?fit=crop&w=300&q=80" alt="Pizza 4">
    </a>
    <a href="https://images.unsplash.com/photo-1576858650381-0e5cc94c77dc?fit=crop&w=1200&q=80">
      <img src="https://images.unsplash.com/photo-1576858650381-0e5cc94c77dc?fit=crop&w=300&q=80" alt="Pizza 5">
    </a>
  </div>

  <!-- LightGallery Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/zoom/lg-zoom.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>

  <!-- Initialize -->
  <script>
    lightGallery(document.getElementById('pizza-gallery'), {
      plugins: [lgZoom, lgThumbnail],
      speed: 500,
      thumbnail: true,
      zoom: true,
      download: false
    });

    const tabs = document.querySelectorAll('.tab');
    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        document.querySelector('.tab.active').classList.remove('active');
        tab.classList.add('active');
      });
    });
  </script>

</body>
</html>
