<head>
  <meta charset="UTF-8">
  <title>I.K.B.H Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      display: flex;
      height: 100vh;
      background: #f5f7fa;
      transition: all 0.3s ease;
    }

    /* Sidebar */
    .sidebar {
      width: 260px;
      background: #1e2d3d;
      color: #fff;
      transition: all 0.4s ease;
      overflow-y: auto;
      position: relative;
      z-index: 1000;
    }

    .sidebar.collapsed {
      transform: translateX(-260px);
    }

    .sidebar h2 {
      text-align: center;
      padding: 20px;
      font-size: 18px;
      background: #17212d;
    }

    .sidebar ul {
      list-style: none;
    }

    .sidebar ul li {
      padding: 12px 20px;
      cursor: pointer;
      transition: background 0.3s ease;
      position: relative;
    }

    .sidebar ul li:hover {
      background: #2e3f52;
    }

    .sidebar ul li i {
      margin-right: 10px;
    }

    .submenu {
      background: #2e3f52;
      max-height: 0;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      transition: max-height 0.4s ease;
    }

    .submenu.open {
      max-height: 500px;
    }

    .submenu li {
      padding: 10px 40px;
      font-size: 14px;
    }

    .submenu li:hover {
      background: #3c4b5e;
    }

    /* Main Content */
    .main-content {
      flex: 1;
      padding: 30px;
      transition: margin-left 0.4s ease;
      width: 100%;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .top-bar input[type="text"] {
      padding: 8px;
      width: 250px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .dashboard-header {
      text-align: center;
      margin: 30px 0 20px;
    }

    .dashboard-header h1 {
      font-size: 24px;
      color: #2e3f52;
    }

    .cards {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      flex-wrap: wrap;
    }

    .card {
      background: white;
      border-radius: 10px;
      padding: 25px;
      flex: 1;
      text-align: center;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
      min-width: 180px;
      max-width: 250px;
    }

    .card h3 {
      margin-bottom: 10px;
      font-size: 16px;
      color: #777;
    }

    .card p {
      font-size: 28px;
      color: #333;
      font-weight: bold;
    }

    /* Hamburger Button */
    .hamburger {
      position: absolute;
      top: 15px;
      left: 15px;
      font-size: 22px;
      background: #1e2d3d;
      color: white;
      padding: 8px 10px;
      border-radius: 4px;
      cursor: pointer;
      z-index: 2000;
    }

    @media screen and (max-width: 768px) {
      .cards {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>